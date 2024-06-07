<?php

namespace App\Http\Controllers;

use App\Models\mAllJaminan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Psy\debug;

class Login extends Controller
{
    public function index()
    {

        return view('auth.login');
    }
}
