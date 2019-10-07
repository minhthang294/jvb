<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'JVB',
                'username' => 'admin',
                'password' => bcrypt('12345'),
                'role' => '1',
                'status' => '1',
            ],
            [
                'name' => 'Pham Minh Thang',
                'username' => 'thangpham',
                'password' => bcrypt('12345'),
                'role' => '2',
                'status' => '1',
            ],
            [
                'name' => 'Nguyen Khanh Linh',
                'username' => 'linh',
                'password' => bcrypt('12345'),
                'role' => '3',
                'status' => '1',
            ]
        ];
        DB::table('users')->insert($data);
    }
}
