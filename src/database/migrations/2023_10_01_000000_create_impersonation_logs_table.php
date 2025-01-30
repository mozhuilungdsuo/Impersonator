<?php




use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImpersonationLogsTable extends Migration
{
    public function up()
    {
        Schema::create('impersonation_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('original_user_id');
            $table->unsignedBigInteger('impersonated_user_id');
            $table->string('ip_address');
            $table->text('user_agent');
            $table->string('action'); // 'login' or 'logout'
            $table->timestamps();

            // Foreign key constraints (optional)
            // $table->foreign('original_user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('impersonated_user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('impersonation_logs');
    }
}