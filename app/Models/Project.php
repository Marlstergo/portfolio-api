<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
  protected $fillable = ['name', 'description', 'image'];

  public function tags()
  {
    return $this->belongsToMany(Tag::class);
  }

  static function projectExists($name)
  {
    return self::where('name', $name)->exists();
  }
}
