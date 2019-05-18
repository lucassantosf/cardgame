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
    $data = DB::table('config_game')->get();
    $cards = Card::all();
    return view('preview',compact('data','cards'));
  }

  //Exibir form configs pela primeira vez 
  public function index(){
    //show form configs
    $data = DB::table('config_game')->get();
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
    $path1 = $request->file('image_background_url')->store('images','public');
    $path2 = $request->file('image_second_url')->store('images','public');  
    DB::table('config_game')->updateOrInsert([
  		'name' => $request->input('name'),
  		'phrase' => $request->input('phrase'),
  		'description_form' => $request->input('description_form'),
  		'image_background_url' => $path1,
  		'image_second_url' => $path2
  	]); 
  	return redirect('/home');
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
 		//Verificar se foi alterado imagem do background
  	if($request->file('image_background_url') != NULL){
 			$img1 = $request->input('img_back'); 
 			//apagar arquivo existente
      $file = $img1;
      Storage::disk('public')->delete($file);
      //salvar novo arquivo
      $path = $request->file('image_background_url')->store('images','public');
      //salvar referencia no bd
      DB::table('config_game')->update(['image_background_url'=>$path]); 
 		} 
 		//Verificar se foi alterado imagem de destaque
 		if($request->file('image_second_url') != NULL){
 			$img2 = $request->input('img_sec'); 
 			//apagar arquivo existente
      $file = $img2;
      Storage::disk('public')->delete($file);
      //salvar novo arquivo
      $path = $request->file('image_second_url')->store('images','public');
      //salvar referencia no bd
      DB::table('config_game')->update(['image_second_url'=>$path]); 
 		}   
    DB::table('config_game')->update([
  		'name' => $request->input('name'),
  		'phrase' => $request->input('phrase'),
  		'description_form' => $request->input('description_form'), 
  	]); 
  	return redirect('/home');    	
 	}
}
