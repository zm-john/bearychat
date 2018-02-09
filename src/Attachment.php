<?php

namespace Quhang\BearyChat;

class Attachment
{
    protected $data = [];

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    public function title($title)
    {
        $this->data['title'] = $title;
        return $this;
    }

    public function url($url)
    {
        $this->data['url'] = $url;
        return $this;
    }

    public function text($text)
    {
        $this->data['text'] = $text;
        return $this;
    }

    public function color($color)
    {
        $this->data['color'] = $color;
        return $this;
    }

    public function image($url)
    {
        array_push($this->data['images'], ['url' => $url]);
        return $this;
    }

    public function appendImage($url)
    {
        return $this->image($url);
    }

    public function toArray()
    {
        if ($this->isNotNull('title') || $this->isNotNull('text')) {
            return $this->data;
        }

        throw new \Exception('Title and text cannot be empty at the same time');
    }

    protected function isNotNull($field)
    {
        if (array_key_exists($field, $this->data) && $this->data[$field]) {
            return true;
        }

        return false;
    }
}
