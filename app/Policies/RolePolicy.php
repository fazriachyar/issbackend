<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    public function isAdmin(User $user)
    {
        //Log::info('Checking if user is admin', ['user_id' => $user->id]);
        $isAdmin = $user->roles()->where('name', 'admin')->exists();
        //Log::info('Is admin:', ['isAdmin' => $isAdmin]);
        return $isAdmin;
    }
}
