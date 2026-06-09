<?php
namespace Modules\SocialTwitter\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Modules\SocialAccount\Interfaces\SocialAccountInterface;
use Modules\SocialAccount\Models\SocialAccount;

class TwitterUser extends Model implements SocialAccountInterface
{
  protected $table = 'twitter_providers';
  protected $fillable = [
    'provider_id',
    'email',
    'name',
    'nickname',
    'avatar',
    'data'
  ];

  protected $casts = ['data' => 'array'];

  public function provider(): MorphOne {
    return $this->morphOne(SocialAccount::class, "providerable");
  }

  public function openLink(): string {
    return 'twitter.index';
  }
}