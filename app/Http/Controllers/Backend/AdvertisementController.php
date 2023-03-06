<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    public function showAdvertisement ()
    {
        return view ('backend.advertisement.show-advertisements');
    }
}
