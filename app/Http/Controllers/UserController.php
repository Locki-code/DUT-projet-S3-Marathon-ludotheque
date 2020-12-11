<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller {
    function profil() {
        return view('users.profile');
    }
}
