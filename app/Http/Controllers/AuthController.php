<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::all();
        return view('dashboard', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string| min:6',
            'address' => 'required|string|max:255',
            'phone' => 'required|string| max:12',
            'situation_matrimoniale' => 'required|string|max:255',
            'date_naissance' => 'required |date',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);

        }

        $user = User::create ([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'phone' => $request->phone,
            'situation_matrimoniale' => $request->situation_matrimoniale,
            'date_naissance' => $request->date_naissance,
        ]);

        return redirect('/dashboard')->with('success','utilisateur crée avec succes');



    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)

    {
        $user = User::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required | string | max:255',
            'email' => 'required | email|unique:users,email,'.$user->id,
            'password' => 'required | string | min:6',
            'address' => 'required | string | max:255',
            'phone' => 'required | string | max:255',
            'situation_matrimoniale' => 'required | string | max:255',
            'date_naissance' => 'required | date | max:255',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);

        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->adress = $request->address;
        $user->phone = $request->phone;
        $user->situation_matrimoniale = $request->situation_matrimoniale;
        $user->date_naissance = $request->date_naissance;
        $user->save();

        return redirect('dashnoard')->with('sucess','utilisateur mis à jour avec succes');




    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('dashnoard')->with('sucess','utilisateur supprimer avec succes');

    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',

        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();


        }

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return back()->withErrors(['email' => 'Email ou mot de passe incorrect']);

        }

        $request->session()->regenerate();
        return redirect('/dashboard')->with('sucess','connexion avec succes');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success','deconnexion avec succes');
    }




}
