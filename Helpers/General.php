<?php

use Illuminate\Support\Facades\Config;

function get_Languages()
{
    return App\Models\Language::active()->Selection()->get();
}

function get_default_language(){
    return Config::get('app.locale');
}
//this function to upload image 
function uploadImage($folder,$image){

    $image->store('/',$folder);
    $filename=$image->hashName();
    $path = 'images/' . $folder . '/' . $filename;
    return $path;
}




