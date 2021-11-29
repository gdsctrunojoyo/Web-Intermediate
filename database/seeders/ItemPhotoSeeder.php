<?php

namespace Database\Seeders;

use App\Models\ItemPhoto;
use Illuminate\Database\Seeder;

class ItemPhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ItemPhoto::create([
            'title'     => '1',
            'src'       => 'images/1.jpg',
            'id_item'   => 1
        ]);
        ItemPhoto::create([
            'title'     => '1b',
            'src'       => 'images/1b.webp',
            'id_item'   => 1
        ]);
        
        ItemPhoto::create([
            'title'     => '2',
            'src'       => 'images/2.webp',
            'id_item'   => 2
        ]);
        ItemPhoto::create([
            'title'     => '2',
            'src'       => 'images/2b.webp',
            'id_item'   => 2
        ]);
    }
}
