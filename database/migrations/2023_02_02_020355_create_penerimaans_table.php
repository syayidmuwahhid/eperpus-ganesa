<?php

use App\Models\DataBuku;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenerimaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penerimaans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_buku');
            $table->foreign('kode_buku')->references('kode_buku')->on('data_bukus');
            $table->date('tanggal_diterima');
            $table->integer('jumlah');
            $table->string('keterangan')->nullable();
            $table->foreignIdFor(User::class);
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penerimaans');
    }
}
