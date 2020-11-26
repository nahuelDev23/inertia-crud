<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;


class ForgotPasswordController extends Controller
{
    public function getEmail()
    {
        return Inertia::render('password/Email');
    }

    public function postEmail(Request $request)
    {

    }
}
