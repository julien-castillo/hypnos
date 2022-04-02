<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuiteController extends Controller
{
    public function index() {
        return view('suites');
    }
}
