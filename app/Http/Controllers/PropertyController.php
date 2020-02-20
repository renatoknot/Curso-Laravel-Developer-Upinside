<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    public function index() {
        //conexao com o banco
        $properties = DB::select('SELECT * FROM properties');

        return view('property/index')->with('properties', $properties);//with -> jogando o objeto para a view
    }

    public function show($id){
        $property = DB::select('SELECT * FROM properties WHERE id = ?', [$id]);

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
        $property = [
            $request->title,
            $request->description,
            $request->rental_price,
            $request->sale_price
        ];
        DB::insert('INSERT into properties (title, description, rental_price, sale_price) VALUES
                   (?, ?, ?, ?)', $property);

        return redirect()->action('PropertyController@index'); //Redirecionando para um controlador e um método
    }
}
