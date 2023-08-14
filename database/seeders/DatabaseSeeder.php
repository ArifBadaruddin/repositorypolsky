<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\category;
use App\Models\post;
use Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       


        // User::create([
        //     'password' => Hash::make('12345'),
        //     'id_poktan' => '1001391',
        //     'nama_poktan' => 'mekar jaya',
        //     'NIK' => '000144766912',
        //     'ketua' => 'hayatudin',
        //     'alamat_sekretariat' => 'jalan sekayu',
        //     'kelurahan' => 'serasan jaya',
        //     'kecamatan' => 'sekayu',
        //     'verifikasi' => 'sudah',
        //     'bantuan' => 'sudah',
        //     'sumber_dana' => 'APBD',
        //     'jenis_bantuan' => 'PUPUK',
        // ]);
        
            
        category::create([
            'name' => 'Tugas Akhir',
            'slug' => 'tugas_akhir',
        ]);
            
        category::create([
            'name' => 'E-jurnal',
            'slug' => 'e-jurnal',
            ]);
            category::create([
                'name' => 'Tugas Praktik',
                'slug' => 'tugas_praktik',
                ]);
            
         \App\Models\User::factory(2)->create();
         \App\Models\post::factory(13)->create();

        
        // post::create([
        //     'title' => 'Judul kedua',
        //     'category_id' => '2',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => '  ipsam dolore ut at minus iusto.',
        //     'body' => '<p>Rendang adalah kuliner asli asal Minangkabau, Sumatra Barat. Orang Minang menyebut kuliner ini dengan nama "randang".</p><p>Asal katanya dari marandang, yang berarti memasak santan hingga kering secara perlahan. Rendang perlu dimasak lama hingga kuahnya kering.Dalam catatan sejarah, tidak banyak bukti tertulis ditemukan. Namun jika merunut dari adat, makanan rendang telah ada di setiap upacara adat Minangkabau yang sudah berlangsung sejak berabad-abad lalu.</p><p>Menurut sebuah catatan tertulis abad ke-19, disebutkan bahwa rendang muncul pada abad ke-16. Kala itu, orang Minang suka bepergian ke Selat Malaka dan Singapura.</p><p>Perjalanan lewat jalur air dan memakan waktu hingga sebulan atau lebih. Karena tidak ada tempat untuk kapal singgah, maka perantau menyiapkan makanan tahan lama yakni rendang</p> ',
        //     'user_id' => '1',
        // ]);

        // post::create([
        //     'title' => 'Judul pertama',
        //     'category_id' => '1',
        //     'user_id' => '1',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => '  ipsam dolore ut at minus iusto.',
        //     'body' => '<p>Rendang adalah kuliner asli asal Minangkabau, Sumatra Barat. Orang Minang menyebut kuliner ini dengan nama "randang".</p><p>Asal katanya dari marandang, yang berarti memasak santan hingga kering secara perlahan. Rendang perlu dimasak lama hingga kuahnya kering.Dalam catatan sejarah, tidak banyak bukti tertulis ditemukan. Namun jika merunut dari adat, makanan rendang telah ada di setiap upacara adat Minangkabau yang sudah berlangsung sejak berabad-abad lalu.</p><p>Menurut sebuah catatan tertulis abad ke-19, disebutkan bahwa rendang muncul pada abad ke-16. Kala itu, orang Minang suka bepergian ke Selat Malaka dan Singapura.</p><p>Perjalanan lewat jalur air dan memakan waktu hingga sebulan atau lebih. Karena tidak ada tempat untuk kapal singgah, maka perantau menyiapkan makanan tahan lama yakni rendang</p> '
        // ]);
        // post::create([
        //     'title' => 'Judul ketiga',
        //     'category_id' => '3',
        //     'user_id' => '1',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => '  ipsam dolore ut at minus iusto.',
        //     'body' => '<p>Rendang adalah kuliner asli asal Minangkabau, Sumatra Barat. Orang Minang menyebut kuliner ini dengan nama "randang".</p><p>Asal katanya dari marandang, yang berarti memasak santan hingga kering secara perlahan. Rendang perlu dimasak lama hingga kuahnya kering.Dalam catatan sejarah, tidak banyak bukti tertulis ditemukan. Namun jika merunut dari adat, makanan rendang telah ada di setiap upacara adat Minangkabau yang sudah berlangsung sejak berabad-abad lalu.</p><p>Menurut sebuah catatan tertulis abad ke-19, disebutkan bahwa rendang muncul pada abad ke-16. Kala itu, orang Minang suka bepergian ke Selat Malaka dan Singapura.</p><p>Perjalanan lewat jalur air dan memakan waktu hingga sebulan atau lebih. Karena tidak ada tempat untuk kapal singgah, maka perantau menyiapkan makanan tahan lama yakni rendang</p> '
        // ]);
            
            

        
    }
}
