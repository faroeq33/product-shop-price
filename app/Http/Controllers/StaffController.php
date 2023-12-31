<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class StaffController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        Gate::allowIf(fn (User $user) => $user->isAdmin());

        $users = User::with('roles')->get();

        return view('staff.index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        //
    }


    /**
     * Remove the specified resource from storage.
     */
    public function delete($user) {
        Gate::allowIf(fn (User $user) => $user->isAdmin());

        return view('staff.delete', [
            'user' => User::findOrFail($user),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        Gate::allowIf(fn (User $user) => $user->isAdmin());

        $user = User::find($id);
        $user->delete();

        return redirect('/staff')->with('success', 'Successfully deleted the user!');
    }
}
