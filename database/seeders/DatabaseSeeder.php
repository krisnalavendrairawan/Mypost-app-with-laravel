<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(3)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::create([
        //     'name' => 'Krisna Lavendra Irawan',
        //     'email' => 'krisnalavendrairawan@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);
        // User::create([
        //     'name' => 'Salma Benazir Achmad',
        //     'email' => 'salmabenazirachmad@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);
        Post::factory(20)->create();

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum pertama',
        //     'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloribus possimus eligendi ad, rerum velit corporis obcaecati rem dolores sit explicabo molestias fugit excepturi, laboriosam optio nihil itaque asperiores qui numquam earum labore. Aut, nihil, ullam eligendi cupiditate porro architecto at molestias, hic debitis odit suscipit dolores reprehenderit maiores perferendis labore minus excepturi expedita saepe quasi corrupti voluptatum in. Quisquam laboriosam, ipsa maiores ea illo repellendus dolores dolor? Natus minus esse reprehenderit. Vel saepe natus dolore minus, inventore fugiat culpa eaque ut eius dolorem sit fuga architecto, voluptatum incidunt obcaecati dignissimos earum velit, nobis mollitia nemo pariatur iusto! Nesciunt, excepturi animi.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
        // Post::create([
        //     'title' => 'Judul kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum kedua',
        //     'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloribus possimus eligendi ad, rerum velit corporis obcaecati rem dolores sit explicabo molestias fugit excepturi, laboriosam optio nihil itaque asperiores qui numquam earum labore. Aut, nihil, ullam eligendi cupiditate porro architecto at molestias, hic debitis odit suscipit dolores reprehenderit maiores perferendis labore minus excepturi expedita saepe quasi corrupti voluptatum in. Quisquam laboriosam, ipsa maiores ea illo repellendus dolores dolor? Natus minus esse reprehenderit. Vel saepe natus dolore minus, inventore fugiat culpa eaque ut eius dolorem sit fuga architecto, voluptatum incidunt obcaecati dignissimos earum velit, nobis mollitia nemo pariatur iusto! Nesciunt, excepturi animi.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
        // Post::create([
        //     'title' => 'Judul ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem ipsum ketiga',
        //     'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloribus possimus eligendi ad, rerum velit corporis obcaecati rem dolores sit explicabo molestias fugit excepturi, laboriosam optio nihil itaque asperiores qui numquam earum labore. Aut, nihil, ullam eligendi cupiditate porro architecto at molestias, hic debitis odit suscipit dolores reprehenderit maiores perferendis labore minus excepturi expedita saepe quasi corrupti voluptatum in. Quisquam laboriosam, ipsa maiores ea illo repellendus dolores dolor? Natus minus esse reprehenderit. Vel saepe natus dolore minus, inventore fugiat culpa eaque ut eius dolorem sit fuga architecto, voluptatum incidunt obcaecati dignissimos earum velit, nobis mollitia nemo pariatur iusto! Nesciunt, excepturi animi.',
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);
        // Post::create([
        //     'title' => 'Judul keempat',
        //     'slug' => 'judul-keempat',
        //     'excerpt' => 'Lorem ipsum keeempat',
        //     'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloribus possimus eligendi ad, rerum velit corporis obcaecati rem dolores sit explicabo molestias fugit excepturi, laboriosam optio nihil itaque asperiores qui numquam earum labore. Aut, nihil, ullam eligendi cupiditate porro architecto at molestias, hic debitis odit suscipit dolores reprehenderit maiores perferendis labore minus excepturi expedita saepe quasi corrupti voluptatum in. Quisquam laboriosam, ipsa maiores ea illo repellendus dolores dolor? Natus minus esse reprehenderit. Vel saepe natus dolore minus, inventore fugiat culpa eaque ut eius dolorem sit fuga architecto, voluptatum incidunt obcaecati dignissimos earum velit, nobis mollitia nemo pariatur iusto! Nesciunt, excepturi animi.',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);
    }
}
