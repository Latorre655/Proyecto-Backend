<?php

use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/formulario", function(){
    return view("form");
});



Route::get('/contacto', function (HttpRequest $request) {
    echo "<pre>";
    print_r ($request -> get("nombre"));
    echo "</pre>";
});

Route::get('/php-basico', function () {

    echo "<h1> Variables..... </h1>";

    $apellido = "Latorre";
    $nombre = "Johan";

    $nombrecompleto = $nombre . " " . $apellido;
    $age = rand(10,54);
    $height = 1.75;
    $islogin = (bool) rand(0,1);
     echo $nombrecompleto;

     echo"<br><h2>**************************** ESTRUCTURAS DE DATOS ********************</br></h2>";
    $menssage = "Soy $nombrecompleto, tengo $age años!!!<br>";

    echo $menssage;

    if ($age <18){
        $menssage = $menssage . "Soy menor de edad<br>";
    } else if($age > 50){
        $menssage .= "Eres adulto mayor<br>";

    } else{
            $menssage .= "Eres adulto<br>";
        };

    echo $menssage;

    $menssage .= " ".($islogin ? "Estoy logueado" : "No estoy logueado").".<br>";

    echo "<br>********************** FUNCIONES *****************<br>";

    echo printUser($nombrecompleto, $age);

    $productNames = ["Computaodr", "Teclado", 25, true, false];
    $teclado = [
        "name" => "teclado hp",
        "marca" => "HP",
        "precio" => 20000,
        "distribuciones" => [
            "latino",
            "mexico",
            "americano"
        ]
    ];
    $teclado["marca"] = "LG";
    echo $teclado["name"];

    foreach ($productNames as $item){
         echo $item;
    }

});

Function printUser(string $nombre, int $age){
    return "<br>$nombre tiene $age años.<br>";
}
