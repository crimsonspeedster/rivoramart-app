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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('sku')->nullable()->unique();
            $table->string('status')->default('draft');
            $table->string('type')->default('simple');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->decimal('base_price', 8, 2)->nullable();
            $table->decimal('base_price_on_sale', 8, 2)->nullable();
            $table->decimal('rating', 3, 2)->default(0);
            $table->unsignedInteger('comment_counts')->default(0);
            $table->timestamp('published_at')->nullable();
            $table->unsignedInteger('stock')->nullable();
            $table->string('stock_status')->default('in_stock');
            $table->boolean('manage_stock')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
