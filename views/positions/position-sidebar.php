<?php foreach($widgets as $widget): ?>
    <?php

        $section = [
            'uk-panel', $widget->theme['contentAlign']
        ];

        $title = implode(' ', [$widget->theme['titleColor'], $widget->theme['titleClass']]);
    ?>
    <li>
        <div class="<?= implode(' ', $section) ?>">
            <?php if(!$widget->theme['titleHide']): ?>
                <<?= $widget->theme['titleDomElement'] ?> class="<?= $title ?>"><?= $widget->title ?></<?= $widget->theme['titleDomElement'] ?>>
            <?php endif ?>
            <div><?= $widget->get('result') ?></div>
        </div>
    </li>
<?php endforeach ?>