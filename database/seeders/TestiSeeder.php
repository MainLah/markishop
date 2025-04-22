<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Testimony;

class TestiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonies = [
            [
                'Testimony' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae atque, consequuntur voluptate vel ipsum temporibus ea sapiente minima dicta natus!',
            ],
            [
                'Testimony' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae atque, consequuntur voluptate vel ipsum temporibus ea sapiente minima dicta natus!',
            ],
            [
                'Testimony' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae atque, consequuntur voluptate vel ipsum temporibus ea sapiente minima dicta natus!',
            ],
            [
                'Testimony' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae atque, consequuntur voluptate vel ipsum temporibus ea sapiente minima dicta natus!',
            ],
            [
                'Testimony' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae atque, consequuntur voluptate vel ipsum temporibus ea sapiente minima dicta natus!',
            ],
        ];

        foreach ($testimonies as $testimony) {
            Testimony::create($testimony);
        }
    }
}
