<?php
namespace App\Helpers;
use TCG\Voyager\Models\Page;
use App\Property;

class Default {
 
 public static function docFormats($returnArray = true)
 {
     $allowedFormats = setting('documents.allowed_formats');
     if(trim($allowedFormats) == '') {
      return [];
     }
     $allowedFormats = explode(',', $allowedFormats);
     $mimes = collect($allowedFormats)->transform(function($format){
        return trim($format);
     })->all();
     return ($returnArray === true) ? $mimes : implode(',', $mimes);
 }

 public static function pageBlock($slug) {
 	$page = Page::where(['slug' => $slug, 'status' => 'ACTIVE'])->first();
 	return optional($page, null)->body;
 }

}
