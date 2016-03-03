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


	if(LinkController::url_exists($url)) {

  
        $ifExist = LinkShortener::where('url', $url);	
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
	return view('home', ['shorturl' => '<a href="'.$shorturl.'">http://dhru.va/'.$shorturl.'</a>']);
	

	}
	else {

	return view('home', ['shorturl' => ' URL does not exist']);
	}

		

    }
    public function getShortLink($shorturl) {
        $url = LinkShortener::where('shorturl', $shorturl);
	if($url->count() == 1) {
		return redirect($url->first()->url);
	}
	else {
		return redirect('');
	}
    }
    public function url_exists($url) {
    	$curl = curl_init();
	curl_setopt_array( $curl, array(
   	CURLOPT_RETURNTRANSFER => true,
    	CURLOPT_URL => $url ) );
	curl_exec( $curl );
	$response_code = curl_getinfo( $curl, CURLINFO_HTTP_CODE );
	curl_close( $curl );
	if($response_code==0) {
		return false;
        }
	return true;
    }
}
