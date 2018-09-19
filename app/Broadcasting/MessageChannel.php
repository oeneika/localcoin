<?php

namespace CorpBinary\Broadcasting;

use CorpBinary\User;

class MessageChannel
{
    /**
     * Create a new channel instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Authenticate the user's access to the channel.
     *
     * @param  \CorpBinary\User  $user
     * @return array|bool
     */
    public function join(User $user)
    {
        //
    }
}
