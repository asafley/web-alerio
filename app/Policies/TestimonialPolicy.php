<?php

namespace App\Policies;

use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TestimonialPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, Testimonial $testimonial): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, Testimonial $testimonial): bool
    {
    }

    public function delete(User $user, Testimonial $testimonial): bool
    {
    }

    public function restore(User $user, Testimonial $testimonial): bool
    {
    }

    public function forceDelete(User $user, Testimonial $testimonial): bool
    {
    }
}
