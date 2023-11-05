<?php

namespace app\dto;

class HistoryEventItem
{
    public $user;
    public $body;
    public $iconClass;
    public $footerDatetime;
    public $footer;
    public $iconIncome;
    public $content;
    public $bodyDatetime;
    public $oldValue;
    public $newValue;
    public $eventText;
    public $template;
    public $eventName;
    public $object;

    public function __construct(array $data)
    {
        $this->user = $data['user'] ?? null;
        $this->body = $data['body'] ?? null;
        $this->iconClass = $data['iconClass'] ?? null;
        $this->footerDatetime = $data['footerDatetime'] ?? null;
        $this->footer = $data['footer'] ?? null;
        $this->iconIncome = $data['iconIncome'] ?? null;
        $this->content = $data['content'] ?? null;
        $this->bodyDatetime = $data['bodyDatetime'] ?? null;
        $this->oldValue = $data['oldValue'] ?? null;
        $this->newValue = $data['newValue'] ?? null;
        $this->eventText = $data['eventText'] ?? null;
        $this->template = $data['template'] ?? null;
        $this->eventName = $data['eventName'] ?? null;
        $this->object = $data['object'] ?? null;
    }

    public function toArray()
    {
        return [
            'user' => $this->user,
            'body' => $this->body,
            'iconClass' => $this->iconClass,
            'footerDatetime' => $this->footerDatetime,
            'footer' => $this->footer,
            'iconIncome' => $this->iconIncome,
            'content' => $this->content,
            'bodyDatetime' => $this->bodyDatetime,
            'oldValue' => $this->oldValue,
            'newValue' => $this->newValue,
            'eventText' => $this->eventText,
            'template' => $this->template,
            'eventName' => $this->eventName,
            'object' => $this->object,
        ];
    }
}
