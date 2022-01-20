<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WokenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (isset($request->palabras)) {
            $abecedario_morse = [
                "a" => ".-",
                "b" => "-...",
                "c" => "-.-.",
                "d" => "-..",
                "e" => ".",
                "f" => "..-.",
                "g" => "--.",
                "h" => "....",
                "i" => "..",
                "j" => ".---",
                "k" => "-.-",
                "l" => ".-..",
                "m" => "--",
                "n" => "-.",
                "o" => "---",
                "p" => ".--.",
                "q" => "--.-",
                "r" => ".-.",
                "s" => "...",
                "t" => "-",
                "u" => "..-",
                "v" => "...-",
                "w" => ".--",
                "x" => "-..-",
                "y" => "-.--",
                "z" => "--.."
            ];
            // Se genera un arreglo con las palabras transformadas en codigo morse
            $palabras_morse = [];
            foreach ($request->palabras as $key => $value) {
                $palabras_morse[$key] = '';
                for ($i = 0; $i < strlen($value); $i++) {
                    foreach ($abecedario_morse as $letra => $letra_morse) {
                        if ($letra == $value[$i]) {
                            $palabras_morse[$key] = $palabras_morse[$key] . $letra_morse;
                        }
                    }
                }
            }
            // Se genera un arreglo con la posicion en el codigo morse original en caso de encontrarla
            $posicion_morse = [];
            foreach ($palabras_morse as $key => $value) {
                $coincidencia = strpos($request->morse, $value);
                $posicion_morse[$key] = $coincidencia;
            }

            $i = 0;
            $contador = $this->contador($palabras_morse, $posicion_morse, 0, $request->morse, $i); // Se envian algunos parametros nesarios a una nueva funcion recursiva
            return view('welcome', compact('request', 'contador', 'palabras_morse', 'posicion_morse'));
        }
        return view('welcome', compact('request'));
    }

    public function contador($palabras_morse, $posicion_morse, $tamaño_palabra, $morse, &$i)
    {
        foreach ($posicion_morse as $key => $value) { // Recorre la posicion de las palabras en el codigo morse original
            if ($value === $tamaño_palabra) { // En caso de que su posicion inicial sea igual a la del termino de la palabra anterior o 0 en el valor inicial
                $tamaño_nueva_palabra = strlen($palabras_morse[$key]); // cuenta el tamaño de la nueva palabra que se esta comparando
                if ($tamaño_palabra + $tamaño_nueva_palabra == strlen($morse)) { // en caso de que ambas palabras sumadas sean igual al largo del morse original
                    $i++; // se suma al conteo final
                } elseif ($tamaño_palabra + $tamaño_nueva_palabra < strlen($morse)) { // en caso de que sumen menos se repite el proceso, de lo contrario continua con otra palabra
                    $this->contador($palabras_morse, $posicion_morse, $tamaño_palabra + $tamaño_nueva_palabra, $morse, $i);
                }
            }
        }
        return $i;
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
        // 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
