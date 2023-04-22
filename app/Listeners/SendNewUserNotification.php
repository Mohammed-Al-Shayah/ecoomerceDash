<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\AdminNotification;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class SendNewUserNotification
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
    public function handle(object $event): void
    {
        $admins = User::whereHas('roles', function ($query) {
            $query->where('id', 1);
        })->get();

    FacadesNotification::send($admins, new AdminNotification($event->user));
    }
}
