<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('drafts', function (Blueprint $table) {
            $table->string('shipper_id')->nullable();
        });
    }

    public function down()
    {
        Schema::table('drafts', function (Blueprint $table) {
            $table->dropColumn('shipper_id');
        });
    }
};
