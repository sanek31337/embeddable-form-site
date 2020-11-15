<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;

class PostController extends Controller
{
    const PAGE_UID = 'post_page';

    public function post(int $postId)
    {
        $faker = Factory::create();

        return view('post', [
            'pageUid' => self::PAGE_UID,
            'postId' => $postId,
            'imageUrl' => $faker->imageUrl(250, 250),
            'postTitle' => $faker->jobTitle,
            'postDescription' => $faker->text(255)
        ]);
    }
}
