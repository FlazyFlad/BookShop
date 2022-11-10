<?php

namespace App\Services;

use App\Http\Requests\BookStoreRequest;
use App\Models\Book;
use http\Env\Request;

interface BookService
{
    public function getAll();

    public function getOne($id);

    public function create(BookStoreRequest $request);

    public function update(BookStoreRequest $request, Book $book);

    public function destroy(Book $book);
}
