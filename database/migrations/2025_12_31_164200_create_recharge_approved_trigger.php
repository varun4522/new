<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create trigger that credits user balance when a recharge becomes approved
        DB::unprepared(<<<'SQL'
CREATE TRIGGER tr_recharges_after_update
AFTER UPDATE ON recharges
FOR EACH ROW
BEGIN
    IF NEW.status = 'approved' AND (OLD.status IS NULL OR OLD.status <> 'approved') THEN
        UPDATE users SET balance = balance + NEW.amount WHERE id = NEW.user_id;
    END IF;
END;
SQL
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS tr_recharges_after_update');
    }
};
