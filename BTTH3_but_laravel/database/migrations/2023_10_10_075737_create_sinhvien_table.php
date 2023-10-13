<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sinhvien', function (Blueprint $table) {
            $table->increments("id");
            $table->string("tensinhvien")->nullable(false);
            $table->string("email")->nullable(false);
            $table->date("ngaysinh")->nullable(false);
            $table->unsignedInteger("idlop")->nullable(false);
            $table->foreign("idlop")->references("id")->on("lop")->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sinhvien');
    }
};
