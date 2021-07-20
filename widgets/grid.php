<?php
return [

    'name' => 'leylada/grid',

    'label' => 'Grid',

    'events' => [

        'view.scripts' => function ($event, $scripts) use ($app) {
            $date = new \DateTime();
            $scripts->register('widget-grid', 'theme:app/bundle/grid-widget.js', ['~widgets', 'multi-finder']);
        }

    ],

    'render' => function ($widget) use ($app) {
        return $app->view('theme:views/widgets/grid-widget.php', compact('widget'));
    }

];