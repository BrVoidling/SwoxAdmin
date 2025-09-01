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
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('internal_name');
            $table->string('description')->nullable();
            $table->boolean('is_object')->default(false);
            $table->unsignedBigInteger('hoofdform_id')->nullable();
            $table->timestamps();
        });

        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('internal_name');
            $table->string('description')->nullable();
            $table->string('type');
            $table->string('options')->nullable();
            $table->timestamps();
        });

        Schema::create('form_rows', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->string('type');
            $table->unsignedBigInteger('form_id');
            $table->unsignedBigInteger('question_id');
            $table->boolean('is_required')->default(false);
            $table->boolean('is_object_identifier')->default(false);
            $table->timestamps();

            $table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade');
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
        });

        Schema::create('form_objects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('user_id');
            $table->integer('version')->default(1);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('form_object_to_form', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('form_object_id');
            $table->unsignedBigInteger('form_id');
            $table->timestamps();

            $table->foreign('form_object_id')->references('id')->on('form_objects')->onDelete('cascade');
            $table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade');
        });

        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->string('value')->nullable();
            $table->unsignedBigInteger('form_row_id');
            $table->unsignedBigInteger('form_object_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->integer('version')->default(1);
            $table->timestamps();

            $table->foreign('form_row_id')->references('id')->on('form_rows')->onDelete('cascade');
            $table->foreign('form_object_id')->references('id')->on('form_objects')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forms');
        Schema::dropIfExists('questions');
        Schema::dropIfExists('form_rows');
        Schema::dropIfExists('answers');
        Schema::dropIfExists('form_objects');
    }
};
