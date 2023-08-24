<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        echo 'teste index';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        echo 'teste create';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        echo 'teste store';
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        echo 'teste show';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        echo 'teste edit';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        echo 'teste update';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        echo 'teste destroy';
    }
}
