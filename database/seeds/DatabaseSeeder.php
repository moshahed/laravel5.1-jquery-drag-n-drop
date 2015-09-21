<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call('UserTableSeeder');
        $this->call('UserTableSeeder');

        Model::reguard();
    }
}

class UserTableSeeder extends Seeder
{
    public function run()
    {

        DB::table('users')->delete();
        
        $data = array(
            array(
                'name' => 'Moshahed',
                'email' => 'moshahed777@gmail.com',
                'sort_no' => 1,
                'password' => bcrypt('123'),
            ),
            array(
                'name' => 'John Doe',
                'email' => 'Johndoe@gmail.com',
                'sort_no' => 2,
                'password' => bcrypt('123')
            ),
            array(
                'name' => 'Alam',
                'email' => 'alam@gmail.com',
                'sort_no' => 3,
                'password' => bcrypt('123')
            ),
            array(
                'name' => 'Michel',
                'email' => 'michel@gmail.com',
                'sort_no' => 4,
                'password' => bcrypt('123')
            ),
        );

        User::insert($data);

        }

    }
