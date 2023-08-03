<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Blog::factory()->create([
            'id_author' => 1,
            'id_category' => 1,
            'title' => 'Judul blog pertama',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio enim, assumenda similique consequatur eius quam laborum delectus dolore saepe placeat.',
            'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio enim, assumenda similique consequatur eius quam laborum delectus dolore saepe numquam placeat minima fugit magnam accusantium totam reprehenderit minima quod dignissimos magni accusantium eos id iusto doloribus non reiciendis soluta aperiam explicabo itaque nisi facere quisquam esse quaerat commodi sunt.</p><p>Modi nisi impedit similique quam inventore odit? Autem voluptate numquam, facilis sed quidem ipsa eum beatae porro esse exercitationem temporibus obcaecati id nisi eveniet iste. Doloribus at nam optio earum eveniet blanditiis veniam culpa? Aliquid, vero autem, accusantium laudantium temporibus soluta repellendus reprehenderit, ab quibusdam nesciunt molestias aperiam quae vel. Facilis placeat explicabo, illum quisquam aliquam suscipit enim doloremque, sunt molestiae rem hic, corporis exercitationem voluptatum dolorem? Assumenda doloremque rerum perferendis dicta veniam labore sequi, molestiae adipisci consequatur est, facere ducimus.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio enim, assumenda similique consequatur eius quam laborum delectus dolore saepe numquam placeat minima fugit magnam accusantium perferendis rem asperiores libero.</p>'
        ]);

        // Blog::factory()->create([
        //     'id_user' => 2,
        //     'id_category' => 1,
        //     'title' => 'Judul blog kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio enim, assumenda similique consequatur eius quam laborum delectus dolore saepe placeat.',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio enim, assumenda similique consequatur eius quam laborum delectus dolore saepe numquam placeat minima fugit magnam accusantium totam reprehenderit minima quod dignissimos magni accusantium eos id iusto doloribus non reiciendis soluta aperiam explicabo itaque nisi facere quisquam esse quaerat commodi sunt.</p><p>Modi nisi impedit similique quam inventore odit? Autem voluptate numquam, facilis sed quidem ipsa eum beatae porro esse exercitationem temporibus obcaecati id nisi eveniet iste. Doloribus at nam optio earum eveniet blanditiis veniam culpa? Aliquid, vero autem, accusantium laudantium temporibus soluta repellendus reprehenderit, ab quibusdam nesciunt molestias aperiam quae vel. Facilis placeat explicabo, illum quisquam aliquam suscipit enim doloremque, sunt molestiae rem hic, corporis exercitationem voluptatum dolorem? Assumenda doloremque rerum perferendis dicta veniam labore sequi, molestiae adipisci consequatur est, facere ducimus.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio enim, assumenda similique consequatur eius quam laborum delectus dolore saepe numquam placeat minima fugit magnam accusantium perferendis rem asperiores libero.</p>'
        // ]);

        // Blog::factory()->create([
        //     'id_user' => 2,
        //     'id_category' => 2,
        //     'title' => 'Judul blog ketiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio enim, assumenda similique consequatur eius quam laborum delectus dolore saepe placeat.',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio enim, assumenda similique consequatur eius quam laborum delectus dolore saepe numquam placeat minima fugit magnam accusantium totam reprehenderit minima quod dignissimos magni accusantium eos id iusto doloribus non reiciendis soluta aperiam explicabo itaque nisi facere quisquam esse quaerat commodi sunt.</p><p>Modi nisi impedit similique quam inventore odit? Autem voluptate numquam, facilis sed quidem ipsa eum beatae porro esse exercitationem temporibus obcaecati id nisi eveniet iste. Doloribus at nam optio earum eveniet blanditiis veniam culpa? Aliquid, vero autem, accusantium laudantium temporibus soluta repellendus reprehenderit, ab quibusdam nesciunt molestias aperiam quae vel. Facilis placeat explicabo, illum quisquam aliquam suscipit enim doloremque, sunt molestiae rem hic, corporis exercitationem voluptatum dolorem? Assumenda doloremque rerum perferendis dicta veniam labore sequi, molestiae adipisci consequatur est, facere ducimus.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio enim, assumenda similique consequatur eius quam laborum delectus dolore saepe numquam placeat minima fugit magnam accusantium perferendis rem asperiores libero.</p>'
        // ]);

        // Blog::factory()->create([
        //     'id_user' => 3,
        //     'id_category' => 3,
        //     'title' => 'Judul blog keempat',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio enim, assumenda similique consequatur eius quam laborum delectus dolore saepe placeat.',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio enim, assumenda similique consequatur eius quam laborum delectus dolore saepe numquam placeat minima fugit magnam accusantium totam reprehenderit minima quod dignissimos magni accusantium eos id iusto doloribus non reiciendis soluta aperiam explicabo itaque nisi facere quisquam esse quaerat commodi sunt.</p><p>Modi nisi impedit similique quam inventore odit? Autem voluptate numquam, facilis sed quidem ipsa eum beatae porro esse exercitationem temporibus obcaecati id nisi eveniet iste. Doloribus at nam optio earum eveniet blanditiis veniam culpa? Aliquid, vero autem, accusantium laudantium temporibus soluta repellendus reprehenderit, ab quibusdam nesciunt molestias aperiam quae vel. Facilis placeat explicabo, illum quisquam aliquam suscipit enim doloremque, sunt molestiae rem hic, corporis exercitationem voluptatum dolorem? Assumenda doloremque rerum perferendis dicta veniam labore sequi, molestiae adipisci consequatur est, facere ducimus.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio enim, assumenda similique consequatur eius quam laborum delectus dolore saepe numquam placeat minima fugit magnam accusantium perferendis rem asperiores libero.</p>'
        // ]);
    }
}
