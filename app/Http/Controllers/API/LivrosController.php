<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LivroPostRequest;
use App\Http\Requests\LivroUpdateRequest;
use App\Http\Resources\LivroCollection;
use App\Http\Resources\LivroResource;
use App\Models\Livro;
use Illuminate\Http\Request;

class LivrosController extends Controller
{
    public function index()
    {
        return new LivroCollection(Livro::paginate(10));
    }

    public function show(Livro $livro)
    {
        return new LivroResource($livro);
    }

    public function store(LivroPostRequest $request)
    {
        $userData = $request->validated();
        $livro = Livro::create($userData);
        return new LivroResource($livro);
    }

    public function update(LivroUpdateRequest $request, Livro $livro)
    {
        $livro->update($request->validated());
    }

    public function destroy(Livro $livro)
    {
        $livro->delete();
        return response()->noContent();
    }
}
