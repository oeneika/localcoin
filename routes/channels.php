<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('chat.{transactionId}', function ($user, $transactionId) {
    return $user->id === \CorpBinary\Transaction::findOrNew($orderId)->id_submitting_user || $user->id === Transaction::findOrNew($orderId)->id_receiving_user;
});
