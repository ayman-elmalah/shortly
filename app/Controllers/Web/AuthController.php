<?php

namespace App\Controllers\Web;

use App\Models\User;
use Phplite\Cookie\Cookie;
use Phplite\Http\Request;
use Phplite\Session\Session;
use Phplite\Validator\Validate;

class AuthController {
    /**
     * User login page
     *
     * @return \Phplite\View\View
     */
    public function index() {
        $title = 'User Login';
        return view('web.auth.login', ['title' => $title]);
    }

    /**
     * User login page
     *
     * @return \Phplite\Url\Url
     */
    public function login() {
        Validate::validate([
            'user_name' => 'required|min:6|max:191',
            'password' => 'required|min:6|max:191',
            'remember' => 'in:on',
        ]);

        $user = User::where('user_name', '=', Request::post('user_name'))->first();
        if (! $user) {
            Session::setFlash('message', 'The user is not found');
            return redirect(previous());
        }

        if (! password_verify(Request::post('password'), $user->password)) {
            Session::setFlash('message', 'The user is not found');
            return redirect(previous());
        }

        Request::post('remember') == 'on' ? Cookie::set('users', $user->id) : Session::set('users', $user->id);

        return redirect(url('my-links'));
    }

    /**
     * Show register form for user
     *
     * @return \Phplite\View\View
     */
    public function showRegisterForm() {
        $title = 'User Register';
        return view('web.auth.register', ['title' => $title]);
    }

    /**
     * User register
     *
     * @return \Phplite\Url\Url
     */
    public function register() {
        Validate::validate([
            'first_name' => 'required|min:2|max:30',
            'last_name' => 'required|min:2|max:30',
            'user_name' => 'required|min:6|max:30|unique:users,user_name',
            'password' => 'required|min:6|max:50',
        ]);

        $user = User::insert(['first_name' => Request::post('first_name'), 'last_name' => Request::post('last_name'), 'user_name' => Request::post('user_name'), 'password' => password_hash(Request::post('password'), PASSWORD_BCRYPT)]);
        Session::set('users', $user->id);

        return redirect(url('my-links'));
    }

    /**
     * Logout User
     *
     * @return \Phplite\Url\Url
     */
    public function logout() {
        Cookie::remove('users');
        Session::remove('users');

        return redirect(url('/'));
    }
}