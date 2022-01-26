<?php

namespace App\Http\Controllers;

use App\Seedling;
use Illuminate\Http\Request;
use DB;
use Auth;
use Gate;
use Illuminate\Support\Facades\Storage;

class SeedlingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $seedlings = Seedling::all();

        return view('seedling.seedling')->with('seedlings', $seedlings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('seedling.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'cover_image' => 'required|mimes:png,jpg,jpeg|max:5048',
            'description' => 'required',
            'type' => 'required',
        ]);

        $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
        $doc = $request->file('cover_image'); //sada
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('cover_image')->getClientOriginalExtension();
        $filenameToStore = $filename . '_' . time() . '.' . $extension;

        Storage::disk('public')->putFileAs(
            'uploads/seedlings/',
            $doc,
            $filenameToStore
        );

        $seedling = new Seedling();
        $seedling->name = $request->name;
        $seedling->cover_image = $filenameToStore;
        $seedling->description = $request->description;
        $seedling->type = $request->type;

        if($seedling->save()){
            echo "Upload Successfully";

            $request->session()->flash('success', "Sadnica " . $seedling->name . ' je uspješno objavljena');
            //return redirect('home');
            return redirect()->route('seedlings.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Seedling  $seedling
     * @return \Illuminate\Http\Response
     */
    public function show(Seedling $seedling)
    {
        $seedling = Seedling::findOrFail($seedling->id);
    
        return view('seedling.show')->with('seedling', $seedling);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Seedling  $seedling
     * @return \Illuminate\Http\Response
     */
    public function edit(Seedling $seedling)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seedling  $seedling
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seedling $seedling)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Seedling  $seedling
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seedling $seedling)
    {
        if($seedling->delete()){
            $path = storage_path().'/app/public/uploads/seedlings/'.$seedling->cover_image;
            unlink($path);
            session()->flash('success', "Stavka " . $seedling->name . ' je uspješno izbrisana');

        }else{
            session()->flash('error', 'Došlo je do greške prilikom brisanja stavke - ' . $seedling->name . '!');
        }

        if(Gate::denies('delete-users')){
            return redirect()->route('home');
        }

        return redirect()->route('seedlings.index');
    }
}
