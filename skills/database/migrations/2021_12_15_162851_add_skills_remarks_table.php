<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSkillsRemarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('skills', function (Blueprint $table) {
            //
            $table->text('remarks')->comment('特記事項')->after('skill_status')->nullable();
            $table->integer('experience_years')->commnet('経験年数')->after('remarks')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('skills', function (Blueprint $table) {
            //
            $table->dropColumn('remarks');
            $table->dropColumn('experience_years');
        });
    }
}
