<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::create([
                                         'name'        => 'Web Design',
                                         'slug'        => 'web-design',
                                         'status'      => 1,
                                         'is_approved' => 1,
                                         'is_default'  => 1,
                                     ]);

        $category = Category::create([
                                         'name'        => 'Web Development',
                                         'slug'        => 'web-development',
                                         'status'      => 1,
                                         'is_approved' => 1,
                                         'is_default'  => 1,
                                     ]);

        $category = Category::create([
                                         'parent_id'   => 1,
                                         'name'        => 'HTML',
                                         'slug'        => 'html',
                                         'status'      => 1,
                                         'is_approved' => 1,
                                         'is_default'  => 1,
                                     ]);

        $category = Category::create([
                                         'parent_id'   => 1,
                                         'name'        => 'CSS',
                                         'slug'        => 'css',
                                         'status'      => 1,
                                         'is_approved' => 1,
                                         'is_default'  => 1,
                                     ]);

        $category = Category::create([
                                         'parent_id'   => 1,
                                         'name'        => 'Javascript',
                                         'slug'        => 'javascript',
                                         'status'      => 1,
                                         'is_approved' => 1,
                                         'is_default'  => 1,
                                     ]);

        $category = Category::create([
                                         'parent_id'   => 1,
                                         'name'        => 'JQuery',
                                         'slug'        => 'jquery',
                                         'status'      => 1,
                                         'is_approved' => 1,
                                         'is_default'  => 1,
                                     ]);

        $category = Category::create([
                                         'parent_id'   => 2,
                                         'name'        => 'PHP',
                                         'slug'        => 'php',
                                         'status'      => 1,
                                         'is_approved' => 1,
                                         'is_default'  => 1,
                                     ]);

        $category = Category::create([
                                         'name'        => 'Python',
                                         'slug'        => 'python',
                                         'status'      => 1,
                                         'is_approved' => 1,
                                         'is_default'  => 1,
                                     ]);

        return $category;
    }
}
