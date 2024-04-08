<?php

namespace App\Repositories;

use App\Models\Book;
use App\Contracts\RepositoryInterface;
use Exception;

class BookRepository implements RepositoryInterface
{
    public function all()
    {
        return Book::orderBy('id', 'desc')->get();
    }

    public function create(array $data)
    {
        return Book::create($data);
    }

    public function find(int $id)
    {
        try {
            $book = Book::findOrFail($id);
            return $book;
        } catch (Exception $e) {
            return response()->json(['error' => 'Livro não encontrado.'], 404);
        }
    }

    public function update(array $data, int $id)
    {
        try {
            $book = Book::findOrFail($id);
            $book->update($data);
            return $book;
        } catch (Exception $e) {
            return response()->json(['error' => 'Livro não encontrado.'], 404);
        }
    }

    public function delete(int $id)
    {
        try {
            $book = Book::findOrFail($id);
            $book->delete();
        } catch (Exception $e) {
            return response()->json(['error' => 'Livro não encontrado.'], 404);
        }
    }
}