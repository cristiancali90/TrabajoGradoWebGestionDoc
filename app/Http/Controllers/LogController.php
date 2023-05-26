<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}
class LogController extends Controller
{
    public function __construct() {
        return $this->middleware(['auth','permission:manage']);
    }

    // public function testAddLog()
    // {
    // 	\Log::addToLog('My Testing add-to-log');
    // 	dd('log inserted successfully');
    // }

    public function log()
    {
    	$logs = \Log::logLists();

    	return view('pages.logs',compact('logs'));
    }

    public function logdel()
    {
        \Log::logDelete();

        return redirect('logs');
    }
}
