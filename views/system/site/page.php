<?php if($params->get('subTitle')): ?>
    <h5 class="uk-margin-small tm-text-cardo uk-text-primary"><?= $params->get('subTitle') ?></h5>
<?php endif ?>
<?php if($params->get('pageTitle')): ?>
    <h1 class="uk-margin-small uk-width-xlarge@m"><?= $params->get('pageTitle') ?></h1>
<?php endif ?>
<?php 
    $title = implode(' ', [$params['titleColor'], $params['titleClass']]); 
?>
<?php if(!$params['titleHide']): ?>
    <<?= $params['titleDomElement'] ?> class="<?= $title ?>"><?= $page->title ?></<?= $params['titleDomElement'] ?>>
<?php endif ?>
<div class="uk-margin-large"><?= $page->content ?></div>