<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use App\Events\increaseScoreEvent;
class increaseScoreListener
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
     * @param  object  $event
     * @return void
     */
    public function handle(increaseScoreEvent $event)
    {
        $scoreActual = User::select('score')->where('id',auth()->id())->get();
        User::where('id',auth()->id())->update(['score'=>$scoreActual[0]['score']+100]);
    }
}
