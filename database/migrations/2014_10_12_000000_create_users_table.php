<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id');  // ID_User sebagai primary key
            $table->string('name');  // Kolom Nama
            $table->string('email')->unique();  // Kolom Email, pastikan unik
            $table->string('password');  // Kolom Password
            $table->string('role')->default('Admin');  // Kolom Role
            $table->timestamps();  // Timestamps: created_at, updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
