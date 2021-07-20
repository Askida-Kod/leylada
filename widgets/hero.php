<?php
return [

    'name' => 'leylada/hero',

    'label' => 'Hero',

    'events' => [

        'view.scripts' => function ($event, $scripts) use ($app) {
            $date = new \DateTime();
            $scripts->register('widget-hero', 'theme:app/bundle/hero-widget.js', ['~widgets', 'multi-finder']);
        }

    ],

    'render' => function ($widget) use ($app) {
        return $app->view('theme:views/widgets/hero-widget.php', compact('widget'));
    }

];