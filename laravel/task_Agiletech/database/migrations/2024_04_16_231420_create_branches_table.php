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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->foreignId('brand_id')->constrained('brands')->onDelete('cascade');
            
            $table->enum('region', [
                '1'=> "Qoraqalpog‘iston Respublikasi",
                '2'=> "Andijon viloyati",
                '3'=> "Buxoro viloyati",
                '4'=> "Jizzax viloyati",
                '5'=> "Qashqadaryo viloyati",
                '6'=> "Navoiy viloyati",
                '7'=> "Namangan viloyati",
                '8'=> "Samarqand viloyati",
                '9'=> "Surxandaryo viloyati",
                '10'=> "Sirdaryo viloyati",
                '11'=> "Toshkent viloyati",
                '12'=> "Farg‘ona viloyati",
                '13'=> "Xorazm viloyati",
                '14'=> "Toshkent shahri"
            ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
