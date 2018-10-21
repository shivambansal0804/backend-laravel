<?php

namespace App\Services;

use Carbon\Carbon;
use App\Mail\DailyReportMail;
use App\User;
use App\Story;


class ReportService 
{

    public function sendDailyReport()
    {
        dump('called');
        $council = User::with('roles')->where('name','council')->get();
        $stats =  $this->getDailyStats();

        foreach ($council as $user) {
            \Mail::to($user->email)->send(new DailyReportMail($stats)); 
        }
    }

    public function getDailyStats()
    {        
        return [ 
            'drafts' => $this->storyWithStatusAndDate('draft', Carbon::now()), 
            'pendings' => $this->storyWithStatusAndDate('pending', Carbon::now()), 
            'published' => $this->storyWithStatusAndDate('published', Carbon::now()), 
        ];
    }

    public function storyWithStatusAndDate($status, $date)
    {
        return Story::whereDate('created_at', $date)->where('status', $status)->with('user')->get();
    }
}