<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        
        return view('comics.index', compact('comics'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::findOrFail($id);

        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_data = $this->validation($request->all());

        $comic = new Comic();

        // SENZA FILLABLE
        // $comic->title = $form_data['title'];
        // $comic->description = $form_data['description'];
        // $comic->thumb = $form_data['thumb'];
        // $comic->cover_image = $form_data['cover_image'];
        // $comic->thumb2 = $form_data['thumb2'];
        // $comic->price = $form_data['price'];
        // $comic->series = $form_data['series'];
        // $comic->sale_date = $form_data['sale_date'];
        // $comic->type = $form_data['type'];
        // $comic->artists = $form_data['artists'];
        // $comic->writers = $form_data['writers'];

        // CON FILLABLE
        $comic->fill($form_data);

        $comic->save();

        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $form_data = $this->validation($request->all());

        $comic->update($form_data);

        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        return redirect()->route('comics.index');
    }

    private function validation($data)
    {
        $validator = Validator::make($data,
        
            // PARAMETRI DI VALIDAZIONE
            [
                'title'         =>  'required|max:50',
                'description'   =>  'required',
                'thumb'         =>  'required',
                'cover_image'   =>  'required',
                'thumb2'        =>  'required',
                'price'         =>  'required|max:10',
                'series'        =>  'required|max:20',
                'sale_date'     =>  'required|max:10',
                'type'          =>  'required|max:20',
                'artists'       =>  'required',
                'writers'       =>  'required',
            ],

            // MESSAGGI DI ERRORE
            [
                'title.required'        =>  'Il titolo è obbligatorio',
                'title.max'             =>  'Il titolo deve avere una lunghezza massima di :max caratteri',

                'description.required'  =>  'La descrizione è obbligatoria',

                'thumb.required'        =>  'La copertina è obbligatoria',

                'cover_image.required'  =>  'La cover image è obbligatoria',

                'thumb2.required'       =>  'La seconda copertina è obbligatoria',

                'price.required'        =>  'Il prezzo è obbligatorio',
                'price.max'             =>  'Il prezzo deve avere una lunghezza massima di :max caratteri',

                'series.required'       =>  'La serie è obbligatoria',
                'series.max'            =>  'La serie deve avere una lunghezza massima di :max caratteri',

                'sale_date.required'    =>  'La data di uscita è obbligatoria',
                'sale_date.max'         =>  'La data di uscita deve avere una lunghezza massima di :max caratteri',

                'type.required'         =>  'La tipologia è obbligatoria',
                'type.max'              =>  'La tipologia deve avere una lunghezza massima di :max caratteri',

                'artists.required'      =>  'Gli artisti sono obbligatori',

                'writers.required'      =>  'Gli scrittori sono obbligatori',
            ]
        
        )->validate();

        return $validator;
    }
}