<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str; 
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Category;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        $categories = Category::all(); // Fetch all categories
        return view('services.index', compact('services', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required|unique:services',
        'description' => 'required',
        'price' => 'required|numeric',
        'category' => 'required|category',
    ]);

    $service = new Service;
    $service->name = $request->name;
    $service->slug = Str::slug($request->name); // 👈 Auto-generate slug
    $service->description = $request->description;
    $service->price = $request->price;
    $service->save();

    return redirect()->route('services.index')->with('success', 'Service created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
{
    $service = Service::where('slug', $slug)->firstOrFail();
    
    return view('services.show', compact('service'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
{
    $request->validate([
        'name' => 'required|unique:services,name,' . $service->id,
        'description' => 'required',
        'price' => 'required|numeric',
    ]);

    $service->name = $request->name;
    $service->slug = Str::slug($request->name); // 👈 Auto-update slug
    $service->description = $request->description;
    $service->price = $request->price;
    $service->save();

    return redirect()->route('services.index')->with('success', 'Service updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
