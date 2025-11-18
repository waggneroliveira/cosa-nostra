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
        Schema::table('noticies', function (Blueprint $table) {
            $table->string('title')->nullable()->change();
            $table->date('date')->nullable()->change();
            $table->text('path_file')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('noticies', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('date');
            $table->dropColumn('path_file');
        });
    }
};
