<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Barryvdh\DomPDF\Facade as PDF;
// <-- Make sure this import is here
use Illuminate\Support\Facades\Mail;
use App\Mail\SendPdfMail;
use PDF;

class FormController extends Controller {
    // Show the form

    public function showForm() {
        return view( 'form' );
    }

    // Handle form submission via AJAX

    public function submitForm( Request $request ) {
        // Validate the form data
        $validatedData = $request->validate( [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ] );

        // Generate PDF
        $pdf = PDF::loadView( 'pdf_template', $validatedData );

        // Send email with the PDF attached
        Mail::to( $validatedData[ 'email' ] )->send( new SendPdfMail( $pdf ) );

        return response()->json( [ 'success' => 'Form submitted and email sent!' ] );
    }
}
