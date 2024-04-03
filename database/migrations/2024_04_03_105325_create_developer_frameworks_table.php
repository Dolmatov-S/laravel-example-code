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
        Schema::create('developer_frameworks', function (Blueprint $table) {
            $table->unsignedBigInteger('developer_id')->index()->comment('Идентификатор разработчика');
            $table->unsignedBigInteger('framework_id')->index()->comment('Идентификатор фреймворка');
            $table->timestamps();

            $table->primary(['developer_id', 'framework_id']);

            $table->foreign('developer_id')->references('id')->on('developers')->cascadeOnDelete();
            $table->foreign('framework_id')->references('id')->on('frameworks')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('developer_frameworks');
    }
};
