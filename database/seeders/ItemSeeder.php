<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::create([
            'id' => 1,
            'name' => 'Baju Batik Pekalongan Pria',
            'slug' => 'baju-batik-pekalongan-pria',
            'desc' => 'Baju Batik Pekalongan Pria',
            'price' => 150000,
            'stock' => 100,
            'id_category' => 4
        ]);
        
        Item::create([
            'id' => 2,
            'name' => 'Baju Batik Madura Pria',
            'slug' => 'baju-batik-madura-pria',
            'desc' => 'Baju Batik Madura Pria',
            'price' => 150000,
            'stock' => 80,
            'id_category' => 4
        ]);

        Item::create([
            'id' => 3,
            'name' => 'Celemek Anak Motif Disney',
            'slug' => 'celemek-anak-motif-disney',
            'desc' => 'Celemek Anak Motif Disney',
            'price' => 3000,
            'stock' => 100,
            'id_category' => 3
        ]);

        Item::create([
            'id' => 4,
            'name' => 'Celana Wanita Biru',
            'slug' => 'celana-wanita-biru',
            'desc' => 'Celana Wanita Biru',
            'price' => 45000,
            'stock' => 50,
            'id_category' => 9
        ]);

        Item::create([
            'id' => 6,
            'name' => 'Celana Wanita Merah',
            'slug' => 'celana-wanita-merah',
            'desc' => 'Celana Wanita Merah',
            'price' => 45000,
            'stock' => 50,
            'id_category' => 9
        ]);

        Item::create([
            'id' => 7,
            'name' => 'Celana Wanita Kuning',
            'slug' => 'celana-wanita-merah',
            'desc' => 'Celana Wanita Kuning',
            'price' => 45000,
            'stock' => 50,
            'id_category' => 9
        ]);

        Item::create([
            'id' => 8,
            'name' => 'Celemek Anak Motif Tayo',
            'slug' => 'celemek-anak-motif-tayo',
            'desc' => 'Celemek Anak Motif Tayo',
            'price' => 5000,
            'stock' => 100,
            'id_category' => 3
        ]);
        
        Item::create([
            'id' => 9,
            'name' => 'Baju Batik Cirebon Wanita',
            'slug' => 'baju-batik-cirebon-wanita',
            'desc' => 'Baju Batik Cirebon Wanita',
            'price' => 130000,
            'stock' => 80,
            'id_category' => 8
        ]);
        
        Item::create([
            'id' => 10,
            'name' => 'Baju Batik Pekalongan Wanita',
            'slug' => 'baju-batik-pekalongan-wanita',
            'desc' => 'Baju Batik Pekalongan Wanita',
            'price' => 130000,
            'stock' => 80,
            'id_category' => 8
        ]);

        Item::create([
            'id' => 11,
            'name' => 'Celana Pria Formal',
            'slug' => 'celana-pria-formal',
            'desc' => 'Celana Pria Formal',
            'price' => 50000,
            'stock' => 70,
            'id_category' => 5
        ]);

        Item::create([
            'id' => 12,
            'name' => 'Celana Anak Pantai',
            'slug' => 'celana-anak-pantai',
            'desc' => 'Celana Anak Pantai',
            'price' => 7000,
            'stock' => 100,
            'id_category' => 3
        ]);
    }
}
