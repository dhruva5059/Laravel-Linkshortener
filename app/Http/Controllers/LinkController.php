<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\LinkShortener;
use Illuminate\Support\Facades\Input;

class LinkController extends Controller
{
    public function createShortLink() {
        $url = Input::get('url');
        
        $ifExist = LinkShortener::where('url', $url)->first();

        if($ifExist->count() === 1) {
          echo 'ShortURL: '. $ifExist->first()->shorturl;
        }
        else {
	  echo 'URL: '. $url;
        }
    }
    public function getShortLink() {
     
    }
}
