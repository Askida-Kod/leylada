<a class="uk-navbar-toggle uk-visible@m" nohref="true" uk-toggle="#tm-modal-full">Kadına Şiddet <i uk-icon="arrow-right"></i></a>
<a class="uk-navbar-toggle uk-hidden@m" nohref="true" uk-toggle="#tm-modal-full">Menü <i uk-icon="menu"></i></a>
<div id="tm-modal-full" class="uk-modal-full" uk-modal>
    <div id="slideshowmodalarea" class="uk-modal-dialog" uk-slideshow="ratio: false;autoplay:true">
        <div class="uk-grid-collapse uk-child-width-1-2@s" uk-grid>
            <div class="uk-padding-large uk-position-relative" uk-height-viewport>
                <div class="uk-text-right">
                    <a class="uk-modal-close" type="button" uk-icon="icon:close;ratio:2"></a>
                </div>

                <div class="uk-section">
                    <?php if($view->params->get("socials")): ?>
                        <ul class="uk-grid uk-grid-small uk-hidden@m uk-margin">
                            <li><em>Bizi Takip Edin</em></li>
                            <?php foreach($params->get("socials") as $icon => $url): ?>
                                <li>
                                    <a href="<?= $url ?>" target="_blank" ref="nofollow" uk-icon="icon:<?= $icon ?>; ratio:1"></a>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    <?php endif ?>
                    <div class="uk-hidden@m">
                        <?php if($view->menu()->exists("main")): ?>
                            <?= $view->menu("main", "defined/menu/offcanvas-nav.php") ?>
                        <?php endif ?>
                    </div>

                    <div>
                        <?php if($view->menu()->exists("modal")): ?>
                            <?= $view->menu("modal", "defined/menu/offcanvas-nav.php") ?>
                        <?php endif ?>
                    </div>
                </div>

                <div class="uk-position-absolute uk-position-bottom">
                    <div class="uk-padding-large">
                        <h1><?= $view->params->get("modal.title") ?></h1>
                        <p class="uk-text-small"><?= $view->params->get("modal.desc") ?></p>
                        <div class="uk-flex uk-flex-right">
                            <ul class="uk-grid uk-grid-small uk-visible@m uk-flex-middle" style="font-size:12px;">
                                <li><a class="uk-link-reset uk-text-bold" uk-slideshow-item="previous">01</a></li>
                                <li>
                                    <ul class="uk-slideshow-nav uk-dotnav uk-flex-center uk-margin"></ul>
                                </li>
                                <li><a class="uk-link-reset uk-text-bold" uk-slideshow-item="next">03</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="uk-slideshow-items">
                <?php foreach($view->params->get("modal.images") as $image): ?>
                    <li>
                        <img data-src="<?= $image["image"]["src"] ?>" alt="<?= $image["image"]["alt"] ?>" uk-img uk-cover>
                        <?php if($image["title"]): ?>
                            <div class="uk-overlay uk-overlay-default uk-position-bottom uk-position-large uk-text-left uk-transition-fade">
                                <h3 class="uk-margin-remove"><?= $image["title"] ?></h3>
                                <p class="uk-margin-remove"><?= $image["desc"] ?></p>
                            </div>
                        <?php endif ?>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
</div>