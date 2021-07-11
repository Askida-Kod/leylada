<html lang="<?= str_replace("_", "-", $app["translator"]->getLocale()) ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= $view->render("head") ?>
        <?php $view->script("theme", "theme:app/bundle/app.js"); ?>
    </head>
    <body id="isbody" style="display: none">
        <header class="uk-navbar-container">
            <div class="uk-container" uk-navbar>
                <div class="uk-navbar-left">
                    <a class="uk-navbar-item uk-hidden@m uk-logo" href="<?= $view->url()->get() ?>">
                        <?php if ($params["logo"]): ?>
                            <img width="80" src="<?= $this->escape($params["logo"]) ?>" alt="<?= $params["title"] ?>">
                        <?php else: ?>
                            <?= $params["title"] ?>
                        <?php endif; ?>
                    </a> 
                    <?php if ($view->menu()->exists("main")): ?>
                        <div class="uk-navbar-item uk-visible@m">
                            <?= $view->menu("main", "defined/menu/navbar-nav.php") ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="uk-navbar-center">
                    <a class="uk-navbar-item uk-visible@m uk-logo" href="<?= $view->url()->get() ?>">
                        <?php if ($params["logo"]): ?>
                            <img width="100" src="<?= $this->escape($params["logo"]) ?>" alt="<?= $params["title"] ?>">
                        <?php else: ?>
                            <?= $params["title"] ?>
                        <?php endif; ?>
                    </a> 
                </div>

                <div class="uk-navbar-right">
                    <div style="display:none" class="uk-navbar-item uk-visible@s">
                        <?php if ($view->params->get("registration_permit")): ?>
                            <a href="<?= $view->url("@user/login") ?>" class="uk-button uk-button-primary">
                                <i uk-icon="user" class="uk-margin-small-right"></i><?= __("Sign In") ?>
                            </a>
                        <?php endif; ?>
                        <?php if ($app["user"]->isAuthenticated()): ?>
                            <ul class="uk-grid uk-flex-middle">
                                <li><a href="<?= $view->url("@user/profile") ?>"><img class="uk-border-circle" data-src="<?= $app["user"]->getAvatar() ?>" width="40" uk-img></a></li>
                                <li><a title="<?= __("Logout") ?>" uk-tooltip href="<?= $view->url("@user/logout") ?>" uk-icon="icon:sign-out;ratio:1.3"></a></li>
                            </ul>
                        <?php endif; ?>
                    </div>
                    <?php if($view->params->get("socials")): ?>
                        <ul class="uk-grid uk-grid-small uk-visible@m uk-navbar-item">
                            <?php foreach($params->get("socials") as $icon => $url): ?>
                                <li>
                                    <a href="<?= $url ?>" target="_blank" ref="nofollow" uk-icon="icon:<?= $icon ?>; ratio:0.8"></a>
                                </li>
                            <?php endforeach ?>
                        </ul>
                        <span class="uk-margin-left uk-visible@m uk-margin-right">|</span>
                    <?php endif ?>
                    <?php if($view->menu()->exists("modal")): ?>
                        <?= $view->render("defined/modal.php") ?>
                    <?php endif ?>
                </div>
            </div>
        </header>

        <div id="tm-mobile-navbar" class="uk-modal-full" uk-modal>
            <div class="uk-modal-dialog">
                <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
                <div class="uk-section-default uk-flex uk-flex-middle uk-flex-center" uk-height-viewport>
                    <div class="uk-text-center">
                        <?php if ($view->position()->exists("navbar-vertical")): ?>
                            <ul class="uk-list">
                                <?= $view->position("navbar-vertical", "positions/position-navbar.php") ?>
                            </ul>
                        <?php endif; ?>
                        
                        <?php if ($view->menu()->exists("main")): ?>
                            <div class="uk-margin">
                                <?= $view->menu("main", "defined/menu/offcanvas-nav.php") ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($view->position()->exists("navbar")): ?>
                            <ul class="uk-list">
                                <?= $view->position("navbar", "positions/position-navbar.php") ?>
                            </ul>
                        <?php endif; ?>

                        <?php if ($view->menu()->exists("others")): ?>
                            <hr>
                            <div class="uk-margin">
                                <?= $view->menu("others", "defined/menu/offcanvas-nav.php") ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <?php if ($view->position()->exists("top")): ?>
            <?= $view->position("top", "positions/position-default.php") ?>
        <?php endif; ?> 

        <?php
        $section = [$params["section"], $params["sectionSize"], $params["contentAlign"]];
        $image = null;
        if ($params["sectionImage"]) {
            $section[] = "uk-background-image uk-background-cover";
            $imageUrl = $view->url()->getStatic($params["sectionImage"]);
            $image = "data-src='$imageUrl' uk-img";
        }
        $title = implode(" ", [$params["titleColor"], $params["titleClass"]]);
        ?>

        <section class="<?= implode(" ", $section) ?>" <?= $image ?>>
            <div class="<?= $params->get("container") ?>">
                <div uk-grid>
                    <div class="uk-width-expand@s">
                        <?= $view->render("content") ?>
                    </div>
                    <?php if ($view->position()->exists("sidebar")): ?>
                    <div class="uk-width-medium@m">
                        <ul class="uk-list uk-list-large uk-list-divider">
                            <?= $view->position("sidebar", "positions/position-sidebar.php") ?>
                        </ul>
                    </div>
                    <?php endif; ?> 
                </div>
            </div>
        </section>

        <?php if ($view->position()->exists("bottom")): ?>
            <?= $view->position("bottom", "positions/position-default.php") ?>
        <?php endif; ?> 

        <?php if ($view->position()->exists("footer")): ?>
            <?= $view->position("footer", "positions/position-default.php") ?>
        <?php endif; ?>
        <?php $view->render("footer"); ?>
    </body>
</html>