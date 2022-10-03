<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{

    public function index(){
        $allbooks = Book::with('vendor')->get();
        return view('books.index', ['mybooks' => $allbooks]);
    }

    public function create(){
        $vendors = Vendor::all();
        return view('books.create', [
            'vendors' => $vendors
        ]);
    }

    public function store(Request $request){
        Book::create([
            'name' => $request->name,
            'author' =>$request->author,
            'description' => $request->description,
            'price' => $request->price,
            'vendor_id' => $request->vendor_id
        ]);

        return redirect()->route('books.index');
    }

    public function show(Book $book){
        $vendors = Vendor::all();
        return view('books.show', ['book' => $book, 'vendors' => $vendors]);
    }

    public function edit(Book $book){
        $vendors = Vendor::all();
        return view('books.edit', ['book' => $book, 'vendors' => $vendors]);
    }

    public function update(Request $request, Book $book){
        $book->update([
            'name' => $request->name,
            'author' =>$request->author,
            'description' => $request->description,
            'price' => $request->price,
            'vendor_id' => $request->vendor_id
        ]);

        return redirect()->route('books.index');
    }

    public function destroy(Book $book){
        $book->delete();

        return redirect()->route('books.index');
    }
}
