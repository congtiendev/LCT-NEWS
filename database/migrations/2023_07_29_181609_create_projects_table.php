<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_name');
            $table->string('slug');
            $table->string('description');
            $table->string('investor')->nullable();
            $table->string('address');
            $table->float('price');
            $table->float('area');
            $table->string('location')->nullable();
            $table->integer('room_count')->nullable();
            $table->integer('project_type_id');
            $table->integer('sale_method');
            $table->integer('author_id');
            $table->integer('status')->default(1)->comment('1: active, 0: inactive');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
