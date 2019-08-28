<?php

namespace App\Controllers\Admin;

use App\Models\Link;
use App\Models\User;
use Phplite\Session\Session;

class LinksController {
    /**
     * Show list of links
     *
     * @return \Phplite\View\View
     */
    public function index() {
        $links = Link::get();
        foreach($links as $link) {
            $link->user = User::where('id', '=', $link->user_id)->first();
        }
        $title = 'links';

        return view('admin.links.index', ['links' => $links, 'title' => $title]);
    }

    /**
     * delete existing link
     *
     * @return \Phplite\Url\Url
     */
    public function delete($id) {
        $link = Link::where('id', '=', $id)->first();

        if (! $link) {
            Session::setFlash('message', 'The link is not found');
            return redirect(previous());
        }

        Link::where('id', '=', $id)->delete();

        Session::setFlash('message', 'The link is deleted successfully');
        return redirect(previous());
    }
}