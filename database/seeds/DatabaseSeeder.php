<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsertableSeeder::class);
        $admin 	=	['nama'=>'Admin','username'=>'admin','password'=>bcrypt('123456'),'akses'=>'admin'];
        App\User::create($admin);
        $kasir 	=	['nama'=>'Kasir','username'=>'kasir1','password'=>bcrypt('123456'),'akses'=>'kasir'];
        App\User::create($kasir);
    }
}
