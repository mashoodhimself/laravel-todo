<?php 

namespace App\Services;

use App\Services\Newsletter;
use MailchimpMarketing\ApiClient;

class MailChimpNewsletter implements Newsletter {

    public function __construct(protected ApiClient $client)
    {

    }

    public function subscribe(string $email, string $list)
    {
        $list ??= config('services.mailchimp.lists.subscribers');

        return $this->client->lists->addListMember($list, [
            'email_address' => $email,
            'status' => 'subscribed'
        ]);

    }

}