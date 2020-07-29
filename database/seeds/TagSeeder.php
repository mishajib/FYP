<?php

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag = Tag::create([
                               "name"        => 'web design',
                               "slug"        => 'web-design',
                               'is_approved' => 1,
                               'is_default'  => 1,
                           ]);

        $tag = Tag::create([
                               "name"        => 'web development',
                               "slug"        => 'web-development',
                               'is_approved' => 1,
                               'is_default'  => 1,
                           ]);

        $tag = Tag::create([
                               "name"        => 'html',
                               "slug"        => 'html',
                               'is_approved' => 1,
                               'is_default'  => 1,
                           ]);

        $tag = Tag::create([
                               "name"        => 'css',
                               "slug"        => 'css',
                               'is_approved' => 1,
                               'is_default'  => 1,
                           ]);

        $tag = Tag::create([
                               "name"        => 'javascript',
                               "slug"        => 'javascript',
                               'is_approved' => 1,
                               'is_default'  => 1,
                           ]);

        $tag = Tag::create([
                               "name"        => 'jquery',
                               "slug"        => 'jquery',
                               'is_approved' => 1,
                               'is_default'  => 1,
                           ]);

        $tag = Tag::create([
                               "name"        => 'php',
                               "slug"        => 'php',
                               'is_approved' => 1,
                               'is_default'  => 1,
                           ]);

        $tag = Tag::create([
                               "name"        => 'python',
                               "slug"        => 'python',
                               'is_approved' => 1,
                               'is_default'  => 1,
                           ]);

        return $tag;
    }
}
