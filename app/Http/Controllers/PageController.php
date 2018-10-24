<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ReportService;

class PageController extends Controller
{

    public function __construct(ReportService $report)
    {
        $this->report = $report;
    }

    /**
     * 
     */
    public function welcome()
    {
        return view('pages.welcome');
    }

    /**
     * 
     */
    public function about()
    {
        return view('pages.about');
    }

    /**
     * 
     */
    public function contact()
    {
        return view('pages.contact');
    }

    /**
     * 
     */
    public function team()
    {
        return view('pages.team');
    }

    public function test ()
    {
        return $this->report->sendWeeklyReport();
    }
}
