<?php

namespace App\Observers;

use App\Jobs\NotifyEmailJob;
use App\Jobs\SMSJob;
use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        dispatch(new SMSJob($user, 'User is successfully created'));
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        dispatch(new NotifyEmailJob($user));
        dispatch(new SMSJob($user, 'User successfully deleted'));
    }
}
