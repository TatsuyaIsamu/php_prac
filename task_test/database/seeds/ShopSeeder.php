<?php

use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('shops')->insert([
            [
                'id' => 1,
                'shop_name' => '高級食パンや',
                'area_id' => 1
            ],
            [
                'id' => 2,
                'shop_name' => '高級クロワッサンや',
                'area_id' => 2
            ],
            [
                'id' => 3,
                'shop_name' => '高級コッペパンや',
                'area_id' => 1
            ],
            [
                'id' => 4,
                'shop_id' => '高級メロンパン屋',
                'area_id' => 3,
            ]

        ]);
    }
}
