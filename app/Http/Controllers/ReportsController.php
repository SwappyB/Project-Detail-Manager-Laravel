<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use DB;
use Carbon\Carbon;
use App\Customer;
use App\Member;
use App\Work;

class ReportsController extends Controller
{
    // check auth

    public function __construct()
    {
        $this->middleware('auth');
    }

    // main page
    // display form

    public function index()
    {
        return view('report.index');
    }

    // Display search results
    public function view(Request $request)
    {
        $projects = DB::select('SELECT * FROM projects where datestarted between ? and ? order by datestarted desc',[$request->input('start'),$request->input('till')]);
        return view('report.view')->with('data',$projects);
    }
}
