<?php

namespace App\Listeners;

use App\Events\ChangePrice;
use App\Models\Product;
use App\Models\User;
use App\Notifications\ProductNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class ChangePriceListener
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
     * @param \App\Events\ChangePrice $event
     * @return void
     */
    public function handle(ChangePrice $event)
    {
        $item = Product::query()->findOrFail($event->product);
        $user_ids = $item->changePrice->pluck('user_id')->toArray();
        $users = User::whereIn('id', $user_ids)->get();
        Notification::send($users, new ProductNotification($item, true));
    }
}
