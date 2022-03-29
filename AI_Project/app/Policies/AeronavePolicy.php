<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AeronavePolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->isDirecao()) {
            return true;
        }
    }

    public function pilotosAutorizados(User $auth)
    {
        return false;
    }

    public function precos(User $auth)
    {
        return false;
    }

    public function create(User $auth)
    {
        return false;
    }

    public function update(User $auth)
    {
        return false;
    }

    public function delete(User $auth)
    {
        return false;
    }
}
