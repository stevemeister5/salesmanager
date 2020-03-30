<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('tbl_users')->insert([
            'staff_id' => '2',
            'username' => 'testDeploy',
            'password' => 'test123',
            'rights' => '*',
            'subrights' => '*',
            'suberrights' => '*',
            'active' => '1',
            'remember_token' => 'sr89zUSKABU1xvK4lmQt26Ot9Ws2T1qtrerJNpm34XCFYmsFG0reiXYPDvtT',
            'created_at' => '2018-03-22 18:02:09',
            'updated_at' => '2018-03-22 18:02:09',
        ]);

        DB::table('tbl_staff')->insert([
            'first_name' => 'Testy',
            'middle_name' => 'Tasty',
            'last_name' => 'Testy',
            'gender' => 1,
            'm_status' => 1,
            'role_id' => 0,
            'email' => 'stephenreubenm@gmail.com',
            'phone' => '0754506823',
            'dob' => '2010-03-22',
            'state_id' => 32,
            'pics' => 'moi.jpg',
            'residential_address' => 'Testydjfad',
            'created_by' => 0,
            'created_on' => '2018-03-22 18:02:09',
        ]);

    }
}
