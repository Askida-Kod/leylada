<?php
use GreenCheap\Application as App;
return [

    "name" => "leylada/image",

    "label" => "Image",

    "events" => [

        "view.scripts" => function ($event, $scripts) use ($app) {
            $date = new \DateTime();
            $scripts->register("widget-image", "theme:app/bundle/image-widget.js", ["~widgets", "multi-finder"]);
        }

    ],

    "render" => function ($widget) use ($app) {
        $content = App::content()->applyPlugins($widget->get("content"), ["markdown" => true]);
        $hand_content = App::content()->applyPlugins($widget->get("hand_content"), ["markdown" => true]);

        return $app->view("theme:views/widgets/image-widget.php", compact("widget", "content", "hand_content"));
    }

];