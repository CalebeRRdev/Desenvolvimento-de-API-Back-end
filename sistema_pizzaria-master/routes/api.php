<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/**
    * Modificação realizada por Calebe Rodrigues Rolim
    * Data: 26/08/2024
    * Hora: 13:10
    *
    * Descrição:
    * - Adicionada rota PUT para atualizar um usuário: /user/{id}.
     * - Adicionada rota DELETE para deletar um usuário: /user/{id}.
    * - Rotas organizadas sob o prefixo '/user'.
    */ 

Route::post('/cadastrar', [UserController::class, 'store']);

Route::prefix('/user')->group(function (){
    Route::get('/', [UserController::class, 'index']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
});
