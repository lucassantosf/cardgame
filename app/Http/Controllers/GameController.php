<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Card;

class GameController extends Controller{

  //Proteger com middleware Auth
	public function __construct(){
    $this->middleware('auth');
  }

  //Exibir view da Pre-visualização do sistema
  public function indexPreview(){
    $data = DB::table('config_game')->first();
    $cards = Card::all();
    return view('preview',compact('data','cards'));
  }

  //Exibir form configs pela primeira vez
  public function index(){
    //show form configs
    $data = DB::table('config_game')->first();
    return view('configs',compact('data'));
  }

    //Receber configs pela primeira vez
 	public function store(Request $request){
 		//Validação do form
        $regras = [
            'name' => 'required',
            'phrase' => 'required',
            'description_form' => 'required',
            'image_background_url' => 'required',
            'image_second_url' => 'required',
        ];
        $mensagens = [
            'name.required'=>'Escolha o nome do game',
            'phrase.required'=>'Diga a frase do game',
            'description_form.required'=>'Indique a descrição do game',
            'image_background_url.required'=>'Escolha imagem para background',
            'image_second_url.required'=>'Escolha imagem de destaque',
        ];
        $request->validate($regras,$mensagens);

        if($request->hasFile('image_background_url')){
            $file = $request->file('image_background_url');
            $file_name = time().'-'.$file->getClientOriginalName();
            $file_path = 'uploads/';
            $file->move($file_path, $file_name);
            $path1 = $file_name;
        }

        if($request->hasFile('image_second_url')){
            $file = $request->file('image_second_url');
            $file_name = time().'-'.$file->getClientOriginalName();
            $file_path = 'uploads/';
            $file->move($file_path, $file_name);
            $path2 = $file_name;
        }

        DB::table('config_game')->updateOrInsert([
            'name' => $request->name,
            'phrase' => $request->phrase,
            'description_form' => $request->description_form,
            'image_background_url' => $path1,
            'image_second_url' => $path2
        ]);

  	    return redirect()->route('home');
 	}

 	//Edição do form com dados da configuração
 	public function edit(Request $request){
 		//Validar form Edit
 		$regras = [
            'name' => 'required',
            'phrase' => 'required',
            'description_form' => 'required',
        ];
        $mensagens = [
            'name.required'=>'Escolha o nome do game',
            'phrase.required'=>'Diga a frase do game',
            'description_form.required'=>'Indique a descrição do game',
        ];
        $request->validate($regras,$mensagens);

        if($request->hasFile('image_background_url')){
            $file = $request->file('image_background_url');
            $file_name = time().'-'.$file->getClientOriginalName();
            $file_path = 'uploads/';
            $file->move($file_path, $file_name);
            $path1 = $file_name;
            DB::table('config_game')->update(['image_background_url'=>$path1]);
        }

        if($request->hasFile('image_second_url')){
            $file = $request->file('image_second_url');
            $file_name = time().'-'.$file->getClientOriginalName();
            $file_path = 'uploads/';
            $file->move($file_path, $file_name);
            $path2 = $file_name;
            DB::table('config_game')->update(['image_second_url'=>$path2]);
        }

        DB::table('config_game')->update([
            'name' => $request->name,
            'phrase' => $request->phrase,
            'description_form' => $request->description_form,
        ]);

  	    return redirect('/home');
 	}
}
