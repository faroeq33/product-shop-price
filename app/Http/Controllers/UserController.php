<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {
    /**
     * Store a newly created resource in storage.
     */
    public function index(Request $request) {
        $user = Auth::user();

        $data = [
            'user' => $user
        ];
        return view('profile.index', $data);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        // Haal de ingelogde gebruiker op

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        $user = User::find($id);

        return view('profile.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        $user = User::find($id);

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];

        $user->update();

        return redirect('/profile');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }
}
