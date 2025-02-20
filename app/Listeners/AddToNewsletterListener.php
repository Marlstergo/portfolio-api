<?php

namespace App\Listeners;

use App\Models\NewsletterUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use App\Events\AddToNewsletter;

class AddToNewsletterListener
{
  /**
   * Create the event listener.
   */
  public function __construct()
  {
    //
  }

  /**
   * Handle the event.
   */
  public function handle(AddToNewsletter $event): void
  {
    Log::info('AddToNewsletterListener triggered', 
    ['userData' => $event->userData]);

    $userData = $event->userData;
    NewsletterUser::create([
      'email' => $userData['email'],
      'name' => $userData['name'],
      'phone' => $userData['phone'],
      'source' => $userData['source'],
    ]);
  }
}
