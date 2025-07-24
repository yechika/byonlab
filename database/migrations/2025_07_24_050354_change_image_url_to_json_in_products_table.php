<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Ganti nama kolom lama menjadi nama sementara
        Schema::table('products', function (Blueprint $table) {
            $table->renameColumn('image_url', 'image_url_old');
        });

        // 2. Buat kolom baru dengan nama 'image_url' dan tipe JSON
        Schema::table('products', function (Blueprint $table) {
            $table->json('image_url')->nullable()->after('image_url_old');
        });

        // 3. Pindahkan dan format data dari kolom sementara ke kolom baru
        DB::statement('UPDATE products SET image_url = JSON_ARRAY(image_url_old) WHERE image_url_old IS NOT NULL AND image_url_old != ""');

        // 4. Hapus kolom sementara
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('image_url_old');
        });
    }

    public function down(): void
    {
        // 1. Ganti nama kolom JSON menjadi sementara
        Schema::table('products', function (Blueprint $table) {
            $table->renameColumn('image_url', 'image_url_json_temp');
        });
        
        // 2. Buat kembali kolom string 'image_url'
        Schema::table('products', function (Blueprint $table) {
            $table->string('image_url')->nullable()->after('image_url_json_temp');
        });

        // 3. Kembalikan data dari kolom JSON sementara ke kolom string
        DB::statement('UPDATE products SET image_url = JSON_UNQUOTE(JSON_EXTRACT(image_url_json_temp, "$[0]")) WHERE image_url_json_temp IS NOT NULL');

        // 4. Hapus kolom JSON sementara
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('image_url_json_temp');
        });
    }
};