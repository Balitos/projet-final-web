<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Mail;
use PDF;
use Gloudemans\Shoppingcart\Facades\Cart;


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

    public function indexCredit(User $user)
    {
        return view('member.profil.indexCredit')->with(['user' => $user]);
    }

    public function updateCredit(Request $request, User $user)
    {

        $user = auth()->user();

        $credits = $request->input('credits');

        $user = User::find($user->id);
        $user->credits += $credits;

        if($user->save()){
            $request->session()->flash('success', "Les crédits ont bien été ajouté");
        }else{
            $request->session()->flash('error', "Les crédits n'ont pas été ajouté");
        };

        return redirect()->route('member.profil.index');
    }

    public function buyGame(Request $request, User $user)
    {
        $user = auth()->user();
        //$game = Game::find(auth()->user()->id);
        $find_user = User::find(auth()->user()->id);
      //  dd($user->email);
        $montant = Cart::Subtotal();
        

        $credits = $find_user->credits;


        if($credits-$montant > 0){
            $newCredit = $credits-$montant;     

        $user->credits = $newCredit;
//Envoie Facture par mail
        $pdf = PDF::loadView('cart/facture');
        $pdf->save('facture.pdf');

        $data["email"] = $user->email;
        $data["title"] = "Votre clé cd";

        $files = [
            public_path('facture.pdf'),
        ];

        Mail::send('cart/facture', $data, function ($message) use ($data, $files) {
            $message->to($data["email"], $data["email"])
                ->subject($data["title"]);

            foreach ($files as $file) {
                $message->attach($file);
            }
        });
///
        //$game->quantity -= 1; 
        $user->save();
        Cart::destroy();
        return redirect()->route('member.profil.index')->with('success', 'Le jeu a bien été acheté, Votre facture a été envoyé par mail');
        } else {
            return redirect()->route('member.profil.index')->with('error', 'Ajoutez des crédits !');
        }
    }
}
