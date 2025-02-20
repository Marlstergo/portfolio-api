<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsletterUser extends Model
{

  protected $fillable = ['email', 'name', 'phone', 'source'];
}
