<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lead_id');
            $table->date('renewal_date');
            $table->text('amount', 10, 2);
            $table->string('package');

            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->integer('age');
            $table->date('dob');
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('added_by');
            $table->timestamps();

            $table->index(['lead_id', 'renewal_date', 'package']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscribers');
    }
}
