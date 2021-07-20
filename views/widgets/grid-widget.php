<div>
    <div>
        <h2><?= $widget->get("title") ?></h2>
        <p><?= $widget->get("desc") ?></p>
    </div>
    <ul class="uk-margin-large-top uk-grid uk-child-width-1-<?= count($widget->get("slideshow")) ?> uk-grid-match" uk-grid>
        <?php foreach ($widget->get("slideshow") as $slideshow): ?>
            <li>
                <div class="uk-card uk-card-default uk-card-body uk-text-center">
                    <?php if($slideshow["image"]["src"]): ?>
                        <img data-src="<?= $slideshow["image"]["src"] ?>" alt="<?= $slideshow["image"]["alt"] ?>" width="70px" uk-img>
                    <?php endif ?>
                    <h4><?= $slideshow["title"] ?></h4>
                    <p class="uk-text-small"><?= $slideshow["desc"] ?></p>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>