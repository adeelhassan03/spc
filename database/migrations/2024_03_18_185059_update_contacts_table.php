<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            // Add new columns only if they don't exist
            if (!Schema::hasColumn('contacts', 'street_address')) {
                $table->string('street_address')->nullable();
            }
            if (!Schema::hasColumn('contacts', 'street_address_line2')) {
                $table->string('street_address_line2')->nullable();
            }
            if (!Schema::hasColumn('contacts', 'city')) {
                $table->string('city')->nullable();
            }
            if (!Schema::hasColumn('contacts', 'state_province_region')) {
                $table->string('state_province_region')->nullable();
            }
            if (!Schema::hasColumn('contacts', 'postal_zip_code')) {
                $table->string('postal_zip_code')->nullable();
            }
            if (!Schema::hasColumn('contacts', 'send_catalog')) {
                $table->boolean('send_catalog')->default(1);
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            // No need to revert the changes as these columns are new
        });
    }
}
