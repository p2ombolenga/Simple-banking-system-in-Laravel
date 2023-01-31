<?php

namespace Database\Seeders;

use App\Models\Ttype;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // User::factory(10)->create();

        User::create([
            'firstname' => "nsabimana",
            'lastname' => "peter",
            'username' => "kabiri",
            'email' => "nsabimanapeter2000@gmail.com",
            'address' => "Kimisagara",
            'email_verified_at' => now(),
            'password' => bcrypt('nsabimanapeter2000@gmail.com'), // password
            'remember_token' => Str::random(10)
        ]);
        User::create([
            'firstname' => "p2",
            'lastname' => "ombolenga",
            'username' => "p2",
            'email' => "p2ombolenga@gmail.com",
            'address' => "Kimisagara",
            'email_verified_at' => now(),
            'password' => bcrypt('p2ombolenga@gmail.com'), // password
            'remember_token' => Str::random(10)
        ]);

        Ttype::create([
            'type' => 'Initial Depositing'
        ]);
        Ttype::create([
            'type' => 'Depositing'
        ]);
        Ttype::create([
            'type' => 'Withdrawing'
        ]);
        Ttype::create([
            'type' => 'Getting Loan'
        ]);
        Ttype::create([
            'type' => 'Paying Loan'
        ]);
        Ttype::create([
            'type' => 'Sending Money'
        ]);
        Ttype::create([
            'type' => 'Receiving Money'
        ]);
    }
}
