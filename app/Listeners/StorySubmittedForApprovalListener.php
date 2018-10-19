<?php

namespace App\Listeners;

use App\Events\StorySubmittedForApproval;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\StorySubmittedForApprovalMail;
use Illuminate\Support\Facades\Mail;
use App\User;

class StorySubmittedForApprovalListener
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
     * @param  StorySubmittedForApproval  $event
     * @return void
     */
    public function handle(StorySubmittedForApproval $event)
    {
        $story = $event->story;

        $users = User::with('roles')->where('name','council')->get();

        \Log::info($story);
        foreach ($users as $user) {
            Mail::to($user->email)->send(new StorySubmittedForApprovalMail($story));            
        }
        
    }
}
