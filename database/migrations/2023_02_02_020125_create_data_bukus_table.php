<?php

use App\Models\KategoriBuku;
use App\Models\Penerbit;
use App\Models\Penerimaan;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_bukus', function (Blueprint $table) {
            $table->id();
            $table->string('kode_buku')->unique();
            $table->string('judul');
            $table->foreignIdFor(Penerbit::class);
            $table->string('tahun_terbit');
            $table->string('penulis');
            $table->foreignIdFor(KategoriBuku::class);
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
        Schema::dropIfExists('data_bukus');
    }
}
