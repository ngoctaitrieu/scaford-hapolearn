<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->after('name');
            $table->string('avatar')->after('password')->nullable();
            $table->date('date_of_birth')->after('avatar')->nullable();
            $table->string('address')->after('date_of_birth')->nullable();
            $table->string('phone')->after('address')->nullable();
            $table->string('about')->after('phone')->nullable();
            $table->string('role')->after('about')->default(0);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username');
            $table->dropColumn('avatar');
            $table->dropColumn('date_of_birth');
            $table->dropColumn('address');
            $table->dropColumn('phone');
            $table->dropColumn('about');
            $table->dropColumn('role');
            $table->dropSoftDeletes();
        });
    }
}
