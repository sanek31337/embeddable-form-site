<?php

namespace App\Http\Controllers;

use App\Entities\Post;
use Faker\Factory;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    const PAGE_UID = 'homepage';

    public function show()
    {
        $faker = Factory::create();

        $fakePosts = [];
        for ($i = 0; $i < 10; $i++)
        {
            $post = new Post($i, $faker->jobTitle, $faker->text(255), $faker->imageUrl(250, 250));

            $fakePosts[] = $post;
        }

        return view('homepage', [
            'posts' => $fakePosts,
            'pageUid' => self::PAGE_UID
        ]);
    }
}
