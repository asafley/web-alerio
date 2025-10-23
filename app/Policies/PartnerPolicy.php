<?php

namespace App\Policies;

use App\Models\Partner;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PartnerPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, Partner $partner): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, Partner $partner): bool
    {
    }

    public function delete(User $user, Partner $partner): bool
    {
    }

    public function restore(User $user, Partner $partner): bool
    {
    }

    public function forceDelete(User $user, Partner $partner): bool
    {
    }
}
