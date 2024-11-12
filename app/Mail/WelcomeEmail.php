<?php

namespace App\Mail;

use App\Models\Settings;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @param User $user
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // Try to fetch the first record from the Settings table
        $settings = Settings::find(1);

        // If no record is found, provide a default site name
        $site_name = $settings ? $settings->site_name : 'Default Site Name'; // Default value if no settings are found

        // Build the email with the dynamic site name
        return $this->markdown('emails.welcome')
                    ->subject("Welcome to $site_name");
    }
}
