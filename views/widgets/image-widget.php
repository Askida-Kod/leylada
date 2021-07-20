<div class="uk-position-relative">
    <div class="uk-section uk-position-absolute" style="top:-130px;z-index:2" uk-scrollspy="cls: uk-animation-slide-top-small; repeat: true;delay: 1200">
        <h3 class="uk-heading-xlarge"><?= $widget->get("main_big_title") ?></h3>
    </div>
    <div class="uk-grid uk-grid-match" uk-grid>
        <div class="uk-width-large@m">
            <div class="uk-card uk-card-default uk-card-body uk-flex uk-flex-center uk-flex-middle">
                <div class="uk-text-center">
                <div class="uk-padding-small"></div>
                    <h2 class="uk-h3"><?= $widget->get("main_small_title") ?></h2>
                    <div class="uk-text-small"><?= $content ?></div>
                    <div class="uk-text-small tm-text-brush uk-text-large"><?= $hand_content ?></div>
                </div>
            </div>
        </div>

        <div class="uk-width-expand@m">
            <div class="uk-background uk-background-image uk-background-cover uk-inline" data-src="<?= $widget->get("main_image.src") ?>" uk-img>
                <div style="position:absolute;right:-60px;top:-60px">
                    <img data-src="<?= $view->url()->getStatic("theme:assets/stock/image-bg-1.png") ?>" width="200px" uk-img uk-scrollspy="cls: uk-animation-slide-bottom-small; repeat: true;delay: 1200">
                </div>
                <div class="uk-position-large uk-position-top-left">
                    <img data-src="<?= $widget->get("image_1.src") ?>" width="400px" uk-img uk-scrollspy="cls: uk-animation-slide-bottom-small; repeat: true;delay: 1200">
                </div>
                <div class="uk-position-large uk-position-top-right">
                    <img data-src="<?= $widget->get("image_2.src") ?>" width="400px" uk-img uk-scrollspy="cls: uk-animation-slide-left-small; repeat: true;delay: 1200">
                </div>
                <div class="uk-position-absolute" style="bottom:-30px;left:20px;">
                    <img data-src="<?= $widget->get("image_3.src") ?>" width="400px" uk-img uk-scrollspy="cls: uk-animation-slide-right-small; repeat: true;delay: 1200">
                </div>
               
            </div>
        </div>
    </div>
</div>