<?php


namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function populate()
    {
        $factory = Factory::create();
        for ($j = 0; $j > 10; $j++) ;
        $post = new Post();
        $post->title = $factory->sentence();
        $post->content = $factory->text(100);
        $post->user_id = rand(1, 10);
        $post->save();

    }

        //return 'Populated';


    public function index()
    {
      $data =[
          'posts'=> Post::all()
      ];
      return view('posts.index', $data);
}

    public function store()
    {
        
}
}
