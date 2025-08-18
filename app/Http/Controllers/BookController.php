<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all books in DB
        $books = DB::table('books')->latest()->get();

        return view('book.index', [
            'booksAll' => $books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Form Validation
        $request->validate([
            'b_name'        => 'required|max:100',
            'auth_name'     => 'required|max:100',
            'isbn'          => 'required|numeric|max_digits:200',
            'copies'          => 'required|numeric|max_digits:200',
            'avail_copy'    => 'required|numeric|max_digits:200',
            'cover'         => 'nullable|mimes:jpg,png,jpeg,gif|max:1024'
        ]);

        // Upload Student Image
        $fileName = $this -> fileUpload($request -> file('cover'), 'media/cover');

        // Store data form input
        DB::table('books')->insert([
            'b_name'        => $request->b_name,
            'author'        => $request->auth_name,
            'isbn'          => $request->isbn,
            'copies'        => $request->copies,
            'available_copy'=> $request->avail_copy,
            'description'   => $request->description,
            'cover'         => $fileName,
            'created_at'    => now()
        ]);

        // Redirect home page and Success Message!
        return redirect()->route('book.index')->with('success', 'Book insert <strong>Successfully</strong>');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Get Single Id in book Table
        $book = DB::table('books')->where('id', $id)->first();

        return view('book.show', [
            'book' => $book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Get Single Id in book Table
        $book = DB::table('books')->where('id', $id)->first();

        return view('book.edit', [
            'book' => $book
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Form Validation
        $request->validate([
            'b_name'        => 'required|max:100',
            'auth_name'     => 'required|max:100',
            'isbn'          => 'required|numeric|max_digits:200',
            'copies'          => 'required|numeric|max_digits:200',
            'avail_copy'    => 'required|numeric|max_digits:200',
            'cover'         => 'nullable|mimes:jpg,png,jpeg,gif|max:1024'
        ]);

        // Upload Student Image 
        if($request->hasFile('cover')) {

            $bgCover = DB::table('books')->where('id', $id) -> first();

            if( $bgCover -> cover != null && file_exists(public_path('media/cover/') . $bgCover->cover ) )  {
                unlink(public_path('media/cover/') . $bgCover->cover);
            };

            $fileName = $this -> fileUpload($request -> file('cover'), 'media/cover');
            
            DB::table('books')->where('id', $id)->update([ 
                'cover'         => $fileName, 
            ]);

        };
        
        // Update data form input
        DB::table('books')->where('id', $id)->update([
            'b_name'        => $request->b_name,
            'author'        => $request->auth_name,
            'isbn'          => $request->isbn,
            'copies'        => $request->copies,
            'available_copy'=> $request->avail_copy,
            'description'   => $request->description, 
            'updated_at'    => now()
        ]);

        // Redirect home page and Success Message!
        return redirect()->route('book.index')->with('success', 'Book Update <strong>Successfully</strong>');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('books')->where('id', $id) -> delete();

        // Redirect home page and Success Message!
        return redirect()->route('book.index')->with('success', 'Book Delete <strong>Successfully</strong>');
    }
}
