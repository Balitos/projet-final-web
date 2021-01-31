<?php

namespace App\Http\Controllers;
use App\Review;
use App\Game;
use App\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Game $game)
    {
        return view('review.create')->with(['game' => $game]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Game $game)
    {
        $user = User::find(auth()->user()->id);
        $game_id = Game::find($game->id);
        $titre = $request->input('titre');
        $contenu = $request->input('contenu');
        $note = $request->input('note');



        $review = new Review();
        $review->titre = $titre;
        $review->avis = $contenu;
        $review->note = $note;
        $review->game_id = $game_id;
        $review->user_id = $user;
    

       // $review->save();

        if($review->save()){
            $request->session()->flash('success', "Merci pour votre avis");
        }else{
            $request->session()->flash('error', "L'avis n'as pas pu être posté");
        };

        return redirect()->route('member.game.show');
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
    public function edit(Review $review)
    {
        return view('review.edit')->with('review', $review); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Review $review)
    {
        $titre = $request->input('titre');
        $contenu = $request->input('contenu');
        $note = $request->input('note');



        $review = Review::find($review->id);
        $review->titre = $titre;
        $review->avis = $contenu;
        $review->note = $note;
    

        $review->save();

        if($review->save()){
            $request->session()->flash('success', "Votre avis a été modifé");
        }else{
            $request->session()->flash('error', "Votre avis n'a pas pu être modifié");
        };

        return redirect()->route('member.game.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('member.game.show');
    }
}
