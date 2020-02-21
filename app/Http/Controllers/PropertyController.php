<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    public function index() {
        //conexao com o banco
        $properties = DB::select('SELECT * FROM properties');

        return view('property/index')->with('properties', $properties);//with -> jogando o objeto para a view
    }

    public function show($name){
        $property = DB::select('SELECT * FROM properties WHERE name = ?', [$name]);

        if(!empty($property)) {
            return view('property/show')->with('property', $property);
        } else{
            return redirect()->action('PropertyController@index');
        }
    }

    public function create() {
        return view('property/create');
    }

    public function store(Request $request) {
        $propertySlug = $this->setName($request->title);
        $property = [
            $request->title,
            $propertySlug,
            $request->description,
            $request->rental_price,
            $request->sale_price
        ];
        DB::insert('INSERT into properties (title, name,  description, rental_price, sale_price) VALUES
                   (?, ?, ?, ?, ?)', $property);

        return redirect()->action('PropertyController@index'); //Redirecionando para um controlador e um método
    }

    public function edit($name){
        $property = DB::select('SELECT * FROM properties WHERE name = ?', [$name]);
        if(!empty($property)){
            return view('property/edit')->with('property', $property);
        } else {
            return redirect()->action('PropertyController@index');
        }
    }

    public function update(Request $request, $id){
        $propertySlug = $this->setName($request->title);

        $property = [
            $request->title,
            $propertySlug,
            $request->description,
            $request->rental_price,
            $request->sale_price,
            $id
        ];
        DB::update('UPDATE properties SET
        title = ?, name = ?, description = ?, rental_price = ?, sale_price = ? WHERE id = ?', $property);

        return redirect()->action('PropertyController@index');
    }

    private function setName($title){ //gerar a url amigavel
        $propertySlug = Str::slug($title);

        $t = 0;

        $properties = DB::select('SELECT * FROM properties');

        foreach($properties as $property) { //verifica se ja há algum imovel com o mesmo titulo, caso tenha, ira adicionar um numero no final da url com a varivael $t
            if(Str::slug($property->title) === $propertySlug){
                $t++;
            }
        }

        if($t > 0){
            $propertySlug = $propertySlug. '-'.$t;
        }

        return $propertySlug;
    }
}
