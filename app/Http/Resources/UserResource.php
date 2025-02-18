<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin User
 * @property User $resource
 */
class UserResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @param Request $request
   * @return array<string, mixed>
   */
  public function toArray(Request $request): array
  {
    /** @var User $user */
    $user = $this->resource;

    return [
      'id' => $this->id,
      'name' => $this->name,
      'email' => $this->email,
      'username' => $this->username,
      'metadata' => [
        'bio' => $this->bio,
        'avatar' => $this->avatar,
        'website_url' => $this->website_url,
        'github_url' => $this->github_url,
        'twitter_url' => $this->twitter_url,
        'location' => $this->location,
        'job_title' => $this->job_title,
        'company' => $this->company,
        'preferred_language' => $this->preferred_language,
      ],
      'is_admin' => (bool) $this->is_admin,
      'email_verified' => !is_null($this->email_verified_at),
    ];
  }
}
