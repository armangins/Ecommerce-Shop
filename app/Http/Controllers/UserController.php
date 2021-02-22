<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\User;
use Session;

class UserController extends MainController
{
// Middleware
    public function __construct()
    {
        parent::__construct();
        $this->middleware('checkuser', ['except' => ['logOut']]);
    }
// Middleware

// gets login page:
    public function getLogin()
    {
        self::$data['pageTitle'] .= 'Login/Register';
        return view('content.form.login', self::$data);
    }
//  gets login page end

// check the login proccess and validations
    public function postLogin(LoginRequest $request)
    {
        if (User::userCheck($request['email'], $request['password'])) {
            $rn = !empty($request['rn']) ? $request['rn'] : '/';
            return redirect($rn);
        } else {
            self::$data['pageTitle'] .= 'Login';
            self::$data['loginError'] = 'Sorry you entered wrong details';
            return view('content.form.login', self::$data);
        }
    }
// check the login proccess end

// logout deletes session
    public function logOut()
    {
        Session::flush();
        return redirect('user/login');
    }
// logout deletes session

// Gets register page
    public function getRegister()
    {
        self::$data['pageTitle'] .= 'Register';
        return view('content.form.register', self::$data);
    }
    // Gets register page end

    // save new user
    public function postRegister(RegisterRequest $request)
    {
        User::save_new($request);
        return redirect('/');
    }
    // save new user end
}
