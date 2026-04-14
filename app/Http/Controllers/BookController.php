<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Ipakita ang listahan sa mga libro.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $books = Book::when($search, function ($query) use ($search) {
            $query->where('title', 'like', $search . '%')
                ->orWhere('author', 'like', '%' . $search . '%');
        })->latest()->get();

        return view('books.index', compact('books', 'search'));
    }

    /**
     * Ipakita ang form para sa pag-register og bag-ong libro.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * I-save ang libro ngadto sa database.
     */
    public function store(Request $request)
    {
        // 1. I-validate ang tanan nga data gikan sa form
        // Siguraduha nga naay 'publisher' dire kay gipangita ni sa imong database
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'description' => 'required|string',
            'genre' => 'required|string',
            'isbn' => 'required|string',
            'price' => 'required|numeric',
            'published_year' => 'required|integer',
            'pages' => 'required|integer',
            'language' => 'required|string',
            'cover_image' => 'nullable|image|max:2048',
        ]);

        // 2. Handle ang file upload kung naay gi-upload nga cover image
        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

        // 3. I-create ang record sa database gamit ang validated data
        Book::create($data);

        // 4. I-redirect pabalik sa listahan nga naay success message
        return redirect()->route('books.index')->with('success', 'Book successfully registered.');
    }

    /**
     * I-delete ang libro ug ang cover image niini.
     */
    public function destroy(Book $book)
    {
        if ($book->cover_image) {
            Storage::disk('public')->delete($book->cover_image);
        }

        $book->delete();

        return redirect()->route('books.index')->with('success', 'Record removed.');
    }
}