<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;
use File;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $book = Book::all();
        return view('book.read', ['book' => $book]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('book.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'summary' => 'required',
            'image' => 'required|mimes:jpeg, jpg, png|max:2048',
            'stock' => 'required',
            'category_id' => 'required',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName); 

        $book = new Book;

        $book->title = $request->input("title");
        $book->summary = $request->input("summary");
        $book->image = $imageName;
        $book->stock = $request->input("stock");
        $book->category_id = $request->input("category_id");

        $book->save();

        return redirect('/book');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::find($id);

        return view('book.detail', ['book'=>$book]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $book = Book::find($id);

        return view('book.edit', ['book'=>$book, 'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'summary' => 'required',
            'image' => '|mimes:jpeg, jpg, png|max:2048',
            'stock' => 'required',
            'category_id' => 'required',
        ]);

        $book = Book::find($id);

        if($request->has('image')){
            File::delete('images/'. $book->image);

            $fileImage = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $fileImage);
            $book->image = $fileImage;
        }

        $book->title = $request->input('title');
        $book->summary = $request->input('summary');
        $book->category_id = $request->input('category_id');
        $book->stock = $request->input('stock');

        $book->save();

        return redirect('/book');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);

        File::delete('images/'. $book->image);

        $book->delete();

        return redirect('/book');
    }
}
