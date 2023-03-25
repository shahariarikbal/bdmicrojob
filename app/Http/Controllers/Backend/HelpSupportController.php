<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HelpSupportController extends Controller
{
    public function showHelpSupport ()
    {
        return view ('backend.help_support.show-help-support');
    }
}
