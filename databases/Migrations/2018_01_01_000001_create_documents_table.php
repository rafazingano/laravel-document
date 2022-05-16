<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the Migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('document_content', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('document_id')->constrained('documents')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->text('content');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('document_group', function (Blueprint $table) {
            $table->foreignId('group_id')->constrained('document_groups')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('document_id')->constrained('documents')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('documentgables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('document_id')->constrained('documents')->onUpdate('cascade')->onDelete('cascade');
            $table->morphs('documentgable');
        });
    }

    /**
     * Reverse the Migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documentgables');
        Schema::dropIfExists('document_group');
        Schema::dropIfExists('document_content');
        Schema::dropIfExists('documents');
        Schema::dropIfExists('document_groups');
    }
}
