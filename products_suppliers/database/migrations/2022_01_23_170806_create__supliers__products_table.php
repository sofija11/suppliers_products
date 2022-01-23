<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupliersProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Supliers__Products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idSuplier')->index('idSuplier_foreign');
            $table->unsignedInteger('idProduct')->index('idProduct_foreign');
            $table->unsignedInteger('priority')->nullable();
            $table->string('part_number');
            $table->unsignedInteger('quantity');
            $table->decimal('price');
            $table->text('condition')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Supliers__Products');
    }
}
