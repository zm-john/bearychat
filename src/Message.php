<?php

namespace Quhang\BearyChat;

use GuzzleHttp\Client;

class Message
{
    protected $webhook;
    protected $message = [];

    public function __construct($webhook)
    {
        $this->webhook = $webhook;
    }

    public function text($text)
    {
        $this->message['text'] = $text;
        return $this;
    }

    public function notification(bool $need = true)
    {
        $this->message['notification'] = $need;
        return $this;
    }

    public function markdown(bool $need = true)
    {
        $this->message['notification'] = $need;
        return $this;
    }

    public function channel($name)
    {
        $this->message['channel'] = $name;
        return $this;
    }

    public function to($user)
    {
        $this->message['user'] = $user;
        return $this;
    }

    public function attachment(Attachment $attachment)
    {
        $this->message['attachments'][] = $attachment->toArray();
        return $this;
    }

    public function appendAttachment(Attachment $attachment)
    {
        return $this->attachment($attachment);
    }

    public function send()
    {
        $this->webhookCheck();
        (new Client())->request('POST', $this->webhook, [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body' => json_encode($this->message)
        ]);
    }

    protected function webhookCheck()
    {
        if (!$this->webhook) {
            throw new \Exception('Please set bearychat webhook!');
        }
    }
}
