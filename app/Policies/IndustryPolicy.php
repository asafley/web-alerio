<?php

namespace App\Policies;

use App\Models\Industry;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class IndustryPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, Industry $industry): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, Industry $industry): bool
    {
    }

    public function delete(User $user, Industry $industry): bool
    {
    }

    public function restore(User $user, Industry $industry): bool
    {
    }

    public function forceDelete(User $user, Industry $industry): bool
    {
    }
}
