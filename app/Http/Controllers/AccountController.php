<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        if (Gate::denies('user-type')) {
            return redirect('/');
        }

        $users = User::all();

        return view('admin', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (Gate::denies('user-type')) {
            return redirect('dashboard');
        }

        $user = User::find($id);

        if (Gate::denies('adminIsId', $user)) {
            return redirect('dashboard');
        }

        return view('account.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (Gate::denies('user-type')) {
            return redirect('dashboard');
        }

        $user = User::find($id);

        if (Gate::denies('adminIsId', $user)) {
            return redirect('dashboard');
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'type_account' => $request->type_account,
        ]);

        return redirect()->route('user.index', auth()->user()->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Gate::denies('user-type')) {
            return redirect('dashboard');
        }

        $user = User::find($id);

        if (Gate::denies('adminIsId', $user)) {
            return redirect('dashboard');
        }

        $user->delete();

        return redirect()->route('user.index', auth()->user()->id);
    }

    public function login(string $id)
    {
        $user = User::find($id);

        auth()->login($user);

        return redirect()->route('user.index', $user->id);
    }

    public function logout(string $id)
    {
        auth()->logout(User::find($id));
        return redirect('/');
    }

    // public function normal(string $id)
    // {
    //     $user = User::find($id);
    //     if ($this->authorize('normal', $user))
    //         return view('normal');
    //     else return redirect('/');
    // }

    // public function admin(string $id)
    // {
    //     $user = User::find($id);
    //     if ($this->authorize('admin', $user))
    //         return view('admin');
    //     else return redirect('/');
    // }
}
