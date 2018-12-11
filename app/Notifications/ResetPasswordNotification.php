<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends Notification
{
  /**
   * The password reset token.
   *
   * @var string
   */
  public $token;

  /**
   * The callback that should be used to build the mail message.
   *
   * @var \Closure|null
   */
  public static $toMailCallback;

  /**
   * Create a notification instance.
   *
   * @param  string  $token
   * @return void
   */
  public function __construct($token)
  {
      $this->token = $token;
  }

  /**
   * Get the notification's channels.
   *
   * @param  mixed  $notifiable
   * @return array|string
   */
  public function via($notifiable)
  {
      return ['mail'];
  }

  /**
   * Build the mail representation of the notification.
   *
   * @param  mixed  $notifiable
   * @return \Illuminate\Notifications\Messages\MailMessage
   */
  public function toMail($notifiable)
  {
      if (static::$toMailCallback) {
          return call_user_func(static::$toMailCallback, $notifiable, $this->token);
      }

      return (new MailMessage)
          ->subject('Richiesta di reimpostazione della password')
          ->greeting('Ciao ' . $notifiable->first_name . ' ' . $notifiable->last_name)
          ->line('Hai ricevuto questa email perché abbiamo ricevuto una richiesta di reimpostazione della password per il tuo account.')
          ->action('Resetta la password', url(config('app.url').route('password.reset', $this->token, false)))
          ->line('Se non hai richiesto la reimpostazione della password, non è richiesta alcuna ulteriore azione.')
          ->salutation('¡ Saluti !');
  }

  /**
   * Set a callback that should be used when building the notification mail message.
   *
   * @param  \Closure  $callback
   * @return void
   */
  public static function toMailUsing($callback)
  {
      static::$toMailCallback = $callback;
  }
}
