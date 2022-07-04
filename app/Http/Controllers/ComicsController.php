<?php

namespace App\Http\Controllers;

use App\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ComicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Comics = Comic::all();
        return view('comics.index', compact('Comics'));
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
        #1 Method
            // $data = $request->all();

            // $new_comic = new Comic;
            // $new_comic->title = $data['title'];
            // $new_comic->image = $data['image'];
            // $new_comic->type = $data['type'];
            // $new_comic->save();
        #

        # validation
            $request->validate(
                [
                    'title' => 'required|max:50|min:3',
                    'image' => 'required|max:255|min:10',
                    'type' => 'required',
                ],
                /* Personalizzazione dei messaggi d'errore
                    [
                        'title.required' => 'Il campo nome è obbligatorio',
                        'title.max' => 'Il campo nome deve avere al massimo :max caratteri',
                        'title.min' => 'Il campo nome deve avere minimo :min caratteri',

                        'image.required' => 'Il campo image è obbligatorio',
                        'image.max' => 'Il campo image deve avere al massimo :max caratteri',
                        'image.min' => 'Il campo image deve avere minimo :min caratteri',

                    ]
                */
            );
        #

        #2 Method
            $data = $request->all();
            $data['slug'] = $this->createSlug($data['title']);
            $new_comic = new Comic;
            $new_comic->fill($data);
            $new_comic->save();
        #

        return redirect()->route('Comics.show', $new_comic);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $Comic)
    {
        // $comic = Comic::find($id);
        if($Comic){
            return view('comics.show', compact('Comic'));
        }
        abort(404, 'Product not present in the database');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $Comic)
    {
        // $comic = Comic::find($id);
        if($Comic){
            return view('Comics.edit', compact('Comic'));
        }
        abort(404, 'Product not present in the database');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $Comic)
    {
        #metodo per prendere il Comic, oppure inserirlo nei parametri con Comic $Comic

        # validation
        $request->validate(
            [
                'title' => 'required|max:50|min:3',
                'image' => 'required|max:255|min:10',
                'type' => 'required',
            ],
        );
    #

        $data = $request->all();

        if($Comic->title != $data['title']){
            $data['slug'] = $this->createSlug($data['title']);
        }else{
            $data['slug'] = $Comic->slug;
        }

        $Comic->update($data);
        return redirect()->route('Comics.show', $Comic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $Comic)
    {
        // anche se di default richiede $id per noi è più comodo ricevere l'entità, quindi passo come parametro Comic $comic, dietro le quinte esegue una query di ricerca per ID ( $Comic = Comic::find($id))

        $Comic->delete();
        // con with metto in sessione l'avvenuta eliminazione
        return redirect()->route('Comics.index')->with('deleted_product', "the comic '$Comic->title' was successfully deleted");
    }

    private function createSlug($string){
        $slug = Str::slug($string , '-');
        $control_slug = Comic::where('slug', $slug)->first();
        $i = 0;
        while($control_slug){
            $slug = Str::slug($string , '-') . '-' .  $i;
            $i++;
            $control_slug = Comic::where('slug', $slug)->first();
        }
        return $slug;
    }
}
