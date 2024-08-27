<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/**
    * Modificação realizada por Calebe Rodrigues Rolim
    * Data: 27/08/2024
    * Hora: 10:30
    *
    * Descrição:
    * - Mantida a rota POST para cadastrar um usuário: /cadastrar.
    * - Reorganizadas as rotas sob o prefixo '/user':
    *   - GET /user: Lista todos os usuários.
    *   - PUT /user/{id}: Atualiza um usuário existente.
    *   - DELETE /user/{id}: Deleta um usuário existente.
    *   - POST /user/cadastrar: Cadastra um novo usuário.
    * - Removida a rota POST /cadastrar do prefixo '/user' para evitar duplicação.
    */

Route::post('/cadastrar', [UserController::class, 'store']);

Route::prefix('/user')->group(function (){
    Route::get('/', [UserController::class, 'index']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
    Route::post('/cadastrar', [UserController::class, 'store']);
});

