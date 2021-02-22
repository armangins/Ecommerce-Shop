<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class User extends Model
{
    // validation for user details
    public static function userCheck($email, $password)
    {
        $auth = false;
        $user = DB::table('users AS u')
            ->join('user_role AS ur', 'u.id', '=', 'ur.uid')
            ->where('u.email', '=', $email)
            ->first();
        if ($user) {
            if (Hash::check($password, $user->password)) {
                $auth = true;
                if ($user->rid == 100) {
                    Session::put('admin', true);
                }
                self::setsess($user, 'Welcome back have a nice shopping');
            }
        }
        return $auth;
    }
    // validation for user details end

//  method to insert new users
    public static function save_new($request)
    {
        $user = new self();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->save();
        $uid = $user->id;
        DB::insert("INSERT INTO user_role VALUES($uid,99)");
        self::setsess($user, 'Thank you for registering ');

    }
    //  method to insert new users end

// function for welcome message for users
    private static function setsess($user, $message)
    {
        Session::flash('toastnew', 'toast-top-center');
        Session::flash('message', $message . ' ' . $user->name);
        Session::put('name', $user->name);
        Session::put('id', $user->id);
    }
}
// function for welcome message for users end
