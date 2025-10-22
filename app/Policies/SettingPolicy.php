<?php

namespace App\Policies;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SettingPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, Setting $setting): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, Setting $setting): bool
    {
    }

    public function delete(User $user, Setting $setting): bool
    {
    }

    public function restore(User $user, Setting $setting): bool
    {
    }

    public function forceDelete(User $user, Setting $setting): bool
    {
    }
}
