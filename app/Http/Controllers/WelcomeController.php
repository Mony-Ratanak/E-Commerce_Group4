<?php

// app/Http/Controllers/WelcomeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome(Request $request)
    {
        $name = session('name');
        $sessionId = $request->session()->getId();
        $cookie = cookie('session_id_cookie', $sessionId, 60);

        if ($name) {
            return view('welcome', compact('name', 'sessionId'))->withCookie($cookie);
        } else {
            session(['name' => 'Chanleang']);
            return view('welcome')->withCookie($cookie);
        }
    }
}


