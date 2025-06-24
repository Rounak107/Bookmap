<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function addToCart(Request $request, $serviceId)
{
    $cart = session()->get('cart', []);

    // Use service ID directly as key for now + date for uniqueness
    $key = $serviceId . '_' . $request->date;

    if (isset($cart[$key])) {
        $cart[$key]['quantity'] += 1;
        $cart[$key]['total'] = $cart[$key]['quantity'] * $cart[$key]['price'];
    } else {
        $cart[$key] = [
            'service_id' => (int) $serviceId, // ✅ Store actual integer ID
            'service_name' => $request->label,
            'quantity' => 1,
            'price' => $request->price,
            'total' => $request->price,
            'image' => $request->image,
            'date' => $request->date,
        ];
    }

    session()->put('cart', $cart);

    return redirect()->route('cart.index')->with('success', 'Service added to cart!');
}

    public function increase($id)
{
    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        $cart[$id]['quantity']++;
        $cart[$id]['total'] = $cart[$id]['quantity'] * $cart[$id]['price']; // ✅ update total
    }

    session(['cart' => $cart]);

    return response()->json([
        'success' => true,
        'item' => [
            'quantity' => $cart[$id]['quantity'],
            'total' => $cart[$id]['total'], // ✅ total not just quantity
        ],
        'count' => array_sum(array_column($cart, 'quantity')),
        'cartTotal' => collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']),
    ]);
}


public function decrease($id)
{
    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        $cart[$id]['quantity']--;

        if ($cart[$id]['quantity'] <= 0) {
            unset($cart[$id]); // Remove item if quantity is 0 or less
        } else {
            $cart[$id]['total'] = $cart[$id]['quantity'] * $cart[$id]['price'];
        }
    }

    session(['cart' => $cart]);

    return response()->json([
        'success' => true,
        'item' => isset($cart[$id]) ? [
            'quantity' => $cart[$id]['quantity'],
            'total' => $cart[$id]['total'],
        ] : ['quantity' => 0, 'total' => 0],
        'count' => array_sum(array_column($cart, 'quantity')),
        'cartTotal' => collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']),
    ]);
}


public function updateDate(Request $request, $id)
{
    $cart = session()->get('cart', []);
    if (isset($cart[$id])) {
        $cart[$id]['date'] = $request->date;
        session(['cart' => $cart]);
    }

    return response()->json(['success' => true]);
}

    public function remove($id)
    {
        $cart = session()->get('cart', []);
        unset($cart[$id]);
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Service removed from cart.');
    }

    public function clear()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Cart cleared.');
    }
}
