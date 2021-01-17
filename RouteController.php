<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function param(int $id = 2)
    {
        return 'id 値: ' . $id;
    }

    public function search($keywd)
    {
        return 'keywd : ' . $keywd;
    }
}
