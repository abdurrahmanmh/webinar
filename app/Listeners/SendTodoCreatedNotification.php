<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\TodoCreated;
use App\Notifications\NewTodo;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendTodoCreatedNotification implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TodoCreated $event): void
    {
        User::find($event->todo->user_id)->notify(new NewTodo($event->todo));
    }
}
