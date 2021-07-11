<?php if ($root->getDepth() === 0) : ?>
    <ul class="uk-nav uk-nav-primary tm-text-spacing">
    <?php endif; ?>

    <?php foreach ($root->getChildren() as $node) : ?>
        <li class="<?= $node->hasChildren() ? 'uk-parent' : '' ?><?= $node->get('active') ? ' uk-active' : '' ?>">
            <a href="<?= $node->getUrl() ?>" <?= $node->type == 'external' ? "target='_blank'" : null ?>>
                <?= $node->title ?>
            </a>
            <?php if ($node->hasChildren()) : ?>
                <?php if ($node->getDepth() === 1) : ?>
                    <ul class="uk-nav-sub">
                        <?php endif ?>
                            <?= $view->render('defined/menu/offcanvas-nav.php', ['root' => $node]) ?>
                        <?php if ($node->getDepth() === 1) : ?>
                    </ul>
                <?php endif ?>
            <?php endif ?>
        </li>
    <?php endforeach ?>

    <?php if ($root->getDepth() === 0) : ?>
    </ul>
<?php endif; ?>