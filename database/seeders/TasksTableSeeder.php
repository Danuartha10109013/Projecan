<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            [
                'id_user' => 2, // Sesuaikan dengan ID pengguna yang ada di tabel users
                'nama_tugas' => 'Tugas 1',
                'catatan' => 'Catatan untuk tugas 1',
                'status' => '1',
                'lampiran' => 'file1.pdf',
                'confirmation' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_user' => 2, // Sesuaikan dengan ID pengguna yang ada di tabel users
                'nama_tugas' => 'Tugas 2',
                'catatan' => 'Catatan untuk tugas 2',
                'status' => '1',
                'lampiran' => 'file2.docx',
                'confirmation' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_user' => 2, // Sesuaikan dengan ID pengguna yang ada di tabel users
                'nama_tugas' => 'Tugas 3',
                'catatan' => 'Catatan untuk tugas 3',
                'status' => '1',
                'lampiran' => 'file3.jpg',
                'confirmation' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
