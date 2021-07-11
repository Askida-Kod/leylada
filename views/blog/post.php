<?php $view->script("post", "blog:app/bundle/post.js", "vue"); ?>
<?php
$theme_blog = $app["theme_blog"];
$theme_blog->instanceBlogId($post->id);
$previousPost = $theme_blog->getPreviousPost();
$lastPost = $theme_blog->getlastPost();
?>
<article class="uk-article">
    <div class="uk-container uk-container-xsmall">
        <div class="uk-margin uk-flex uk-flex-middle uk-flex-between">
            <div>
                <p class="uk-text-meta uk-flex uk-flex-middle">
                    <?php if ($post->get("theme.youtube_url")): ?>
                        <i uk-icon="play-circle" class="uk-margin-small-right" uk-tooltip="<?= __("Video Content") ?>"></i>
                    <?php endif; ?>
                    <?= __("Written by %name% - %date%", ["%name%" => $this->escape($post->user->name), "%date%" => ' <time class="uk-margin-small-left" datetime="' . $post->date->format(\DateTime::ATOM) . '" v-cloak>{{ "' . $post->date->format(\DateTime::ATOM) . '" | date("longDate") }}</time>']) ?>
                </p>
            </div>
            <div>
                <ul class="uk-subnav uk-text-capitalize">
                    <?php foreach ($post->getCategories() as $category): ?>
                        <li><a href="<?= $view->url("@blog/category/id", ["id" => $category["id"]]) ?>">#<?= $category["title"] ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <div>
            <ul uk-grid>
                <li><a href="https://www.linkedin.com/shareArticle?url=<?= $view->url("@blog/id", ["id" => $post->id], 0) ?>
" target="_blank" uk-icon="linkedin"></a></li>
                <li><a href="https://twitter.com/intent/tweet?text=<?= $post->title . " " . $view->url("@blog/id", ["id" => $post->id], 0) ?>" target="_blank" uk-icon="twitter"></a></li>
                <li><a href="mailto:?body=<?= $post->title . " " . $view->url("@blog/id", ["id" => $post->id], 0) ?>"uk-icon="mail"></a></li>
            </ul>
        </div>
    
        <h1 class="uk-heading-small uk-text-bold uk-margin"><?= $post->title ?></h1>

        <?php if ($post->excerpt): ?>
            <div class="uk-margin tm-text"><?= $post->excerpt ?></div>
        <?php endif; ?>
    </div>

    <?php if ($post->get("theme.youtube_url")): ?>
        <div class="uk-margin-large">
            <iframe width="100%" height="600" src="<?= $post->get("theme.youtube_url") ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    <?php endif; ?>

    <?php if (!$post->get("theme.youtube_url") && $image = $post->get("image.src")): ?>
        <img src="<?= $image ?>" alt="<?= $post->get("image.alt") ?>" width="100%">
    <?php endif; ?>

    <div class="uk-container uk-container-xsmall uk-margin">
        <div class="uk-margin tm-text"><?= $post->content ?></div>


        <?php if($post->get('theme.sources')): ?>
            <div class="uk-margin-large">
                <h5 class="uk-h3"><?= __('Sources List') ?></h5>
                <ul class="uk-list uk-list-bullet uk-list-large">
                    <?php foreach($post->get('theme.sources') as $source): ?>
                        <li>
                            <a href="<?= $source['url'] ?>" target="_blank" rel="nofollow" title="<?= $source['title'] ?>"><?= $source['title'] ?></a>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>
        
        <div class="uk-margin-large uk-child-width-1-2@m" uk-grid>
            <div>
            <?php if ($previousPost): ?>
                <a href="<?= $view->url("@blog/id", ["id" => $previousPost->id ?: 0], "base") ?>" class="uk-link-reset uk-card uk-card-primary uk-light uk-card-body uk-card-small">
                    <span class="uk-display-block"><i uk-icon="arrow-left" class="uk-margin-small-right"></i><?= __("Previous Post") ?></span>
                    <p class="uk-text-small uk-text-muted uk-margin-small">
                    <?= $previousPost->title ?>
                    </p>
                </a>
                <?php endif; ?>
            </div>
            <div>
            <?php if ($lastPost): ?>
                <a href="<?= $view->url("@blog/id", ["id" => $lastPost->id ?: 0], "base") ?>" class="uk-link-reset uk-card uk-card-primary uk-light uk-card-body uk-card-small">
                    <span class="uk-display-block uk-text-right"><?= __("Last Post") ?><i uk-icon="arrow-right" class="uk-margin-small-left"></i></span>
                    <p class="uk-text-right uk-text-small uk-text-muted uk-margin-small">
                    <?= $lastPost->title ?>
                    </p>
                </a>
                <?php endif; ?>
            </div>
        </div>

        <?php if ($post->get("comment_status")): ?>
            <?= $view->render("system/comment/comment.php", [
                "service" => [
                    "type" => "blog",
                    "own_id" => $post->id,
                    "type_url" => [
                        "url" => "@blog/id",
                        "key" => "id",
                    ],
                ],
            ]) ?>
        <?php endif; ?>
        
    </div>

</article>