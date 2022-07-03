<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cafes', static function (Blueprint $table): void {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('name')->index();
            $table->text('description')->nullable();
            //$table->text('description')->fulltext()->nullable();
            $table->string('code')->index();
            $table->string('place_id');
            $table->point('position');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('cafes');
    }
};
