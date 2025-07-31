<?php

// app/Http/Controllers/CategoryController.php
// app/Http/Controllers/CategoryController.php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }



    // app/Http/Controllers/CategoryController.php

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return redirect()->route('categories.index');
    }
    // app/Http/Controllers/CategoryController.php

    public function destroy($id)
    {   
    $category = Category::findOrFail($id);

    if ($category->books()->count() > 0) {
        return redirect()->route('categories.index')->with('error', 'Kategori tidak bisa dihapus karena masih ada buku yang menggunakan kategori ini.');
    }

    $category->delete();
    return redirect()->route('categories.index')->with('success', 'Kategori berhasil dihapus');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create($request->all());
        return redirect()->route('categories.index');
    }
}
