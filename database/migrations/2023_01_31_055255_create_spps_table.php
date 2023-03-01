<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spps', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('kelas_id')->foreign();
            $table->uuid('petugas_id')->foreign(); // edited_by
            $table->dateTime('month')->format('Y-m');
            $table->string('nama')->unique();
            $table->integer('nominal');
            $table->string('deleted_by');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spps');
    }
};
