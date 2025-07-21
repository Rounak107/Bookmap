<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
{
    $homeServices = Service::where('category', 'Home')->where('featured', true)->get();
    $kitchenServices = Service::where('category', 'Kitchen')->where('featured', true)->get();
    $interiorServices = Service::where('category', 'Home Interior')->get();
    $bikeServices = Service::where('category', '2-Wheeler Services')->where('featured', true)->get();

    return view('home', compact('homeServices', 'kitchenServices', 'interiorServices', 'bikeServices'));
}
}
