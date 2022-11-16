<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $users =[
        [
        'name' => 'SuperAdmin',
        'email' => 'admin@gmail.com',
        'type' => 1,//admin
        'password' => bcrypt('12345'),
        'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]
        ];
        foreach($users as $key => $user){
            User::create($user);
        }
    }

}
