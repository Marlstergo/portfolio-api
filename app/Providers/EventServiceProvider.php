<?php

namespace App\Providers;

use App\Events\Registered;
use App\Listeners\AssignDefaultRole;
use App\Listeners\SendWelcomeEmail;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   */

  protected $listen = [
    Registered::class => [
      AssignDefaultRole::class,
      SendWelcomeEmail::class,
    ],
  ];

  public function register(): void
  {
    //
  }

  /**
   * Bootstrap services.
   */
  public function boot(): void
  {
    //
  }
}
