<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Barryvdh\DomPDF\Facade as PDF;

class SendPdfMail extends Mailable {
    use SerializesModels;

    protected $pdf;

    // Inject the PDF into the constructor

    public function __construct( $pdf ) {
        $this->pdf = $pdf;
    }

    public function build() {
        return $this->view( 'emails.pdf_mail' )
        ->subject( 'PDF Generated and Sent' )
        ->attachData( $this->pdf->output(), 'generated_pdf.pdf', [
            'mime' => 'application/pdf',
        ] );
    }
}
