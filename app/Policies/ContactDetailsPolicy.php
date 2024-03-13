<?php

namespace App\Policies;

use App\Models\Contact;
use App\Models\ContactDetails;
use App\Models\User;

class ContactDetailsPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ContactDetails $contactDetails): bool
    {
        return $contactDetails->contact->user->id == $user->id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, Contact $contact): bool
    {
        return $contact->user->id == $user->id;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ContactDetails $contactDetails): bool
    {
        return $contactDetails->contact->user->id == $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ContactDetails $contactDetails): bool
    {
        return $contactDetails->contact->user->id == $user->id;
    }

//    /**
//     * Determine whether the user can restore the model.
//     */
//    public function restore(User $user, ContactDetails $contactDetails): bool
//    {
//        //
//    }
//
//    /**
//     * Determine whether the user can permanently delete the model.
//     */
//    public function forceDelete(User $user, ContactDetails $contactDetails): bool
//    {
//        //
//    }

}
