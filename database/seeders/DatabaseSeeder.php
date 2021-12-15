<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as DataPalsu;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $data_palsu = DataPalsu::create('id_ID');
        User::create([
            'nama' => 'Fadly Mubarok',
            'tanggal_lahir' => $data_palsu->date('Y-m-d', $max = 'now'),
            'alamat' => $data_palsu->address(),
            'username' => 'fadlymubarok',
            'password' => bcrypt('12345678'),
            'level' => 'admin'

        ]);
    }
}
