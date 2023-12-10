<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Http\Request;
use MailchimpMarketing\ApiClient;
use App\Services\MailChimpNewsletter;

class NewsletterController extends Controller
{
    
    public function __invoke(Newsletter $newsletter)
    {

        request()->validate([
            'email' => 'required|email'
        ]);
    
        try {
            
            $newsletter->subscribe($email);
    
            return redirect('/')->with('success', 'Subscribed to newsletter successfully.');
    
        } catch(\Exception $e) {
    
            throw \Illuminate\Validation\ValidationException::withMessages([
                'email' => 'This email could not be added to our newsletter list.'
            ]);
    
        }
    }

}
