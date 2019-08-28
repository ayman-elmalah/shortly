<?php

namespace App\Controllers\Admin;

class DashboardController {
    /**
     * Admin dashboard page
     *
     * @return \Phplite\View\View
     */
    public function index() {
        $title = 'Home page';
        return view('admin.dashboard.index', ['title' => $title]);
    }
}