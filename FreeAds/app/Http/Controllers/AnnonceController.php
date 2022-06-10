<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdStore;
use App\Models\Annonce;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Auth\RegistersUsers;

class AnnonceController extends Controller
{
    // use RegistersUsers;
    public function index()
    {
        $ads = DB::table('annonces')->orderBy('created_at','DESC')->paginate(5);
        return view('ads', compact('ads'));
    }
    public function create()
    {
        return view('annonce');
    }

    public function store(AdStore $request)
    {
        $validated = $request->validated();
        
        if(!Auth::check()){
            $request->validated([ 
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        $user =  User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
  
            ]);

                auth()->login($user);

        }
        $annonce = new Annonce();
        $annonce->title = $validated['title'];
        // $annonce->title = $validated['photo'];
        $annonce->description = $validated['description'];
        $annonce->price = $validated['price'];
        $annonce->localisation = $validated['localisation'];
        $annonce->user_id = auth()->user()->id;
        $annonce->save();

        return redirect()->route('welcome')->with('success', 'Votre annonce a été postée.');

    }

    public function search(Request $request)
    {
        $words = $request->words;
        
        $ads = DB::table('annonces')
        ->where('title', 'like', '%'.$words.'%')
        ->orWhere('description', 'like', '%'.$words.'%')
        ->orderBy('created_at', 'desc')
        ->get();

        return response()->json(['success' => true, 'ads' => $ads]);
    }
}
