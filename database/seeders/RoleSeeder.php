<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Admin',
            'guard_name' => 'web',
        ]);

        Role::create([
            'name' => 'Candidate',
            'guard_name' => 'web',
        ]);

        Role::create([
            'name' => 'staff',
            'guard_name' => 'web',
        ]);
    }
}
