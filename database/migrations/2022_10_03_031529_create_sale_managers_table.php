<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleManagersTable extends Migration
{

    public function up()
    {
        Schema::create('sale_managers', function (Blueprint $table) {
            $table->id();
            $table->string('order_details');
        });
    }


    public function down()
    {
        Schema::dropIfExists('sale_managers');
    }
}
