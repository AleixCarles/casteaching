<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideosManagerController extends Controller
{
    /**
     * R -> Retrive -> Llista
     */
    public function index()
    {
        //
    }

    /**
     * C -> Create -> Mostrar el formulari de creacio
     */
    public function create()
    {
        //
    }

    /**
     * C -> Create -> Guardara a base de dades el nou video
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * R -> NO LLISTA -> Individual ->
     */
    public function show($id)
    {
        //
    }

    /**
     * U -> update -> Form
     */
    public function edit($id)
    {
        //
    }

    /**
     * U -> update -> Processarà el form i guardara les modificacions
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * D -> Delete
     */
    public function destroy($id)
    {
        //
    }
}
