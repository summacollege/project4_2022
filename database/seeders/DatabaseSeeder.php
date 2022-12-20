<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        // maak klant
        $role = Role::create(['name' => 'customer']);
        // klant mag producten zien
        $permission = Permission::create(['name' => 'view products']);
        $role->givePermissionTo($permission);
        // test user is klant
        $user->assignRole('customer');

        $this->call([
            PersonSeeder::class,
            PizzaPointSeeder::class,
        ]);
    }
}
