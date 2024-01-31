<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\CssSelector\Parser\Tokenizer\Tokenizer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\Admin::factory()->create([
            'no' => 0,
            'id_admin'=>str_pad(1, 12, '0', STR_PAD_LEFT),
            'name' => 'Dewanata Hammada',
            'username' => 'dewanata',
            'password'=>Hash::make('12345678'),
            'roles'=>'administrator'
            
        ]);
    }
}
