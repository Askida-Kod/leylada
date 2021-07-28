<?php $view->script("docs", "docs:app/bundle/docs.js", "vue"); ?>
<div class="uk-grid" uk-grid>
    <div class="uk-width-medium@m">
        <?php foreach ($categories as $category): ?>
            <?php if ($posts = $category->getPosts()): ?>
                <ul class="uk-nav uk-nav-default uk-margin">
                    <li class="uk-nav-header"><?= $category->title ?></li>
                    <li class="uk-nav-divider"></li>
                    <?php foreach ($posts as $sub_post): ?>
                        <li <?= $sub_post->id == $post->id ? 'class="uk-active"' : null ?>>
                            <a style="font-family:'Nunito', sans-serif;letter-spacing:0" href="<?= $view->url("@docs/id", ["id" => $sub_post->id]) ?>">
                                <?= $sub_post->title ?>
                            </a>
                            <?php if ($sub_post->id == $post->id && $post->links): ?>
                                <ul class="uk-nav-sub">
                                    <?php foreach ($post->links as $link): ?>
                                        <li><a href="#<?= $link["src"] ?>" style="font-family:'Nunito', sans-serif;letter-spacing:0" target="_top" uk-scroll>- <?= $link["name"] ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <div class="uk-width-expand@m uk-first-column">
        <div>
            <h1 class="uk-h1"><?= $post->title ?></h1>
            <div class="uk-margin tm-docs"><?= $post->content ?></div>
        </div>
    </div>
    
</div>