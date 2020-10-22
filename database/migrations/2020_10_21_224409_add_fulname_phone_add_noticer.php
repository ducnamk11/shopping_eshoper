<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFulnamePhoneAddNoticer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('fullname');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->string('notice');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('fullname');
            $table->dropColumn('phone');
            $table->dropColumn('email');
            $table->dropColumn('notice');
        });
    }
}
