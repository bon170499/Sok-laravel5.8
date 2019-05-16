<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Auth;
use Hash;

class loginController extends Controller
{
    public function getSignUp(Request $request)
    {
        if ($request->ajax()) {
            $name = $request->get('name');
            $email = $request->get('email');
            $pass = $request->get('pass');
            $data = DB::table('users')->where('email', $email)->Count();
            if ($data > 0)
                $output = "datontai";
            else {
                $output = "chuatontai";
            }
            $result = [
                'item' => $output
            ];
            echo json_encode($result);
        }
    }
    public function getLogin(Request $request)
    {
        if ($request->ajax()) {
            $email = $request->get('email');
            $pass = $request->get('pass');
            $data = DB::table('users')->where('email', $email)->Count();
            if ($data > 0)
                $output = "datontai";
            else {
                $output = "chuatontai";
            }
            $result = [
                'item' => $output,
                'pass' => $pass
            ];
            echo json_encode($result);
        }
    }
}
