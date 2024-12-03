<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category');
    }


    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        Category::create([
            'name' => $request->name,
        ]);


        return redirect()->route('category')->with('success', 'Categoría creada exitosamente.');
    }
}
