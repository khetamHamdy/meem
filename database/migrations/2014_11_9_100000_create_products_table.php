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
        if (!Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('price')->default(0);
                $table->string('title');
                $table->text('description');
                $table->string('image');
                $table->integer('user_id');
                $table->integer('category_id');
                $table->integer('chat_id');
                $table->unsignedBigInteger('count_views')->default(0);
                $table->enum('type', ['new', 'old'])->default('old');
                $table->enum('status', ['active', 'not_active']);
                $table->timestamp('created_at')->useCurrent();
                $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
                $table->softDeletes();
            });
        }

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
};
