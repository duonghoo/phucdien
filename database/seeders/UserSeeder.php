<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Group;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = new User();
        $user->username = 'admin';
        $user->email = 'admin@congminh.name.vn';
        $user->fullname = 'Bùi Công Minh';
        $user->slug = 'cong-minh';
        $user->password = Hash::make('admin@123');
        $user->group_id = ((Group::all())[0])->id;
        $user->save();
    }
}
