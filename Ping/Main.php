<?php
declare(strict_types=1);
namespace Modules\Ping;

use Core\Annabot as Annabot;

class Main {

  protected static $isRunnable = true;
  protected static $botVersion = '2.0.0';

  public function __load(Annabot $bot) {

    // On enregistre le bang !ping pour les comptes >= membres
    $bot->registerBang('ping', 1, 'pm');

    // On enregistre le bang !pong pour les comptes >= modérateur
    $bot->registerBang('pong', 3, 'room');

    // On écoute le bang !ping
    $bot->on('bang.ping', function($data) {

      // On répond pong!
      $this->tell(key($data['user']), 'pong!');

    });

    // On écoute le bang !pong
    $bot->on('bang.pong', function($data) {

      // On répond ping!
      $this->tell(key($data['user']), 'ping!');

    });
  }

  public static function isRunnable() {
    return static::$isRunnable;
  }

  public static function getVersion() {
    return static::$botVersion;
  }
}
