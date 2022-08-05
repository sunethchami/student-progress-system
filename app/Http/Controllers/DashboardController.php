<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Traits\StatisticTrait;

class DashboardController extends Controller
{
    use StatisticTrait;
    
    public function index() {

        $result = $this->getStat();

        return view('dashboard.index')->with('result', $result);
    }
}
