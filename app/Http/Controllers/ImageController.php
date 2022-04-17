<?php

namespace App\Http\Controllers;

use App\Models\SuiteImage;
use Illuminate\Http\Request;

class ImageController extends Controller {
    /**
     * Show images.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $images = SuiteImage::all();
        return view('editSuite', compact('images'));
    }
}
