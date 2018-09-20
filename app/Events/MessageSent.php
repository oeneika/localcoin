<?php

namespace CorpBinary\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use CorpBinary\Message;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('chat');
    }
    
    /**
     * The event's broadcast name.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'message_sent';
    }

    /**
     * The event's broadcast name.
     *
     * @return string
     */
    public function broadcastWith()
    {
        return [
            'id_message' => $this->message->id_message,
            'content' => $this->message->content,
            'id_user' => $this->message->id_user,
            'id_transaction' => $this->message->id_transaction,
            'user' => \CorpBinary\User::find($this->message->id_user)->user,
        ];
    }

}
