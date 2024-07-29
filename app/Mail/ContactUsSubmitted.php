<?php
namespace App\Mail;

use App\Models\ContactUs;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUsSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $contactUs;

    public function __construct(ContactUs $contactUs)
    {
        $this->contactUs = $contactUs;
    }

    public function build()
    {
        return $this->view('email')
                    ->subject('New Lead from YoDo Digital Website')
                    ->with('contactUs', $this->contactUs);
    }
}
