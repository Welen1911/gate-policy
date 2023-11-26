<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function index(User $user)
    {
        if (auth()->user()->id == $user->id) {
            if (auth()->user()->type_account == 'normal') {
                return redirect()->route('user.normal', auth()->user()->id);
            } else {
                return redirect()->route('user.admin', auth()->user()->id);
            }
        } else {
            return redirect('/');
        }
    }

    public function normal(User $user)
    {
        if (auth()->user()->id == $user->id) {
            return auth()->user()->type_account == 'normal';
        } else {
            return redirect('/');
        }
    }

    public function admin(User $user)
    {
        if (auth()->user()->id == $user->id) {
            return auth()->user()->type_account == 'admin';
        } else {
            return redirect('/');
        }
    }
}
