<?php

namespace pimax\Messages;

class DynamicMessage {

    const NOTIFY_REGULAR = "REGULAR";
    const TYPE_RESPONSE = "RESPONSE";

    public function __construct($recipient, $text, $user_ref = false, $tag = null, $notification_type = self::NOTIFY_REGULAR, $messaging_type = self::TYPE_RESPONSE) {
        $this->recipient = $recipient;
        $this->text = $text;
        $this->user_ref = $user_ref;
        $this->tag = $tag;
        $this->notification_type = $notification_type;
        $this->messaging_type = $messaging_type;
        $this->messaging_type = $messaging_type;
    }

    public function getData() {
        return [
                'dynamic_text' => [
                    'text' => $this->text,
                    'fallback_text' => $this->text
                ]
        ];
    }

}
