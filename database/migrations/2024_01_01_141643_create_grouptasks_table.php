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
        Schema::create('grouptasks', function (Blueprint $table) {
            $table->id('grouptask_id');
            $table->unsignedBigInteger('group_id');
            $table->string('grouptask_name');
            $table->date("grouptask_duedate");
            $table->time("grouptask_duetime");
            $table->string('priority');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grouptasks');
    }
};