<?php

namespace App\Controllers\Web;

class HomeController {
    /**
     * Show Home page
     *
     * @return \Phplite\View\View
     */
    public function index() {
        $title = 'Home Page';

        return view('web.home.index', ['title' => $title]);
    }
}