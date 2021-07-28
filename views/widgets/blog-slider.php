<div uk-slider="autoplay:true;autoplay-interval:3000">
    <div uk-grid>
        <div class="uk-width-medium@m">

        </div>
        <div class="uk-width-expand@m">
            <?php if ($widget->get("subTitle")): ?>
            <h5 class="uk-margin-small tm-text-cardo uk-text-center uk-text-primary"><?= $widget->get("subTitle") ?></h5>
            <?php endif; ?>
            <?php if ($widget->get("pageTitle")): ?>
                <div class="uk-flex uk-flex-center">
                <h1 class="uk-margin-small uk-text-center"><?= $widget->get("pageTitle") ?></h1>
                </div>
            <?php endif; ?>
        </div>
        <div class="uk-width-medium@m uk-flex uk-flex-bottom uk-flex-right">
            <ul class="uk-grid-small uk-grid">
                <li><a href="#" uk-slider-item="previous" uk-icon="icon:arrow-left;ratio:2"></a></li>
                <li><a href="#" uk-slider-item="next" uk-icon="icon:arrow-right;ratio:2"></a></li>
            </ul>
        </div>
    </div>

    <div class="uk-slider-items uk-child-width-1-3@m uk-grid uk-margin-medium">
        <?php foreach ($posts as $post): ?>
            <li>
                <div class="uk-card">
                    <div class="uk-card-media-top">
                        <?php if ($image = $post->get("image.src")): ?>
                            <a class="uk-display-block" href="<?= $view->url("@blog/id", ["id" => $post->id]) ?>">
                                <img class="tm-blogs-widget" data-src="<?= $image ?>" alt="<?= $post->get("image.alt") ?>" uk-img>
                            </a>
                        <?php endif; ?>
                        <h3 class="uk-h5 uk-text-center uk-margin-small uk-link-reset tm-text-cardo">
                            <a href="<?= $view->url("@blog/id", ["id" => $post->id]) ?>"><?= $post->title ?></a>
                        </h3>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </div>
</div>