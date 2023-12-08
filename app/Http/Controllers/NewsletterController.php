<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MailchimpMarketing\ApiClient;

class NewsletterController extends Controller
{
    
    public function __invoke()
    {

        request()->validate([
            'email' => 'required|email'
        ]);
    
        $mailchimp = new ApiClient();
    
        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us11'
        ]);
    
        try {
    
            return $mailchimp->lists->addListMember('d3c0c95629', [
                'email_address' => request('email'),
                'status' => 'subscribed'
            ]);
    
            return redirect('/')->with('success', 'Subscribed to newsletter successfully.');
    
        } catch(\Exception $e) {
    
            throw \Illuminate\Validation\ValidationException::withMessages([
                'email' => 'This email could not be added to our newsletter list.'
            ]);
    
        }
    }

}
