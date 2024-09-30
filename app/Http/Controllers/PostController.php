<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // $posts = Post:all();
        $posts = [
            [
                'id' => 1,
                'title' => 'title 1',
                'content' => 'bla bla bla bla',
                'created_at' => '2022-03-14T16:47:53.000000Z'
            ],
            [
                'id' => 2,
                'title' => 'title 2',
                'content' => 'bla bla bla bla',
                'created_at' => '2022-03-14T16:47:53.000000Z'
            ],
            [
                'id' => 3,
                'title' => 'title 3',
                'content' => 'bla bla bla bla',
                'created_at' => '2022-03-14T16:47:53.000000Z'
            ],

        ];

        return inertia('Posts/Index', compact('posts'));
    }
}


