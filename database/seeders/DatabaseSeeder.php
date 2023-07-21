<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Role::create([
            'name' => 'Admin',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'Guru',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'Siswa',
            'guard_name'=> 'web'
        ]);


        \App\Models\User::create([
            'name' => 'Okta Daffa Ramdani',
            'email' => 'okta@gmail.com',
            'password' => bcrypt('okta'),
            'alamat' => 'Sidasari',
            'nomor'=> 98234,
            ])->assignRole('Admin');

        \App\Models\User::create([
            'name' => 'lal',
            'alamat' => 'sampang',
            'password' => bcrypt('lal'),
            'email' => 'lal@gmail.com',
            'nomor' => 234234
            ])->assignRole('Siswa');

            \App\Models\User::create([
                'name' => 'guru',
                'alamat' => 'sampang',
                'password' => bcrypt('guru'),
                'email' => 'guru@gmail.com',
                'nomor' => 234221334
                ])->assignRole('guru');


    }
}
