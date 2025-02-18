<?php

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
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->unique();
            $table->text('bio')->nullable();
            $table->string('avatar')->nullable();
            $table->string('website_url')->nullable();
            $table->string('github_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->boolean('is_admin')->default(false);
            $table->string('location')->nullable();
            $table->string('job_title')->nullable();
            $table->string('company')->nullable();
            $table->boolean('newsletter_subscription')->default(false);
            $table->timestamp('last_login_at')->nullable();
            $table->string('preferred_language')->default('en');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'username',
                'bio',
                'avatar',
                'website_url',
                'github_url',
                'twitter_url',
                'is_admin',
                'location',
                'job_title',
                'company',
                'newsletter_subscription',
                'last_login_at',
                'preferred_language'
            ]);
        });
    }
};
