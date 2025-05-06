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
                'name' => 'Yanto Uchiha',
                'email' => 'testing@gmail.com',
                'testimony' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae atque, consequuntur voluptate vel ipsum temporibus ea sapiente minima dicta natus!',
            ],
            [
                'name' => 'Yanto Uchiha',
                'email' => 'testing@gmail.com',
                'testimony' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae atque, consequuntur voluptate vel ipsum temporibus ea sapiente minima dicta natus!',
            ],
            [
                'name' => 'Yanto Uchiha',
                'email' => 'testing@gmail.com',
                'testimony' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae atque, consequuntur voluptate vel ipsum temporibus ea sapiente minima dicta natus!',
            ],
            [
                'name' => 'Yanto Uchiha',
                'email' => 'testing@gmail.com',
                'testimony' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae atque, consequuntur voluptate vel ipsum temporibus ea sapiente minima dicta natus!',
            ],
            [
                'name' => 'Yanto Uchiha',
                'email' => 'testing@gmail.com',
                'testimony' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae atque, consequuntur voluptate vel ipsum temporibus ea sapiente minima dicta natus!',
            ],
        ];

        foreach ($testimonies as $testimony) {
            Testimony::create($testimony);
        }
    }
}
