<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Matkul;
use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Semester;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'is_admin' => 1,
            'password' => bcrypt('123')
        ]);

        User::create([
            'name' => 'Faizal Fadly',
            'nim' => 2103040,
            'kelas_id' => 2,
            'username' => '@2103040',
            'is_admin' => 0,
            'password' => bcrypt('123')
        ]);


        //  MATKUL
        Matkul::create([
            'kodematkul' => 'TIU201304',
            'dosen_id' => 1,
            'semester_id' => 3,
            'nama' => 'Administrasi Sistem Jaringan'
        ]);
        Matkul::create([
            'kodematkul' => 'TIU201390',
            'dosen_id' => 2,
            'semester_id' => 3,
            'nama' => 'Pemrograman Web Lanjut'
        ]);


        //  DOSEN
        Dosen::create([
            'nip' => 22008909,
            'nama' => "Willy Permana Putra"
        ]);
        Dosen::create([
            'nip' => 18090868,
            'nama' => "Esti Mulyani"
        ]);

        //  SEMESTER
        Semester::create([
            'semester' => "Semester 1"
        ]);
        Semester::create([
            'semester' => "Semester 2"
        ]);
        Semester::create([
            'semester' => "Semester 3"
        ]);
        Semester::create([
            'semester' => "Semester 4"
        ]);
        Semester::create([
            'semester' => "Semester 5"
        ]);
        Semester::create([
            'semester' => "Semester 6"
        ]);

        //  KELAS
        Kelas::create([
            'kelas' => 'D3TIA',
            'semester_id' => 1
        ]);
        Kelas::create([
            'kelas' => 'D3TIB',
            'semester_id' => 3
        ]);
    }
}
