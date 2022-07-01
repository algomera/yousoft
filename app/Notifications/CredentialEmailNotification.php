<?php

	namespace App\Notifications;

	use App\User;
	use Illuminate\Bus\Queueable;
	use Illuminate\Contracts\Queue\ShouldQueue;
	use Illuminate\Notifications\Messages\MailMessage;
	use Illuminate\Notifications\Notification;

	class CredentialEmailNotification extends Notification
	{
		use Queueable;

		/**
		 * Create a new notification instance.
		 *
		 * @return void
		 */
		public function __construct(User $user, $password) {
			$this->user = $user;
			$this->password = $password;
		}

		/**
		 * Get the notification's delivery channels.
		 *
		 * @param mixed $notifiable
		 * @return array
		 */
		public function via($notifiable) {
			return ['mail'];
		}

		/**
		 * Get the mail representation of the notification.
		 *
		 * @param mixed $notifiable
		 * @return \Illuminate\Notifications\Messages\MailMessage
		 */
		public function toMail($notifiable) {
			return (new MailMessage)
				->greeting('Benvenuto, ' . $this->user->name)
				->line('Le tue credenziali di accesso sono:')
				->line('Email: ' . $this->user->email)
				->line('Password: ' . $this->password)
				->action('Accedi', url(env('APP_URL')));
		}

		/**
		 * Get the array representation of the notification.
		 *
		 * @param mixed $notifiable
		 * @return array
		 */
		public function toArray($notifiable) {
			return [//
			];
		}
	}