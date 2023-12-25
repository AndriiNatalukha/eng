<?php

namespace App\Http\Controllers;

use App\Models\WordCategory;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = WordCategory::all();

        return Inertia::render('Categories/Index', [
            'categories' => $categories,
            'isAuthenticated' => Auth::check(),
        ]);
    }


}
