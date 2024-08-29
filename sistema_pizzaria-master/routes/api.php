<?php

/**
    * Modificação realizada por Calebe Rodrigues Rolim
    * Data: 29/08/2024
    * Hora: 12:06
    *
    * Descrição:
    * - Reorganizadas as rotas para melhorar a estrutura e evitar duplicações.
    * - As rotas agora estão agrupadas sob o prefixo '/user':
    *   - GET /user: Lista todos os usuários.
    *   - POST /user: Cadastra um novo usuário.
    *   - PUT /user/{id}: Atualiza um usuário existente.
    *   - DELETE /user/{id}: Deleta um usuário existente.
    * - Removida a rota POST /cadastrar para evitar duplicação e seguir as melhores práticas.
    */

    
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
    
Route::prefix('/user')->group(function () {
    Route::get('/', [UserController::class, 'index']);          // GET /user
    Route::post('/', [UserController::class, 'store']);         // POST /user (para criar um novo usuário)
    Route::put('/{id}', [UserController::class, 'update']);     // PUT /user/{id} (para atualizar um usuário existente)
    Route::delete('/{id}', [UserController::class, 'destroy']); // DELETE /user/{id} (para deletar um usuário existente)
});
    
