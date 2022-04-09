<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller {
    /**
     * Show images.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $images = Image::all();
        return view('editSuite', compact('images'));
    }
}
