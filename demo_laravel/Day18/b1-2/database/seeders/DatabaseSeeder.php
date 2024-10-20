<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User; 

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         // Kiểm tra xem người dùng đã tồn tại hay chưa
         if (!User::where('email', 'sonnt@gmail.com')->exists()) {
            $user = new User();
            $user->name = 'Son Nguyen';
            $user->email = 'sonnt@gmail.com';
            $user->password = Hash::make('0000'); 
            $user->role = 'user';
            $user->save();
        } else {
            echo "User with email 'sonnt@gmail.com' already exists.\n";
        }
    }
}
