<?php

namespace App\Services\Impl;

use App\Http\Requests\BookStoreRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Services\BookService;
use http\Env\Request;
use Illuminate\Http\Response;

class BookServiceImpl implements BookService
{
    public function getAll()
    {
        $book = BookResource::collection(Book::all());

        return $book;
    }

    public function getOne($id)
    {
        $book = new BookResource(Book::all()->find($id));

        return $book;
    }

    public function create(BookStoreRequest $request)
    {
        $path = $request -> file('image')->store('image', 'public');
        $book = new BookResource(Book::create([
            'name' => $request->name,
            'author' =>$request->author,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $path,
            'vendor_id' => $request->vendor_id
        ]));

        return ($book);
    }

    public function update(BookStoreRequest $request, Book $book)
    {
        new BookResource($book->update($request->validated()));
        return ($book);
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
