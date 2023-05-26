<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u1 = User::find(1);
        $u2 = User::find(2);
        $u3 = User::find(3);

        $r1 = Role::where('name','Root')->first();
        $r2 = Role::where('name','Admin')->first();
        $r3 = Role::where('name','User')->first();

        $u1->assignRole($r1);
        $u1->

        $u2->assignRole($r2);

        $u3->assignRole($r3);
    }
}
