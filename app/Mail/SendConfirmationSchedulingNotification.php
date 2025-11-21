<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendConfirmationSchedulingNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $reservation;

    public function __construct($reservation)
    {
        $this->reservation = $reservation;
    }

    public function build()
    {
        $formattedDate = \Carbon\Carbon::parse($this->reservation->date)->format('d/m/Y');

        return $this->subject('Confirmação de Reserva')
            ->view('emails.scheduling-notification-confirmation')
            ->with([
                'name'   => $this->reservation->name_complete,
                'date'   => $formattedDate,
                'hour'   => $this->reservation->hours,
                'people' => $this->reservation->number_of_people,
                'location_area' => $this->reservation->location_area,
            ]);
    }
}
