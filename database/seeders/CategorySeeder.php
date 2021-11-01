<?php

namespace Database\Seeders;

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
        Category::create([
            'id' => 1,
            'name' => 'Fashion Pria',
            'id_parent' => null
        ]);
        Category::create([
            'id' => 2,
            'name' => 'Fashion Wanita',
            'id_parent' => null
        ]);
        Category::create([
            'id' => 3,
            'name' => 'Fashion Anak',
            'id_parent' => null
        ]);

        // pria
        Category::create([
            'id' => 4,
            'name' => 'Batik Pria',
            'id_parent' => 1
        ]);
        Category::create([
            'id' => 5,
            'name' => 'Celana Pria',
            'id_parent' => 1
        ]);
        Category::create([
            'id' => 6,
            'name' => 'Jeans Pria',
            'id_parent' => 1
        ]);
        Category::create([
            'id' => 7,
            'name' => 'Seragam Pria',
            'id_parent' => 1
        ]);


        // wanita
        Category::create([
            'id' => 8,
            'name' => 'Batik Wanita',
            'id_parent' => 2
        ]);
        Category::create([
            'id' => 9,
            'name' => 'Celana Wanita',
            'id_parent' => 2
        ]);
        Category::create([
            'id' => 10,
            'name' => 'Jeans Wanita',
            'id_parent' => 2
        ]);
        Category::create([
            'id' => 11,
            'name' => 'Seragam Wanita',
            'id_parent' => 2
        ]);

    }
}
