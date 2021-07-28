<?php if ($widget->get("subTitle")): ?>
    <h5 class="uk-margin-small tm-text-cardo uk-text-primary"><?= $widget->get("subTitle") ?></h5>
<?php endif; ?>
<?php if ($widget->get("pageTitle")): ?>
    <h1 class="uk-margin-small uk-width-xlarge@m"><?= $widget->get("pageTitle") ?></h1>
<?php endif; ?>

<div class="uk-child-width-1-3@m uk-grid-match uk-margin-medium" uk-grid>
    <?php foreach ($posts as $post): ?>
        <div>
            <div class="uk-card">
                <div class="uk-card-media-top">
                    <?php if ($image = $post->get("image.src")): ?>
                        <a class="uk-display-block" href="<?= $view->url("@blog/id", ["id" => $post->id]) ?>">
                            <img class="tm-blogs-widget" data-src="<?= $image ?>" alt="<?= $post->get("image.alt") ?>" uk-img>
                        </a>
                    <?php endif; ?>
                    <h3 class="uk-link-text tm-text-cardo">
                        <a href="<?= $view->url("@blog/id", ["id" => $post->id]) ?>"><?= $post->title ?></a>
                    </h3>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>