<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateJoinRequestsTable
 * Used for recording group join requests that need group leader's permission.
 * When group leader logged in the page, must check and show pending requests.
 *
 * Use 'isResolved' field to indicate whether the request has been entertained by
 * group leader. After leader has approved/rejected the request, change this value
 * to false. When reading new requests, remember to filter the requests according to
 * this value.
 */
class CreateJoinRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joinRequests', function(Blueprint $table) {
            $table->unsignedInteger('groupId');
            $table->foreign('groupId')->references('id')->on('groups')->onDelete('cascade');
            $table->unsignedInteger('userId');
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('isResolved');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('joinRequests');
    }
}
