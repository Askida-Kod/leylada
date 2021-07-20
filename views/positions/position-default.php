<?php foreach ($widgets as $widget): ?>
    <?php
    $section = [$widget->theme["onHeightViewport"] ?: $widget->theme["section"], $widget->theme["sectionSize"], $widget->theme["contentAlign"]];
    $image = null;
    if($widget->theme["sectionColorPreserve"]){
        $section[] = "uk-preserve-color";
    }
    if ($widget->theme["sectionImage"]) {
        $section[] = "uk-background-image uk-background-cover";
        $imageUrl = $view->url()->getStatic($widget->theme["sectionImage"]);
        $image = "data-src='$imageUrl' uk-img";
    }

    $title = implode(" ", [$widget->theme["titleColor"], $widget->theme["titleClass"]]);
    ?>

    <?php if ($widget->theme["onHeightViewport"]): ?>
        <div class="<?= $widget->theme["section"] ?> uk-flex uk-flex-middle uk-flex-center uk-background-cover" uk-height-viewport='<?= json_encode($widget->theme["heights"]) ?>' <?= $image ?>>
    <?php endif; ?>

    <section class="<?= implode(" ", $section) ?>" <?= $widget->theme["onHeightViewport"] ?: $image ?>>
        <div class="<?= $widget->theme["containerSize"] ?>">
            <?php if (!$widget->theme["titleHide"]): ?>
                <<?= $widget->theme["titleDomElement"] ?> class="<?= $title ?>"><?= $widget->title ?></<?= $widget->theme["titleDomElement"] ?>>
            <?php endif; ?>
            <div><?= $widget->get("result") ?></div>
        </div>
    </section>

    <?php if ($widget->theme["onHeightViewport"]): ?>
        </div>
    <?php endif; ?>
<?php endforeach; ?>
