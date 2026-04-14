<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // 1. LISTAHAN NGA NAAY SEARCH
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Kon naay gi-search, i-filter ang title o author
        $books = Book::when($search, function ($query) use ($search) {
            $query->where('title', 'like', "%{$search}%")
                ->orWhere('author', 'like', "%{$search}%")
                ->orWhere('isbn', 'like', "%{$search}%");
        })->latest()->get();

        return view('books.index', compact('books', 'search'));
    }

    public function create()
    {
        return view('books.create');
    }

    // 2. PAG-SAVE SA DATABASE
    public function store(Request $request)
    {
        // Validation para dili mo-error ang SQL
        $data = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'genre' => 'required',
            'isbn' => 'required',
            'price' => 'required|numeric',
            'published_year' => 'required|integer',
            'cover_image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

        $data['is_available'] = $request->has('is_available') ? 1 : 0;

        // Kani ang mo-save gyud!
        Book::create($data);

        // Human ma-save, i-redirect sa index
        return redirect()->route('books.index')->with('success', 'Book saved to Library!');
    }
}