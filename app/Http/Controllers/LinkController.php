<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\LinkShortener;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;

class LinkController extends Controller
{


    public function createShortLink() {
        $url = Input::get('url');        
        $ifExist = LinkShortener::where('url', $url);
	echo 'hiii';
       if($ifExist->count() == 1) { 
          $shorturl = $ifExist->first()->shorturl;
        }
        else {
          
	   $insert = LinkShortener::create(array('url' => $url));
           if($insert) {
	  	$shorturl = base_convert($insert->id, 10, 36);
		LinkShortener::where('id',$insert->id)->update(array('shorturl' =>  $shorturl));
           }
        }
	//return redirect('')->with('shorturl','<a href="'.$shorturl.'">'.$shorturl.'</a>');
        return view('')->with('shorturl','<a href="google123">google123</a>');
    }


    public function getShortLink($shorturl) {
        $url = LinkShortener::where('shorturl', $shorturl);
	if($url->count() == 1) {
		//echo "inside if";
		return redirect($url->first()->url);
	}
	else {
		//echo 'inside else';
		return redirect('');
	}
    }
}
