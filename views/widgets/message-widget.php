<div class="uk-grid uk-child-width-1-2@m">
        <div>
            <h3><?= $widget->get("title") ?></h3>
            <p class="uk-text-small"><?= $widget->get("desc") ?></p>

            <?php if ($widget->get("button_title") && $widget->get("button_link")): ?>
                <a href="<?= $widget->get("button_link") ?>" class="uk-button uk-button-secondary"><?= $widget->get("button_title") ?></a>
            <?php endif; ?>
        </div>

        <div>
            <?php $slideshows = $widget->get("slideshow"); ?>
            <div>
                <div class="uk-child-width-1-<?= count($slideshows) ?> uk-grid-large" uk-grid>
                    <?php if (isset($slideshows[0]) && !empty($slideshows[0])): ?>
                        <div>
                            <div class="uk-height-small"></div>
                            <div class="uk-text-center">
                                <span class="uk-display-block uk-text-small"><?= $slideshows[0]["title"] ?></span>
                                <hr style="border-color:<?= $slideshows[0]["color"] ?>">
                                <span class="uk-display-block uk-text-small"><?= $slideshows[0]["little"] ?></span>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($slideshows[1]) && !empty($slideshows[1])): ?>
                        <div>
                            <div class="uk-text-center">
                                <span class="uk-display-block uk-text-small"><?= $slideshows[1]["title"] ?></span>
                                <hr style="border-color:<?= $slideshows[1]["color"] ?>">
                                <span class="uk-display-block uk-text-small"><?= $slideshows[1]["little"] ?></span>
                            </div>
                            <div class="uk-height-small"></div>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($slideshows[2]) && !empty($slideshows[2])): ?>
                        <div>
                            <div class="uk-height-small"></div>
                            <div class="uk-text-center">
                                <span class="uk-display-block uk-text-small"><?= $slideshows[2]["title"] ?></span>
                                <hr style="border-color:<?= $slideshows[2]["color"] ?>">
                                <span class="uk-display-block uk-text-small"><?= $slideshows[2]["little"] ?></span>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
</div>