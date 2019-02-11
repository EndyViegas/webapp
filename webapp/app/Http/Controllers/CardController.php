<?php

namespace App\Http\Controllers;

use App\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{

    public function __construct()
    {
        $this->middleware(\App\Http\Middleware\CardMiddleware::class);
    }

    public function index(){

        $cards = Card::all();
        return $cards->toJson();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexView()
    {
        return view('index');
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

        $arrErrors = array();

        if(trim($request->nome) == '')
            $arrErrors['nome'] = 'Campo obrigatório.';
        if(trim($request->descricao) == '')
            $arrErrors['descricao'] = 'Campo obrigatório.';

        if(count($arrErrors))
            return view('index',compact('arrErrors'));


        Card::create([
            'nome'=>$request->nome,
            'descricao'=>$request->descricao

        ]);

        return redirect('/cards');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Card $card)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_card)
    {
        $card = Card::find($id_card);

        $card->delete();
    }
}
