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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->foreign('product_id')->references('id')->on('productss')->onDelete('cascade');
            $table->boolean('status');
            $table->integer('ammount');
            $table->integer('ammount_available');
            $table->float('price', 8, 2);
            $table->string('code')->unique();
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
            $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
