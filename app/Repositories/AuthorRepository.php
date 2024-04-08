<?php

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\Author;
use Exception;

class AuthorRepository implements RepositoryInterface
{
    public function all()
    {
        return Author::orderBy('id', 'desc')->get();
    }

    public function create(array $data)
    {
        return Author::create($data);
    }

    public function find(int $id)
    {
        try {
            $author = Author::findOrFail($id);
            return $author;
        } catch (Exception $e) {
            return response()->json(['error' => 'Autor não encontrado.'], 404);
        }
    }

    public function update(array $data, int $id)
    {
        try {
            $author = Author::findOrFail($id);
            $author->update($data);
            return $author;
        } catch (Exception $e) {
            return response()->json(['error' => 'Autor não encontrado.'], 404);
        }
    }

    public function delete(int $id)
    {
        try {
            $author = Author::findOrFail($id);
            $author->delete();
        } catch (Exception $e) {
            return response()->json(['error' => 'Autor não encontrado.'], 404);
        }
    }
}
