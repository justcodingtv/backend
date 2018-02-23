<?php
/**
 * Created by PhpStorm.
 * User: sigfried
 * Date: 23.02.18
 * Time: 17:26
 */

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    /**
     * Creates a livestreaming key after the a new user has been created
     *
     * @param User $user
     */
    public function created (User $user)
    {
        $user->livestreamingKey()->create();
    }
}