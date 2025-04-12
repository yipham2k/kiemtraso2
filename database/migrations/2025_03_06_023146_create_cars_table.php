<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('make');  // Đảm bảo cột 'make' tồn tại
            $table->string('model');
            $table->date('produced_on');  // Đảm bảo tên đúng là 'produced_on'
            $table->unsignedBigInteger('mf_id');
            $table->timestamps();
        });
        Schema::table('cars', function (Blueprint $table) {
            $table->string('description')->nullable(); // Thêm cột description nếu thiếu
        });
        
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};