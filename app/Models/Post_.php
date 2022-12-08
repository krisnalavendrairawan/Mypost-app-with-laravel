<?php

namespace App\Models;


class Post
{
    static $blog_posts =
    [
        [
            'title' => 'judul post pertama',
            'slug' => 'judul-post-pertama',
            'author' => 'Krisna Lavendra Irawan',
            'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis blanditiis cupiditate esse amet consequatur repellendus ullam eius et. Sit, eaque vitae. Molestias necessitatibus dolorem quia iste aliquid temporibus et, pariatur natus eius id aperiam iure dolore, ipsam perferendis ab cum tenetur culpa quod blanditiis, ullam obcaecati ex quae maiores. Ab, nihil. Eaque nemo, placeat inventore minus, laborum similique mollitia cupiditate omnis, vel quis corrupti alias minima illo pariatur qui consequatur nostrum sed suscipit repellendus iste? Non odit quod ab voluptatum.'
        ],

        [
            'title' => 'judul post kedua',
            'slug' => 'judul-post-kedua',
            'author' => 'Salma Benazir Achmad',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque ut error aspernatur repellendus aperiam corporis esse cumque beatae vitae reprehenderit dolorem consequuntur cupiditate quo commodi, sunt excepturi ea optio est minus consequatur et atque modi labore officia? Vel voluptatibus, odit quas impedit sed nam iure sit voluptates delectus minus dolorum aliquid dolor mollitia et id, quaerat esse ex ducimus harum quisquam cupiditate necessitatibus vero ad! Aliquid autem iste cum at. Distinctio hic deleniti totam ducimus deserunt! Laudantium dolorum, tempore eaque odio repellendus laboriosam fugiat dicta itaque nihil in nesciunt eligendi minus, sint atque. Repellat, sequi deserunt dignissimos quibusdam exercitationem accusamus?'
        ]
    ];

    // public static function all()
    // {
    //     return collect(self::$blog_posts);
    // }

    public static function find($slug)
    {
        $posts = static::all();
        // $post = [];
        // foreach ($posts as $p) {
        //     if ($p['slug'] === $slug) {
        //         $post = $p;
        //     }
        // }
        return $posts->firstWhere('slug', $slug);
    }
}
