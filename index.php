<?php

use GreenCheap\Leylada\Bootstrap;

return [
    "name" => "leylada",

    "main" => function ($app) {
        $app["theme_blog"] = new Bootstrap();
    },

    "autoload" => [
        "GreenCheap\\Leylada\\" => "src",
    ],

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
        "sectionColorPreserve" => false,
        "containerSize" => "uk-container",
        "contentAlign" => "",
        "titleHide" => false,
        "titleDomElement" => "h1",
        "titleColor" => "",
        "titleClass" => "",
    ],

    "settings" => "@site/settings#site-theme",

    "config" => [
        "fakeSite" => false,
        "modal" => [
            "title" => "",
            "desc" => "",
            "images" => [
                [
                    "title" => "Etiam  volutpat tincidunt",
                    "desc" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, eos?",
                    "image" => [
                        "src" => "https://images.unsplash.com/photo-1516239482977-b550ba7253f2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=940&q=80",
                        "alt" => "International Women’s Day"
                    ]
                ]
            ]
        ],
        "socials" => [
            "facebook" => "",
            "linkedin" => "",
            "instagram" => "",
            "twitter" => ""
        ]
    ],

    "widgets" => [
        "widgets/hero.php",
        "widgets/grid.php",
        "widgets/image.php"
    ],

    "events" => [
        "view.system/site/admin/settings" => function ($event, $view) use ($app) {
            $view->script("site-theme", "theme:app/bundle/site-theme.js", ["site-settings", "multi-finder"]);
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
            $params->set("socials", array_filter($params->get("socials")));

            $modalSlideShow = array_map(function($val){
                if($val["image"]["src"]){
                    return $val;
                }
            }, $params->get("modal.images"));

            $params->set("modal.images", $modalSlideShow);
        },
    ],
];
