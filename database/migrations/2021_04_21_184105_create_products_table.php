<?php

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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('description')->nullable();
            $table->string('photo');
            $table->string('size');
            $table->enum('condition', ['new', 'popular', 'winter'])->default('new');
            $table->integer('stock');

            $table->float('price', 10, 2)->default(0);
            $table->float('offer_price',10, 2)->default(0);
            $table->float('discount', 10,2)->default(0);

            $table->unsignedBigInteger('vendor_id')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->foreignId('brand_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');

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
