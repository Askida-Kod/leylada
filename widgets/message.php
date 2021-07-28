<?php
return [
    "name" => "leylada/message",

    "label" => "Message",

    "events" => [
        "view.scripts" => function ($event, $scripts) use ($app) {
            $date = new \DateTime();
            $scripts->register("widget-message", "theme:app/bundle/message-widget.js", ["~widgets", "multi-finder"]);
        },
    ],

    "render" => function ($widget) use ($app) {
        return $app->view("theme:views/widgets/message-widget.php", compact("widget"));
    },
];
