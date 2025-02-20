<?php

namespace App\Providers;

use App\Events\AddToNewsletter;
use App\Events\Registered;
use App\Listeners\AddToNewsletterListener;
use App\Listeners\AssignDefaultRole;
use App\Listeners\SendWelcomeEmail;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   */

  protected $listen = [
    // Registered::class => [
    //   AssignDefaultRole::class,
    //   SendWelcomeEmail::class,
    // ],
    AddToNewsletter::class => [
      AddToNewsletterListener::class,
    ],
  ];

}
