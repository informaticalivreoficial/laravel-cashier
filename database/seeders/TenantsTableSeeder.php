<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        Tenant::create([            
            'id' => 1,
            'name' => 'Admin',
            'dominio' => 'master',
            'email' => env('ADMIN_EMAIL'),
            'created_at' => now(),//Data e hora Atual
            'status' => 1                       
        ]);
    }
}
