<?php

namespace App\Controllers\Web;

use App\Models\Link;
use Phplite\Http\Request;
use Phplite\Session\Session;
use Phplite\Validator\Validate;

class LinksController {
    /**
     * User links
     *
     * @return \Phplite\View\View
     */
    public function mylinks() {
        $title = "My links";
        $links = Link::where('user_id', '=', auth('users')->id)->paginate();

        return view('web.links.index', ['title' => $title, 'links' => $links]);
    }

    /**
     * Store link
     *
     * @return \Phplite\Url\Url
     */
    public function store() {
        Validate::validate([
            'full_link' => 'required|url',
        ]);
        $short_url= unique('links', 'short_link');
        $link = Link::insert(['full_link' => Request::post('full_link'), 'short_link' => $short_url, 'user_id' => auth('users')->id]);

        Session::set('message', 'The link saved successfully and the link is ' . url('link/' . $link->short_link));
        return redirect(previous());
    }

    /**
     * Delete link by the given id
     *
     * @params int $id
     * @return \Phplite\Url\Url
     */
    public function delete($id) {
        $link = Link::where('id', '=', $id)->where('user_id', '=', auth('users')->id)->first();
        if (! $link) {
            Session::set('message', 'The link is not found');
            return redirect(previous());
        }
        Link::where('id', '=', $id)->delete();

        Session::set('message', 'The link is deleted successfully');
        return redirect(previous());
    }

    /**
     * The link redirector
     *
     * @params string $link
     * @return \Phplite\Url\Url
     */
    public function link($link) {
        $link = Link::where('short_link', '=', $link)->first();
        if (! $link) {
            return view('errors.404');
        }
        return redirect($link->full_link);
    }
}