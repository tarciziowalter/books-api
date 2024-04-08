<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthorRequest;
use App\Repositories\AuthorRepository;

class AuthorController extends Controller
{
    protected $authorRepository;

    public function __construct(AuthorRepository $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    /**
     * Retorna todos os autores.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $authors = $this->authorRepository->all();
        return response()->json($authors);
    }

    /**
     * Armazena um novo autor.
     *
     * @param  \App\Http\Requests\Api\AuthorRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(AuthorRequest $request)
    {
        $author = $this->authorRepository->create($request->all());
        return response()->json($author, 201);
    }

    /**
     * Retorna os detalhes de um autor específico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $author = $this->authorRepository->find($id);
        return response()->json($author);
    }

    /**
     * Atualiza um autor existente.
     *
     * @param  \App\Http\Requests\Api\AuthorRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(AuthorRequest $request, $id)
    {
        $author = $this->authorRepository->update($request->all(), $id);
        return response()->json($author);
    }

    /**
     * Exclui um autor.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->authorRepository->delete($id);
        return response()->json(null, 204);
    }
}