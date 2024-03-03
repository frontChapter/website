<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('gifts', function (Blueprint $table) {
            $table->string('link')->after('code')->nullable();
            $table->string('value')->after('id')->nullable();
            $table->string('type')->after('id')->nullable();
            $table->string('description')->after('id')->nullable();
            $table->string('title')->after('id')->nullable();
            $table->foreignId('user_id')->after('id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gifts', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('description');
            $table->dropColumn('type');
            $table->dropColumn('value');
            $table->dropColumn('link');
            $table->dropConstrainedForeignId('user_id');
        });
    }
};
