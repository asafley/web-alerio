<?php

namespace App\Policies;

use App\Models\Service;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ServicePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, Service $service): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, Service $service): bool
    {
    }

    public function delete(User $user, Service $service): bool
    {
    }

    public function restore(User $user, Service $service): bool
    {
    }

    public function forceDelete(User $user, Service $service): bool
    {
    }
}
