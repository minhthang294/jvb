<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =[
            [
                'name' => 'Web',
                'index' => '1',
            ],
            [
                'name' => 'Mobile',
                'index' => '2',
            ],
            [
                'name' => 'Game',
                'index' => '3',
            ],
        ];
        DB::table('categories')->insert($data);
    }
}
