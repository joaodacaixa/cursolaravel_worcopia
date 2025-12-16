
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('job_listing', function (Blueprint $table) {
            // altera os tipos de string para text
            $table->text('description')->nullable()->change();
            $table->text('requirements')->nullable()->change();
            $table->text('benefits')->nullable()->change();
            $table->text('company_description')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('job_listing', function (Blueprint $table) {
            // reverte caso queira voltar para string
            $table->string('description')->nullable()->change();
            $table->string('requirements')->nullable()->change();
            $table->string('benefits')->nullable()->change();
            $table->string('company_description')->nullable()->change();
        });
    }
};


