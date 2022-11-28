<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookStoreRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Services\BookService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected $bookService;

    public function __construct(BookService $bookService) {
        $this->bookService = $bookService;
    }

    public function index()
    {
        $books = $this->bookService->getAll();

        return response()->json([
            'status' => true,
            'books' => $books
        ]);
    }

    public function store(BookStoreRequest $request)
    {
        $book = $this->bookService->create($request);

        return response()->json([
            'status' => true,
            'book' => $book
        ]);
    }

    public function show($id)
    {
        $book = $this->bookService->getOne($id);

        return response()->json([
            'status' => true,
            'book' => $book
        ]);
    }

    public function update(BookStoreRequest $request, Book $book)
    {
        $book = $this->bookService->update($request, $book);

        return response()->json([
            'status' => true,
            'book' => $book
        ]);
    }

    public function destroy(Book $book)
    {
        $book = $this->bookService->destroy($book);

        return response()->json([
            'status' => true,
            'book' => $book
        ]);
    }
}
