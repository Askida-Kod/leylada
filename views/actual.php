<header class="uk-navbar-container uk-navbar-transparent">
    <div class="uk-container" uk-navbar>
        <div class="uk-navbar-left">
            <a class="uk-navbar-item uk-logo" href="<?= $view->url()->get() ?>">
                <?php if ($params["logo"]): ?>
                    <img width="45" class="uk-border-circle" src="<?= $this->escape($params["logo"]) ?>" alt="<?= $params["title"] ?>">
                <?php else: ?>
                    <?= $params["title"] ?>
                <?php endif; ?>
            </a>
            <span class="uk-visible@m">|</span>
            <?php if ($view->position()->exists("navbar-vertical")): ?>
                <ul class="uk-grid-small uk-navbar-item uk-visible@m" uk-grid>
                    <?= $view->position("navbar-vertical", "positions/position-navbar.php") ?>
                </ul>
            <?php endif; ?>
        </div>

        <div class="uk-navbar-right">
            <?php if ($view->menu()->exists("main")): ?>
                <div class="uk-navbar-item uk-visible@m">
                    <?= $view->menu("main", "defined/menu/navbar-nav.php") ?>
                </div>
            <?php endif; ?>
            <?php if ($view->position()->exists("navbar")): ?>
                <ul class="uk-grid-small uk-navbar-item uk-visible@m" uk-grid>
                    <?= $view->position("navbar", "positions/position-navbar.php") ?>
                </ul>
            <?php endif; ?>
            
            <div class="uk-navbar-item uk-visible@s">
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
            <a class="uk-navbar-toggle uk-hidden@m" uk-navbar-toggle-icon href="#tm-mobile-navbar" uk-toggle></a>
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