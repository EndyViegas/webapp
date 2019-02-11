<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Usuario::create([
            'nome'=>$request->nome,

        ]);

        return redirect('/login');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }

    public function login(Request $request){
        $regras = [
            'nome'=>'required|min:4|max:30',
        ];
        $mensagens = [
            'required'=> 'O campo :attribute é obrigatório.',
            'nome.min'=> 'Campo nome no mínimo 4 caracteres.',
            'nome.max'=>'Campo nome com 30 caracteres no máximo.',
        ];


        $request->validate($regras,$mensagens);

        $usuario = Usuario::where('nome', '=', $request->nome)->first();

        if(isset($usuario) && !is_null($usuario)){
            $login = ['usuario_logado'=> $request->nome];
            $request->session()->put('login',$login);
            return redirect('/cards');
        }else{
            $userError = 'Não foi possível encontrar este usuário.';
            return view('login',compact('userError'));
        }
    }
}
