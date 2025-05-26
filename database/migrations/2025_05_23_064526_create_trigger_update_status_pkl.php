<?php

use Illuminate\Support\Facades\DB;
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
        // Trigger ketika data PKL ditemukan
        DB::unprepared("
            CREATE TRIGGER update_status_pkl
            AFTER INSERT ON pkls
            FOR EACH ROW
            BEGIN
                UPDATE siswas SET status_pkl = TRUE WHERE id = NEW.siswa_id;
            END
        ");

        // Trigger ketika data sudah dihapus
        DB::unprepared("
            CREATE TRIGGER revert_status_pkl
            AFTER DELETE ON pkls
            FOR EACH ROW
            BEGIN
                UPDATE siswas SET status_pkl = FALSE WHERE id = OLD.siswa_id;
            END
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS update_status_pkl');
        DB::unprepared('DROP TRIGGER IF EXISTS revert_status_pkl');
    }
};
