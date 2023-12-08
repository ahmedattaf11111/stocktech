<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_items', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->boolean("is_user")->default(0);//0 for none, 1 employee , 2 student
            $table->boolean("effect")->default(0); //0 depit , 1 credit
            $table->boolean("status")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_items');
    }
}
