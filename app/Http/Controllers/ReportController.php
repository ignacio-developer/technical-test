<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{

    /*
    protected $reportService;

    public function __construct(ReportService $reportService) 
    {
        $this->reportService = $reportService;
    }

    */

    protected $reports;

    public function index() 
    {
        return Report::all();
    }

}
