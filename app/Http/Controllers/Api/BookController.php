<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\BookRequest;
use App\Repositories\BookRepository;

class BookController extends Controller
{
    protected $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    /**
     * Retorna todos os livros.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $books = $this->bookRepository->all();
        return response()->json($books);
    }

    /**
     * Armazena um novo livro.
     *
     * @param  \App\Http\Requests\Api\BookRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(BookRequest $request)
    {
        $book = $this->bookRepository->create($request->all());
        return response()->json($book, 201);
    }

    /**
     * Retorna os detalhes de um livro específico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $book = $this->bookRepository->find($id);
        return response()->json($book);
    }

    /**
     * Atualiza um livro existente.
     *
     * @param  \App\Http\Requests\Api\BookRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(BookRequest $request, $id)
    {
        $book = $this->bookRepository->update($request->all(), $id);
        return response()->json($book);
    }

    /**
     * Exclui um livro.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->bookRepository->delete($id);
        return response()->json(null, 204);
    }
}