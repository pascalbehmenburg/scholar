<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ATTENTION: remove this user when going into production.
        $user = App\User::create([
            'email' => 'admin@scholar.com',
            'forename' => 'John',
            'surname' => 'Doe',
            'birthdate' => '2000-01-01',
            'city' => 'New York',
            'street' => 'Wallstreet 7',
            'phone_number' => '+000000000000',
            'password' => Hash::make('admin'),
        ]);

        $user->assignRole('admin');
        $user->save();

        $users = factory(App\User::class, 20)->create();
    }
}
