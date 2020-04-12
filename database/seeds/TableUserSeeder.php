<?php

use Illuminate\Database\Seeder;

class TableUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'name' => 'Agus Adhi Sumitro',
            'username' => 'aasumitro',
            'email' => 'hello@aasumitro.id',
            'password' => \Illuminate\Support\Facades\Hash::make('secret'),
            'email_verified_at' => now(),
        ];

        \App\Models\User::create($user);
    }
}
