<?php if ($root->getDepth() === 0) : ?>
    <ul class="uk-navbar-nav">
<?php endif; ?>

    <?php foreach( $root->getChildren() as $node ): ?>
        <li class="<?= $node->hasChildren() ? 'uk-parent' : '' ?><?= $node->get('active') ? ' uk-active' : '' ?>">
            <a href="<?= $node->getUrl() ?>">
                <?= $node->title ?>
                <?php if($node->hasChildren()): ?>
                    <span uk-icon="chevron-down" class="uk-margin-small-left"></span>
                <?php endif ?>
            </a>
            <?php if( $node->hasChildren() ): ?>

                <?php if( $node->getDepth() === 1 ): ?>
                    <div class="uk-navbar-dropdown">
                        <ul class="uk-nav uk-navbar-dropdown-nav tm-navbar-dropdown">
                <?php endif ?>

                <?= $view->render('defined/menu/navbar-nav.php', ['root' => $node]) ?>

                <?php if( $node->getDepth() === 1 ): ?>
                        </ul>
                    </div>
                <?php endif ?>

            <?php endif ?>
        </li>
    <?php endforeach ?>

<?php if ($root->getDepth() === 0) : ?>
    </ul>
<?php endif; ?>