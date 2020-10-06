<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMemberColumns extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->nullable();
            $table->string('status', 50)->default('active');
            $table->timestamp('last_seen_at')->nullable();
        });
    }
}
