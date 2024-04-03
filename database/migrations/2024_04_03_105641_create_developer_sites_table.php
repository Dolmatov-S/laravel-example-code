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
        Schema::create('developer_sites', function (Blueprint $table) {
            $table->unsignedBigInteger('developer_id')->index()->comment('Идентификатор разработчика');
            $table->unsignedBigInteger('site_id')->index()->comment('Идентификатор сайта');
            $table->timestamps();

            $table->primary(['developer_id', 'site_id']);

            $table->foreign('developer_id')->references('id')->on('developers')->cascadeOnDelete();
            $table->foreign('site_id')->references('id')->on('sites')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('developer_sites');
    }
};
