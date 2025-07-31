<?php

// app/Http/Controllers/BookController.php
// app/Http/Controllers/BookController.php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // app/Http/Controllers/BookController.php

    // app/Http/Controllers/BookController.php

    // app/Http/Controllers/BookController.php

    public function index(Request $request)
    {
        $search = $request->get('search');
        $categoryId = $request->get('category_id');

        $query = Book::with('category');

        // Filter pencarian
        if ($search) {
            $query->where('title', 'like', "%{$search}%")
                ->orWhere('author', 'like', "%{$search}%")
                ->orWhereHas('category', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                });
        }

        // Filter berdasarkan kategori
        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        // Pagination: menampilkan 10 buku per halaman
        $books = $query->paginate(10);

        $categories = Category::all();

        return view('books.index', compact('books', 'categories'));
    }

    public function search(Request $request)
    {
        $term = $request->get('term');
        $books = Book::where('title', 'LIKE', '%' . $term . '%')->get(['id', 'title']);
        $result = [];

        foreach ($books as $book) {
            $result[] = ['value' => $book->id, 'label' => $book->title];
        }

        return response()->json($result);
    }





    public function create()
    {
        $categories = Category::all(); // Mengambil semua kategori
        return view('books.create', compact('categories'));
    }

    // app/Http/Controllers/BookController.php

    public function store(Request $request)
    {
        // Validasi data dari form
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'isbn' => 'nullable|string|max:255',
            'published_at' => 'nullable|date',
            'pages' => 'nullable|integer',
        ]);

        // Menyimpan data buku
        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'category_id' => $request->category_id,
            'isbn' => $request->isbn,
            'published_at' => $request->published_at,
            'pages' => $request->pages,
            'available' => $request->available, // Set available default ke 0
        ]);

        return redirect()->route('books.index');
    }

    // app/Http/Controllers/BookController.php

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all(); // Untuk dropdown kategori
        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->update($request->all());
        return redirect()->route('books.index');
    }
    // app/Http/Controllers/BookController.php

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('books.index');
    }
}
