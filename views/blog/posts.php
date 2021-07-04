<?php $view->script("posts", "blog:app/bundle/post.js", "vue"); ?>

<?php foreach ($posts as $post): ?>
    <article class="uk-article">
        <div class="uk-container uk-container-xsmall">
            <h1 class="uk-heading-small uk-text-bold uk-margin"><a class="uk-link-reset" href="<?= $view->url("@blog/id", ["id" => $post->id]) ?>"><?= $post->title ?></a></h1>

            <div class="uk-margin uk-flex uk-flex-middle uk-flex-between">
                <div>
                    <p class="uk-text-meta uk-flex uk-flex-middle">
                        <?php if ($post->get("theme.youtube_url")): ?>
                            <i uk-icon="play-circle" class="uk-margin-small-right" uk-tooltip="<?= __("Video Content") ?>"></i>
                        <?php endif; ?>
                        <?= __("Written by %name% on %date%", ["%name%" => $this->escape($post->user->name), "%date%" => '<time datetime="' . $post->date->format(\DateTime::ATOM) . '" v-cloak>{{ "' . $post->date->format(\DateTime::ATOM) . '" | date("longDate") }}</time>']) ?>
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
        </div>

        <?php if ($image = $post->get("image.src")): ?>
            <a class="uk-display-block uk-margin-large" href="<?= $view->url("@blog/id", ["id" => $post->id]) ?>"><img src="<?= $image ?>" alt="<?= $post->get("image.alt") ?>" width="100%"></a>
        <?php endif; ?>

        <div class="uk-container uk-container-xsmall uk-margin">
            <div class="uk-margin tm-text"><?= $post->excerpt ?: $post->content ?></div>

            <ul class="uk-subnav uk-margin">
                <?php if ((isset($post->readmore) && $post->readmore) || $post->excerpt): ?>
                    <li><a class="uk-link-reset" href="<?= $view->url("@blog/id", ["id" => $post->id]) ?>"><i uk-icon="arrow-right" class="uk-margin-small-right"></i><?= __("Read more") ?></a></li>
                <?php endif; ?>
            </ul>
        </div>

    </article>
<?php endforeach; ?>

<?php
$range = 3;
$total = intval($total);
$page = intval($page);
$pageIndex = $page - 1;
?>

<?php if ($total > 1): ?>
    <ul class="uk-pagination uk-flex-center">

        <?php for ($i = 1; $i <= $total; $i++): ?>
            <?php if ($i <= $pageIndex + $range && $i >= $pageIndex - $range): ?>

                <?php if ($i == $page): ?>
                    <li class="uk-active"><span><?= $i ?></span></li>
                <?php else: ?>
                    <li>
                        <a href="<?= $view->url($page_link, array_merge(["page" => $i], $page_params)) ?>"><?= $i ?></a>
                    </li>
                <?php endif; ?>

            <?php elseif ($i == 1): ?>

                <li>
                    <a href="<?= $view->url($page_link, array_merge(["page" => 1], $page_params)) ?>">1</a>
                </li>
                <li><span>...</span></li>

            <?php elseif ($i == $total): ?>

                <li><span>...</span></li>
                <li>
                    <a href="<?= $view->url($page_link, array_merge(["page" => $total], $page_params)) ?>"><?= $total ?></a>
                </li>

            <?php endif; ?>
        <?php endfor; ?>


    </ul>
<?php endif;
?>
