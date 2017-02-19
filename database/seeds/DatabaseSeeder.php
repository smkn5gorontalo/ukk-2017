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
        
        /**
         * Hapus komentar dibawah ini
         */
        $admin 	=	['nama'=>'Admin','username'=>'admin','password'=>bcrypt('123456'),'akses'=>'admin'];
        App\User::create($admin);
        $kasir 	=	['nama'=>'Kasir','username'=>'kasir1','password'=>bcrypt('123456'),'akses'=>'kasir'];
        App\User::create($kasir);

        for ($i=1; $i <= 100; $i++) { 
            App\Buku::create([
                                'judul'=>"Buku $i",
                                'noisbn'=>rand(111111,999999),
                                'penulis'=>"Penulis $i",
                                'penerbit'=>"Penerbit $i",
                                'tahun'=>"2017",
                                'harga_pokok'=>'12000',
                                'harga_jual'=>'25000',
                                'diskon'=>rand(10,30)
                            ]);
        }
    }
}
