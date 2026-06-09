<?php
namespace Modules\SocialTwitter\Providers;

use Modules\SocialAccount\Interfaces\SocialProvider;
use Modules\SocialAccount\Enums\Provider;
use Modules\SocialTwitter\Models\TwitterUser;

class TwitterProvider implements SocialProvider
{
  public function getName(): string
  {
    return Provider::TWITTER->value;
  }

  public function getLabel(): string
  {
    return Provider::TWITTER->label();
  }

  public function getIcon(): string
  {
    return 'bi bi-twitter';
  }

  public function getLoginUrl(): string
  {
    return route('social.login', Provider::TWITTER->value);
  }

  public function handleCallback($socialUser): array
  {
    // Cari atau buat record di tabel github_users
    $user = TwitterUser::firstOrCreate(
      ['provider_id' => $socialUser->getId()],
      [
        'email' => $socialUser->getEmail(),
        'name' => $socialUser->getName(),
        'nickname' => $socialUser->getNickname(),
        'avatar' => $socialUser->getAvatar(),
        'data' => $socialUser->user,
      ]
    );

    return [
      'providerable_id' => $user->id,
      'providerable_type' => TwitterUser::class,
      'provider_data' => [
        'email' => $user->email,
        'name' => $user->name,
        'nickname' => $user->nickname,
        'avatar' => $user->avatar,
      ],
    ];
  }
}