<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $title = 'Usuários';

        return view('/usuarios/index', [
            'title' => $title
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $title = 'Cadastrar novo usuário';

        return view('/usuarios/create', [
            'title' => $title
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $unidadesSaude)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $unidadesSaude)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $unidadesSaude)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $unidadesSaude)
    {
        //
    }
}
