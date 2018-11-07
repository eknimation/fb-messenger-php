<?php

namespace pimax\Messages;

class MediaMessage extends Message {

    public function __construct($recipient, $file, $media_type, $buttons = array()) {

        $this->recipient = $recipient;
        $this->text = $file;
        $this->attachment_type = 'template';
        $this->template_type = 'media';
        $this->media_type = $media_type;
        $this->buttons = $buttons;
    }

    public function getData() {

        if (!empty($this->buttons)) {

            foreach ($this->buttons as $btn) {
                $temp_buttons[] = $btn->getData();
            }
        } else {
            $temp_buttons = [];
        }


        $elements [] = [
            'media_type' => $this->media_type,
            'attachment_id' => $this->text,
            'buttons' => $temp_buttons
        ];

        $res = [
            'recipient' => [
                'id' => $this->recipient
            ],
            'message' => [
                'attachment' => [
                    'type' => $this->attachment_type,
                    'payload' => [
                        'template_type' => $this->template_type,
                        'elements' => $elements
                    ]
                ]
            ]
        ];


        return $res;
    }

}
