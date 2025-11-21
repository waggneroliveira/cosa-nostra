<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendSchedulingNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $reservation;

    public function __construct($reservation)
    {
        $this->reservation = $reservation;
    }

    public function build()
    {
        return $this->subject('Solicitação de Agendamento de Reserva')
            ->view('emails.scheduling-notification')
            ->with([
                'name'   => $this->reservation->name_complete,
                'date'   => $this->reservation->date,
                'hour'   => $this->reservation->hours,
                'people' => $this->reservation->number_of_people,
            ]);
    }
}
