<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); // Kolom ID sebagai primary key
            $table->string('id_user'); // Kolom user_id sebagai foreign key
            $table->string('nama_tugas'); // Kolom untuk nama tugas
            $table->text('catatan')->nullable(); // Kolom untuk catatan, nullable karena tidak wajib
            $table->string('status'); // Kolom status dengan pilihan
            $table->string('lampiran')->nullable(); // Kolom untuk lampiran, nullable karena tidak wajib
            $table->string('confirmation')->nullable(); // Kolom untuk lampiran, nullable karena tidak wajib
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
