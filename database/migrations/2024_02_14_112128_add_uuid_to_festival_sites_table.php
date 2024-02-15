<?php

use App\Models\FestivalSite;
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
        Schema::table('festival_sites', function (Blueprint $table) {
            $table->uuid()->unique()->nullable()->after('user_id');
        });
        $festivalSites = FestivalSite::all();
        foreach ($festivalSites as $festivalSite) {
            $festivalSite->uuid = Str::orderedUuid()->toString();
            $festivalSite->save();
        }
        Schema::table('festival_sites', function (Blueprint $table) {
            $table->uuid()->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('festival_sites', function (Blueprint $table) {
            $table->dropColumn('uuid');
        });
    }
};
