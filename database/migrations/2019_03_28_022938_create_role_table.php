<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleTable extends Migration
{

     protected $table = 'roles';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {

            $table->increments('id');

            $table->string('name');

            $table->string('description')->nullable();

            $table->timestamps();

        });



        DB::table($this->table)->insert(

            array(

                [ 'name' => 'SuperAdmin', 'description' => 'System Administrator' ],

                [ 'name' => 'Admin', 'description' => 'System Administrator' ],

                [ 'name' => 'Bookeeper', 'description' => 'System Bookeeper' ],

                [ 'name' => 'Cashier', 'description' => 'System Cashier' ],

                [ 'name' => 'Employee', 'description' => 'System Employees' ],

            )

        );
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