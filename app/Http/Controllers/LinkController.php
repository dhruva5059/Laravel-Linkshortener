<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;

class LinkController extends Controller
{
    public function createShortLink() {
        $url = Input::get('url');
	echo 'URL: '. $url;
    }
}
