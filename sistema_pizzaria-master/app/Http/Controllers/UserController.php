<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Class UserController
 *
 * @package App\Http\Controllers
 * @author Vinícius Sarmento
 * @link https://github.com/ViniciusSCS
 * @date 2024-08-23 21:48:54
 * @copyright UniEVANGÉLICA
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::select('id', 'name', 'email')->paginate('2');

        return [
            'status' => 200,
            'menssagem' => 'Usuários encontrados!!',
            'user' => $user
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }


    /**
    * Modificação realizada por Calebe Rodrigues Rolim
    * Data: 27/08/2024
    * Hora: 10:21
    *
    * Descrição:
    * - Alteração do método store para utilizar o Request padrão em vez do UserCreateRequest.
    * - Adicionada a função response()->json() para retornar uma resposta JSON padronizada.
    * - Correção de um erro de digitação na chave 'mensagem' da resposta.
    * - Mantida a criação do usuário com os dados fornecidos.
    */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $data = $request->all();

    // Cria o usuário com os dados fornecidos
    $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => bcrypt($data['password']),
    ]);

    // Retorna a resposta JSON com os detalhes do usuário criado
    return response()->json([
        'status' => 200,
        'mensagem' => 'Usuário cadastrado com sucesso!',
        'user' => $user
    ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
    * Modificação realizada por Calebe Rodrigues Rolim
    * Data: 26/08/2024
    * Hora: 13:15
    *
    * Descrição:
    * - Implementação do método update para atualizar usuários no banco de dados.
    * - Verificação da existência do usuário antes de atualizar.
    */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Encontra o usuário pelo ID
        $user = User::find($id);

        // Verifica se o usuário existe
        if (!$user) {
            return response()->json(['status' => 404, 'mensagem' => 'Usuário não encontrado'], 404);
    }

    // Atualiza os campos necessários
    $user->name = $request->input('name', $user->name);
    $user->email = $request->input('email', $user->email);

    // Salva as alterações
    $user->save();

    return response()->json(['status' => 200, 'mensagem' => 'Usuário atualizado com sucesso', 'user' => $user], 200);
    }

    /**
    * Modificação realizada por Calebe Rodrigues Rolim
    * Data: 26/08/2024
    * Hora: 13:15
    *
    * Descrição:
    * - Implementação do método destroy para deletar usuários do banco de dados.
    * - Verificação da existência do usuário antes de deletar.
    */    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    // Encontra o usuário pelo ID
    $user = User::find($id);

    // Verifica se o usuário existe
        if (!$user) {
         return response()->json(['status' => 404, 'mensagem' => 'Usuário não encontrado'], 404);
    }

    // Deleta o usuário
    $user->delete();

    return response()->json(['status' => 200, 'mensagem' => 'Usuário deletado com sucesso'], 200);
    }

}
