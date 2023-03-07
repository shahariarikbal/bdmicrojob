<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function showJob ()
    {
        return view ('backend.job.show-jobs');
    }
}
