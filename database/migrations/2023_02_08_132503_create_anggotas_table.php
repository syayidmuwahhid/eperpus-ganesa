<?php

use App\Models\Anggota;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('anggotas', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('nomor_anggota')->unique();
        //     $table->string('nama_anggota');
        //     $table->text('finger_data');
        //     $table->integer('status_keanggotaan');
        //     $table->foreignIdFor(User::class);
        //     $table->timestamp('created_at');
        //     $table->timestamp('updated_at')->nullable();
        //     // $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('anggotas');
    }
}
