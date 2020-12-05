<?php

namespace App\Listeners;

use App\Events\increaseScoreCommentEvent;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class increaseScoreCommentListener
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
    public function handle(increaseScoreCommentEvent $event)
    {
        $scoreActualDelAutor = User::select('score')->where('id',$event->user_id)->get();
        User::where('id',$event->user_id)->update(['score'=>$scoreActualDelAutor[0]['score']+100]);
    }
}
