<?php

namespace App\Http\Controllers\Admin;

use App\Game;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::all();
        return view('admin.game.index')->with('games', $games);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.game.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
        };

        if($request->hasFile('image')){
            $fileNameWithExt = $request->file('image')->getClientOriginalName();   
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);     
            $extension = $request->file('image')->getClientOriginalExtension();         
            $fileNameToStore = $fileName.'.'.$extension;
            $path = $request->file('image')->storeAs('public/image', $fileNameToStore);

        }
        else
        {
            $fileNameToStore = 'noimage.jpg';
        }
        $name = $request->input('name');
        $description = $request->input('description');
        $quantity = $request->input('quantity');
        $price = $request->input('price');
        $activationCode = $request->input('activationCode');
        $platform = $request->input('platform');


        $game = new Game();
        $game->name = $name;
        $game->description = $description;
        $game->quantity = $quantity;
        $game->price = $price;
        $game->activationCode = $activationCode;
        $game->platform = $platform;
        
        
        $game->image = $fileNameToStore;

        $game->save();

        if($game->save()){
            $request->session()->flash('success', $game->name . " a bien été crée");
        }else{
            $request->session()->flash('error', "Le jeu n'a pas été crée");
        };

        return redirect()->route('admin.game.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        return view('admin.game.edit')->with('game', $game); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        if ($request->hasFile('image')) {
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
        };

        if($request->hasFile('image')){
            $fileNameWithExt = $request->file('image')->getClientOriginalName();   
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);     
            $extension = $request->file('image')->getClientOriginalExtension();         
            $fileNameToStore = $fileName.'.'.$extension;
            $path = $request->file('image')->storeAs('public/image', $fileNameToStore);

        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }

        $name = $request->input('name');
        $description = $request->input('description');
        $quantity = $request->input('quantity');
        $price = $request->input('price');
        $activationCode = $request->input('activationCode');
        $platform = $request->input('platform');


        $game = Game::find($game->id);
        $game->name = $name;
        $game->description = $description;
        $game->quantity = $quantity;
        $game->price = $price;
        $game->activationCode = $activationCode;
        $game->platform = $platform;
        $game->image = $fileNameToStore;

        if($game->save()){
            $request->session()->flash('success', $game->name . " a bien été modifié");
        }else{
            $request->session()->flash('error', "Le jeu n'a pas été modifié");
        };

        return redirect()->route('admin.game.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game, Request $request)
    {
        $game->delete();
        return redirect()->route('admin.game.index');
    }
}
