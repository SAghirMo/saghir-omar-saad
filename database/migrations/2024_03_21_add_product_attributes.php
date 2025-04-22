<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('stock')->default(0)->after('price');
            $table->string('size')->nullable()->after('stock');
            $table->string('color')->nullable()->after('size');
            $table->string('material')->nullable()->after('color');
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['stock', 'size', 'color', 'material']);
        });
    }
}; 