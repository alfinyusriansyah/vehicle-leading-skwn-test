<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    function index(){
        return view('pages.admin.dashboardAdmin');
    }
}
