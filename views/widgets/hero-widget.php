<div class="uk-position-relative uk-visible-toggle" tabindex="-1" uk-slideshow="autoplay: true;animation:pull">
    <div>
        <ul class="uk-slideshow-items">
            <?php foreach ($widget->get("slideshow") as $slideshow): ?>
                <li class="tm-padding-small">
                    <div class="uk-grid-large uk-flex-middle" uk-grid>
                        <div class="uk-width-large@m">
                            <div class="uk-position-relative">
                                <div class="uk-position-relative uk-position-z-index">
                                    <h1 class="uk-h1 uk-margin-remove"><?= $slideshow["title"] ?></h1>
                                    <h2 class="uk-h1 uk-margin-remove tm-text-brush"><?= $slideshow["handwriting"] ?></h2>
                                </div>
                                <img class="tm-hover-for-text" data-src="<?= $view->url()->getStatic("theme:assets/stock/hero-text-bg.png") ?>" uk-img>
                            </div>
                            <p><?= $slideshow["desc"] ?></p>
                        </div>
                        <div class="uk-width-expand@m">
                            <div class="uk-inline uk-width-expand">
                                <img class="tm-slideshow-image" data-src="<?= $slideshow["image"]["src"] ?>" uk-img>
                                <?php if ($slideshow["video"]): ?>
                                    <div uk-lightbox>
                                        <a href="<?= $slideshow["video"] ?>" noanim="true" class="tm-slideshow-video">
                                            <div class="uk-text-center">
                                                <i uk-icon="icon:play;ratio:3"></i>
                                                <span class="uk-display-block uk-link-reset uk-text-bold">VIDEO</span>
                                            </div>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>