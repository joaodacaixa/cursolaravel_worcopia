<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('applicants', function (Blueprint $table) {
            // remove SOMENTE a foreign key antiga
            $table->dropForeign(['job_id']);

            // cria a foreign key correta
            $table->foreign('job_id')
                  ->references('id')
                  ->on('job_listing')
                  ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('applicants', function (Blueprint $table) {
            $table->dropForeign(['job_id']);

            // rollback para o estado anterior (jobs)
            $table->foreign('job_id')
                  ->references('id')
                  ->on('jobs');
        });
    }
};