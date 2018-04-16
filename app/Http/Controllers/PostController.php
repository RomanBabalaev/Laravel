<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PostController extends Controller
{
    public function asd()
    {
        $data = ['asd' => 'asd'];
        return view('posts.index', $data);
}
}