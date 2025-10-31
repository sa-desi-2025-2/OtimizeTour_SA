<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Http\Resources\UsuarioResource;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UsuarioResource::collection(Usuario::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usuario = Usuario::create($request->all());
        return new UsuarioResource($usuario);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new UsuarioResource(Usuario::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->update($request->all());
        return new UsuarioResource($usuario);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return response()->noContent();
    }
}
