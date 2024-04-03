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
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->string('name', 120)->comment('Название сайта');
            $table->unsignedBigInteger('framework_id')->nullable()->index()->comment('Идентификатор фреймворка');
            $table->timestamps();

            $table->foreign('framework_id')->references('id')->on('frameworks')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sites');
    }
};
