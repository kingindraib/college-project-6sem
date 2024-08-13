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
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('agent_id')->nullable();
            $table->json('property_category')->nullable();
            $table->string('name',255)->nullable();
            $table->string('slug', 255)->nullable();
            $table->string('location', 255)->nullable();
            $table->longText('description')->nullable();
            $table->string('image', 255)->nullable();
            $table->json('additional_image')->nullable();
            $table->integer('price')->nullable();
            $table->enum('available_status', ['available', 'sold','not_available'])->nullable();
            $table->enum('property_type', ['apartment', 'house', 'land','room'])->nullable();
            $table->enum('property_for',['rent','shell'])->nullable();
            $table->json('property_meta')->nullable();
            $table->json('meta_data')->nullable();
            $table->text('map_ifreme')->nullable();
            $table->string('video_url', 255)->nullable();
            $table->integer('provience_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('local_id')->nullable();
            $table->integer('ward_no')->nullable();
            $table->enum('status',['publish','draft','pending'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
