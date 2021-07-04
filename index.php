<?php
return [
    "name" => "leylada",

    "menus" => [
        "main" => "Main",
        "modal" => "Modal"
    ],

    "positions" => [
        "sidebar" => "Sidebar",
        "top" => "Top",
        "bottom" => "Bottom",
        "footer" => "Footer",
    ],

    "node" => [
        "section" => "uk-section uk-section-default",
        "container" => "uk-container",
        "sectionSize" => "",
        "sectionImage" => "",
        "contentAlign" => "",
        "titleHide" => false,
        "titleDomElement" => "h1",
        "titleColor" => "",
        "titleClass" => "",
    ],

    "widget" => [
        "onHeightViewport" => false,
        "heights" => [
            "offset-bottom" => 20,
            "offset-top" => 0,
        ],
        "section" => "uk-section uk-section-default",
        "sectionSize" => "",
        "sectionImage" => "",
        "contentAlign" => "",
        "titleHide" => false,
        "titleDomElement" => "h1",
        "titleColor" => "",
        "titleClass" => "",
    ],

    "settings" => "@site/settings#site-theme",

    "config" => [
        "fakeSite" => false,
        "socials" => [
            "facebook" => "",
            "linkedin" => "",
            "instagram" => "",
            "twitter" => ""
        ]
    ],

    "events" => [
        "view.system/site/admin/settings" => function ($event, $view) use ($app) {
            $view->script("site-theme", "theme:app/bundle/site-theme.js", "site-settings");
            $view->data('$theme', $this);
        },

        "view.system/site/admin/edit" => function ($event, $view) use ($app) {
            $view->script("node-theme", "theme:app/bundle/node-theme.js", "site-edit");
        },

        "view.system/widget/edit" => function ($event, $view) {
            $view->script("widget-theme", "theme:app/bundle/widget-theme.js", "widget-edit");
        },

        "view.layout" => function ($event, $view) use ($app) {
            if ($app->isAdmin()) {
                return;
            }
            $params = $view->params;
            $view->data('$fakeSite', $params->get("fakeSite"));
        },
    ],
];
