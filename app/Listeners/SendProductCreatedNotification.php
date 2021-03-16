<?php

namespace App\Listeners;

use App\Events\ProductCreated;
use App\Mail\ProductCreatedMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class SendProductCreatedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProductCreated  $event
     * @return void
     */
    public function handle(ProductCreated $event)
    {
        // Fetch all users
        $users = User::all();
        foreach($users as $user) {
            Mail::to($user)->send(new ProductCreatedMail($event->product));
        }
    }
}
