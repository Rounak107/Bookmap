<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
{
    $homeServices = Service::where('category', 'Home')->get();
    $kitchenServices = Service::where('category', 'Kitchen')->get();
    $interiorServices = Service::where('category', 'Home Interior')->get();
    $services = Service::all(); // or use where('category', 'Home') if categorized

    return view('home', compact('homeServices', 'kitchenServices', 'interiorServices'));
    
}

}
