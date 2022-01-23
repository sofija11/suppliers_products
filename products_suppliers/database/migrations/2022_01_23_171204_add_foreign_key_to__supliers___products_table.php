<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToSupliersProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::table('supliers__products', function (Blueprint $table) {
            $table
            ->foreign('idProduct')
            ->references('id')
            ->on('products')
            ->onUpdate('RESTRICT')
            ->onDelete('RESTRICT')
        ;
        $table->foreign('idSuplier')->references('id')->on('supliers')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('supliers__products', function (Blueprint $table) {
            $table->dropForeign('supliers__products_idproduct_foreign');
            $table->dropForeign('supliers__products_idsuplier_foreign');
        });
    }
}
