<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username')->unique();
            $table->string('name');
            $table->string('title')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone_number');
            $table->string('image')->default(asset('assets/favicon.png'));
            $table->text('about')->nullable();
            $table->string('slug')->unique();
            $table->boolean('status')->default(false);
            $table->boolean('is_approved')->default(false);
            $table->ipAddress('client_ip');
            $table->string("machine_name");
            $table->string('password');
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
