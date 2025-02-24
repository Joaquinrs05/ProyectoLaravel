<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class CatalogController extends Controller
{

    public function index()
    {
        $arrayPeliculas = Movie::all();
        //Para paginar aqui ponemos paginate(numero de paginacion)
        return view('catalog.index', ['arrayPeliculas' => $arrayPeliculas]);
    }

    public function show($id)
    {
        $pelicula = Movie::find($id);
        if (!$pelicula) {
            abort(404);
        }
        return view('catalog.show', ['pelicula' => $pelicula, 'id' => $id]);
    }

    public function create()
    {
        return view('catalog.create');
    }

    public function edit($id)
    {
        $pelicula = Movie::find($id);
        if (!$pelicula) {
            abort(404);
        }
        return view('catalog.edit', ['pelicula' => $pelicula, 'id' => $id]);
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('catalog.show', $id);
    }

    public function postCreate(Request $request){
        $movie = new Movie();

        $movie->title = $request->input('title');
        $movie->year = $request->input('year');
        $movie->director = $request->input('director');
        $movie->poster = $request->input('poster');
        $movie->synopsis = $request->input('synopsis');


        $movie->rented = false;

        $movie->save();

        session()->flash('succes',"La pelicula se ha registrado exitosamente");

        return redirect()->route('catalog.index');
    }
    public function putEdit(Request $request, $id){
        $movie = Movie::findOrFail($id);

        $movie->title = $request->input('title');
        $movie->year = $request->input('year');
        $movie->director = $request->input('director');
        $movie->synopsis = $request->input('synopsis');

        $movie->save();

        session()->flash('succes',"La pelicula se ha Editado exitosamente");


        return redirect()->route('catalog.show', ['id' => $id]);
    }


    public function rent(Request $request, $id){
        $movie = Movie::findOrFail($id);

        $movie->rented = true;

        $movie->save();

        session()->flash('succes',"Buena eleccion");

        return redirect()->route('catalog.index');
    }

    public function return(Request $request, $id){
        $movie = Movie::findOrFail($id);

        $movie->rented = false;

        $movie->save();

        session()->flash('succes',"Buena eleccion");

        return redirect()->route('catalog.index');
    }

    public function delete($id){
        $movie = Movie::findOrFail($id);

        $movie->delete();
        session()->flash('succes',"La pelicula se ha eliminado exitosamente");
        return redirect()->route('catalog.index');
    }
}
