<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class UserCon extends Controller
{
    public function index()
    {
        $user = DB::table('users')->get();
        return view('user', ['user' => $user]);
    }

    public function delete($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect('/user');
    }
}
