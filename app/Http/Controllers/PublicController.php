<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Destination;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('destinations')->get();
        // Dapatkan destinasi dengan rating tertinggi
        $featuredDestinations = Destination::with('category')
                                ->where('is_active', true)
                                ->orderBy('rating', 'desc')
                                ->orderBy('created_at', 'desc')
                                ->limit(6)
                                ->get();
                                
        return view('welcome', compact('categories', 'featuredDestinations'));
    }
    
    public function show(Destination $destination)
    {
        $destination->load('category', 'facilities');
        return view('destination.show', compact('destination'));
    }
}
