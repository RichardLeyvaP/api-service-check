<?php

namespace App\Services;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMailable;


class SendEmailService {

    public function confirmReservation($data_reservation,$start_time,$client_id,$branch_id)
    {
        $logoUrl = 'https://i.pinimg.com/originals/6a/8a/39/6a8a3944621422753697fc54d7a5d6c1.jpg'; // Reemplaza esto con la 
        $template = 'send_mail_reservation';

      
            $client_email = 'richardleyvap1991@gmail.com';
            $client_name = 'Richard';
            $branch_name = 'Ipatinga';
        
              Log::info($client_email);
              $mail = new ContactMailable($logoUrl, $client_name,$data_reservation,$template,$start_time,$branch_name);
              $this->sendEmail($client_email,$mail);


    }

    public function sendEmail($client_email,$mail){
          Mail::to($client_email)
        ->send($mail->from('contact@risoftwar.com', 'RisoftwaR')
                    ->subject('Confirmación de Reserva en RisoftwaR'));       
      
        Log::info( "Enviado send_email");
    }

}