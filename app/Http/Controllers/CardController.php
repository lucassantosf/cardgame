<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Card;

class CardController extends Controller
{   
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $i = 0;
        $cards = Card::all();
        return view('cards',compact('i','cards'));
    }

    public function create(){
        $i = 1;
        return view('cards',compact('i'));
    }

    public function store(Request $request){
        //Validação do form
        $regras = [
            'name' => 'required|max:255',
            'description' => 'required',
            'file_url' => 'required',
        ];
        $mensagens = [
            'name.required'=>'Escolha um nome para o personagem', 
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

    public function edit($id){
        $i = 2;
        $card = Card::find($id);
        if (isset($card)) {
            return view('cards', compact('card','i'));
        }
    }

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

    public function destroy($id){ 
        $card = Card::find($id);
        if (isset($card)) {
            $file = $card->file_url;
            Storage::disk('public')->delete($file);
            $card->delete();
        }
        return redirect('/cards');
    }
}  