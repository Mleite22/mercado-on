<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Exiba uma listagem do recurso.
     */
    public function index()
    {
        return view('admin.slider.index');
    }

    /**
     * Mostre o formulário para criação de um novo recurso.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Armazene um recurso recém-criado no armazenamento.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Exiba o recurso especificado.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Mostre o formulário para editar o recurso especificado.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Atualize o recurso especificado no armazenamento.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remova o recurso especificado do armazenamento.
     */
    public function destroy(string $id)
    {
        //
    }
}
