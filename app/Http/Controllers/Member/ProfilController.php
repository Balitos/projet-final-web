<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $user = auth()->user();
        return view('member.profil.index')->with('user', $user);
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
    public function edit(User $user)
    {
        $user = auth()->user();
        return view('member.profil.edit')->with(['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user = auth()->user();
        
        $name = $request->input('name');
        $lastname = $request->input('lastname');
        $birthday = $request->input('date');
        $email = $request->input('email');

        $user = User::find($user->id);
        $user->name = $name;
        $user->lastname = $lastname;
        $user->birthday = $birthday;
        $user->email = $email;

        if($user->save()){
            $request->session()->flash('success', $user->name . " a bien été modifié");
        }else{
            $request->session()->flash('error', "Le user n'a pas été modifié");
        };

        return redirect()->route('member.profil.index');
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

    public function addCredit(User $user)
    {
        return view('member.profil.addCredit')->with(['user' => $user]);
    }

    public function updateCredit(Request $request, User $user)
    {

        $user = auth()->user();

        $credits = $request->input('credits');

        $user = User::find($user->id);
        $user->credits = $credits;

        if($user->save()){
            $request->session()->flash('success', "Les crédits ont bien été ajouté");
        }else{
            $request->session()->flash('error', "Les crédits n'ont pas été ajouté");
        };

        return redirect()->route('member.profil.index');
    }
}
