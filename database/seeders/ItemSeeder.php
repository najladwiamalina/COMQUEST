<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'nama' => 'Item 1',
                'price' => 40,
                'foto' => '1717678157.gif',
            ],
            [
                'nama' => 'Item 2',
                'price' => 50,
                'foto' => '1717681558.gif',
            ],
            [
                'nama' => 'Item 3',
                'price' => 70,
                'foto' => '1717735550.gif',
            ],
            [
                'nama' => 'Item 4',
                'price' => 80,
                'foto' => '1717750995.gif',
            ],
            [
                'nama' => 'Item 5',
                'price' => 90,
                'foto' => '1717752058.gif',
            ],
        ];

        foreach ($items as $item) {
            Item::updateOrCreate(
                ['nama' => $item['nama']],
                [
                    'price' => $item['price'],
                    'foto' => $item['foto'],
                ]
            );
        }
    }
}
