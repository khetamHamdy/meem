<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('fqa_translations')) {
            Schema::create('fqa_translations', function (Blueprint $table) {
                $table->id();
                $table->string('locale')->index();
                $table->integer('faq_id')->unsigned();
                $table->string('order')->default('Q1');
                $table->string('title');
                $table->text('description');
                $table->timestamps();
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
        Schema::dropIfExists('fqa_translations');
    }
};
