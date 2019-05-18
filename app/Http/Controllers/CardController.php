<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Card;

class CardController extends Controller{   
    //Proteger com middleware Auth
    public function __construct(){
        $this->middleware('auth');
    }
    
    //Exibir listagem Cards
    public function index(){
        $i = 0;
        $cards = Card::all();
        return view('cards',compact('i','cards'));
    }

    //Exibir form cadastro Card
    public function create(){
        $i = 1;
        return view('cards',compact('i'));
    }

    //Receber Post criação do Card
    public function store(Request $request){
        //Validação do form
        $regras = [
            'name' => 'required|max:20',
            'description' => 'required|max:100',
            'file_url' => 'required',
        ];
        $mensagens = [
            'name.required'=>'Escolha um nome para o personagem', 
            'name.max'=>'Nome do personagem não pode ser maior que 20 caracteres', 
            'description.max'=>'Descrição não pode ser maior que 100 caracteres', 
            'description.required'=>'Descreva o personagem', 
            'file_url.required'=>'Indique a imagem do personagem', 
        ];
        $request->validate($regras,$mensagens);   
        $card = new Card();
        $card->name = $request->input('name');
        $card->description = $request->input('description');
        $path = $request->file('file_url')->store('images','public');
        $card->file_url = $path;
        $card->save();
        return redirect('/cards'); 
    }

    //Exibir form com dados do card para edição
    public function edit($id){
        $i = 2;
        $card = Card::find($id);
        if (isset($card)) {
            return view('cards', compact('card','i'));
        }
    }

    //Receber Post edição do Card
    public function update(Request $request, $id){
        $card = Card::find($id);
        if (isset($card)) {
            //Validação do form
            $regras = [
                'name' => 'required|max:255',
                'description' => 'required', 
            ];
            $mensagens = [
                'name.required'=>'Escolha um nome para o personagem', 
                'description.required'=>'Descreva o personagem',   
            ];
            $request->validate($regras,$mensagens); 
            $card->name = $request->input('name');
            $card->description = $request->input('description');
            if($request->file('file_url')){
                //apagar arquivo existente
                $file = $card->file_url;
                Storage::disk('public')->delete($file);
                //salvar novo arquivo
                $path = $request->file('file_url')->store('images','public');
                $card->file_url = $path; 
            }
            $card->save();
        }
        return redirect('/cards');
    }

    //Apagar card e sua foto no storage
    public function destroy($id){ 
        $card = Card::find($id);
        if (isset($card)) {
            $file = $card->file_url;
            Storage::disk('public')->delete($file);
            $card->delete();
        }
        return redirect('/cards');
    }

    //Download da foto Card
    public function download($id){
        $card = Card::find($id);
        if (isset($card)) {
            $path = Storage::disk('public')->getDriver()->getAdapter()->applyPathPrefix($card->file_url);
            return response()->download($path);
        }
        return redirect('/cards');
    }
}  