<?php

namespace App\Http\Controllers;

class ApproverController extends Controller
{
    function index(){
        return view('pages.approver.dashboardApprovar'); 
    }
}
