<?php

namespace App\Http\Controllers\Subadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    function index (){
        return 'SubAdmin ok';
    }
}
