<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Animal;

class AnimalesController extends Controller
{
    public function index() {
        $animales = Animal::all();
        $argumentos = array();
        $argumentos['animales'] = $animales;
        return view("animales.index", $argumentos);
    }

    public function create() {
        return view('animales.create');
    }

    public function store(Request $request) {
        $nuevoAnimal = new Animal();
        $nuevoAnimal->especie = $request->input('especie');
        $nuevoAnimal->edad = $request->input('edad');
        $nuevoAnimal->ubicacion = $request->input('ubicacion');
        $nuevoAnimal->descripcion = $request->input('descripcion');

        if ($request->file('foto')) {
            $path_foto = $request->file('foto')->store('public/fotos');
            if ($path_foto) {
                $nuevoAnimal->foto = $request->file('foto')->hashName();
            }
        }

        if($nuevoAnimal->save()) {
            return redirect()->route('animales.index')->with('exito', 'Animal creado');;
        }
        return redirect()->route('animales.create')->with('exito', 'Animal creado');
    }

    public function edit($id) {
        $animal = Animal::find($id);

        if ($animal){
            $argumentos = array();
            $argumentos['animal'] = $animal;
            return view('animales.edit', $argumentos);
        }
        return redirect()->route('animales.index')->with('error', 'No existe el animal');
    }

    public function update($id, Request $request) {
        $animal = Animal::Find($id);
        if ($animal){
            $animal->especie = $request->input('especie');
            $animal->edad = $request->input('edad');
            $animal->ubicacion = $request->input('ubicacion');
            $animal->descripcion = $request->input('descripcion');
            
            if ($request->file('foto')) {
                $path_foto = $request->file('foto')->store('public/fotos');
                if ($path_foto) {
                    $animal->foto = $request->file('foto')->hashName();
                }
            }

            if ($animal->save()) {
                return redirect()->route('animales.index', $animal->id)->with('exito', 'Se actualizo correctamente');
            }

            return edirect()->route('animales.edit', $animal->id)->with('error', 'No se pudo actualizar');
        }

        return redirect()->route('animales.index')->with('error', 'No existe el animal');
    }

    public function destroy($id) {
        $animal = Animal::find($id);
        if ($animal) {
            if($animal->delete()) {
                return redirect()->route('animales.index')->with('exito', 'animal eliminado');
            }
            return redirect()->route('animales.index')->with('error', 'No se encontro el animal a borrar');
        }
        return redirect()->route('animales.index')->with('error', 'No se encontro el animal a borrar');
    }
}
