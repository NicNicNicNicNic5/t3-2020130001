<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'id' => 'required|max:13',
            'judul' => 'required|max:100',
            'halaman' => 'required|integer|max:99999',
            'kategori' => 'required|max:255',
            'penerbit' => 'required|max:255'
        ];

        $validated = $request->validate($rules);
        Book::create($validated);

        $request->session()->flash('success', "Buku yang berjudul {$validated['judul']} sudah berhasil ditambahkan.");
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $rules = [
            'id' => 'required|max:13',
            'judul' => 'required|max:100',
            'halaman' => 'required|integer|max:99999',
            'kategori' => 'required|max:255',
            'penerbit' => 'required|max:255'
        ];

        $validated = $request->validate($rules);
        $book->update($validated);
        $request->session()->flash('success', "Berhasil memperbarui data buku {$validated['judul']}.");
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', "Data buku {$book['judul']} sudah dihapus.");;
    }
}
