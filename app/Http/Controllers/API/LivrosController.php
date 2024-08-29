<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LivroPostRequest;
use App\Http\Requests\LivroUpdateRequest;
use App\Http\Resources\LivroCollection;
use App\Http\Resources\LivroResource;
use App\Models\Livro;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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
        try {
            $userData = $request->validated();
            $livro = Livro::create($userData);
            return new LivroResource($livro);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Erro ao salvar no banco de dados.'], 500);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro inesperado.'], 500);
        }
    }

    public function update(LivroUpdateRequest $request, Livro $livro)
    {
        try {
            $livro->update($request->validated());
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Erro ao atualizar dado no banco de dados.'], 500);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro inesperado.'], 500);
        }
    }

    public function destroy(Livro $livro)
    {
        try {
            $livro->delete();
            return response()->noContent();
        } catch (QueryException $e) {
            return response()->json(['error' => 'Erro ao excluir registro no banco de dados.'], 500);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro inesperado.'], 500);
        }

    }
}
