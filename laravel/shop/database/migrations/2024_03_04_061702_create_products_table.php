<?php

use App\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('products')) return;
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->string('title', 150);
            $table->string('img');
            $table->integer('count')->default(0);
            $table->integer('price')->default(0);
            $table->integer('discount')->default(0);
            $table->text('descriptions');
            $table->enum('size', ['XS', 'S', 'M', 'L', 'XL', 'XXL']);
            $table->integer('view')->default(0);
            $table->foreignId('image_id')
                ->nullable()
                ->onDelete('cascade');
            $table->foreignId('category_id')
                ->constrained()
                ->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
