<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\User;
use App\Models\KRS;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Administrator
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@poltekkes-tanjungpinang.ac.id',
            'isAdmin' => 1,
            'password' => Hash::make('admin123')    
        ]);

        // Jurusan
        Jurusan::create([
            'kode_jurusan' => 'PLTK01',
            'jurusan' => 'Sanitasi'
        ]);
        Jurusan::create([
            'kode_jurusan' => 'PLTK02',
            'jurusan' => 'Kebidanan'
        ]);
        Jurusan::create([
            'kode_jurusan' => 'PLTK03',
            'jurusan' => 'Keperawatan'
        ]);

        // Kelas
        Kelas::create([
            'kode_kelas' => 'SAT-A',
            'nama_kelas' => 'Sanitasi A',
            'jmlh_mahasiswa' => 30
        ]);
        Kelas::create([
            'kode_kelas' => 'SAT-B',
            'nama_kelas' => 'Sanitasi B',
            'jmlh_mahasiswa' => 32
        ]);
        Kelas::create([
            'kode_kelas' => 'BDN-A',
            'nama_kelas' => 'Kebidanan A',
            'jmlh_mahasiswa' => 31
        ]);
        Kelas::create([
            'kode_kelas' => 'BDN-B',
            'nama_kelas' => 'Kebidanan B',
            'jmlh_mahasiswa' => 29
        ]);
        Kelas::create([
            'kode_kelas' => 'PRWT-A',
            'nama_kelas' => 'Keperawatan A',
            'jmlh_mahasiswa' => 20
        ]);
        Kelas::create([
            'kode_kelas' => 'PRWT-B',
            'nama_kelas' => 'Keperawatan B',
            'jmlh_mahasiswa' => 21
        ]);
        Kelas::create([
            'kode_kelas' => 'PRWT-C',
            'nama_kelas' => 'Keperawatan C',
            'jmlh_mahasiswa' => 22
        ]);

        // Matakuliah
        MataKuliah::create([
            'kode_mk' => 'PRWT101',
            'nama_mk' => 'Keperawatan Dasar',
            'semester_mk' => 2,
            'sks' => 5
        ]);
        MataKuliah::create([
            'kode_mk' => 'PRWT102',
            'nama_mk' => 'Metodologi Keperawatan',
            'semester_mk' => 2,
            'sks' => 2
        ]);
        MataKuliah::create([
            'kode_mk' => 'PRWT103',
            'nama_mk' => 'Gizi dan diet',
            'semester_mk' => 2,
            'sks' => 2
        ]);

        // Mahasiswa dummy data
        Mahasiswa::create([
            'nim' => '12345-01',
            'nama' => 'Udin Bahrudin', 
            'tgl_lahir' => '2006-12-12',
            'alamat' => 'Ganet',
            'semester' => 1,
            'jenis_kelamin' => 'L',
            'tahun_akademik' => '2023/2024',
            'kode_kelas' => 'PRWT-C',
            'kode_jurusan' => 'PLTK03',
            'foto' => 'meme.png'
        ]);

        // krs dummy data
        KRS::create([
            'kode_krs' => 'KRS12345-01-01',
            'nim' => '12345-01',
            'kode_mk' => 'PRWT101',
            'status' => 0
        ]);

        // Mahasiswa
        User::create([
            'name' => 'Udin Bahrudin',
            'email' => 'udinbr@poltekkes-tanjungpinang.ac.id',
            'isAdmin' => 0,
            'nim' => '12345-01',
            'password' => Hash::make('udin123')
        ]);
    }
}
