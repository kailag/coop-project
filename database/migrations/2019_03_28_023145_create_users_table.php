<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    protected $table = 'users';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('username');
            $table->string('email')->unique;
            $table->string('password');
            $table->integer('role_id')->comment('Refer to roles');
           
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            
            $table->unique([DB::raw('username(10)')]);
            
            $table->index([ 'role_id' ], $this->table);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table);
    }
}
