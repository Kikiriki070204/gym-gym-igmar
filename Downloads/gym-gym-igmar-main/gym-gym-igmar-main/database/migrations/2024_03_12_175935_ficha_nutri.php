<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichaNutriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_nutri', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cita');
            $table->foreign('cita')->references('id')->on('citas')->onDelete('cascade');
            $table->decimal('peso', 5, 2)->nullable();
            $table->decimal('altura', 3, 2)->nullable();
            $table->decimal('med_cintura', 5, 2)->nullable();
            $table->decimal('med_cadera', 5, 2)->nullable();
            $table->decimal('med_cuello', 4, 2)->nullable();
            $table->decimal('porc_grasa_corporal', 4, 2)->nullable();
            $table->decimal('masa_corp_magra', 4, 2)->nullable();
            $table->text('objetivo')->nullable();
            $table->text('observaciones')->nullable();
            $table->text('motivo')->nullable();
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
        Schema::dropIfExists('ficha_nutri');
    }
}

