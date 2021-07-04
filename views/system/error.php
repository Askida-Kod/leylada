<html lang="<?= str_replace("_", "-", $app["translator"]->getLocale()) ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= $view->render("head") ?>
        <?php $view->script("theme", "theme:app/bundle/app.js"); ?>
    </head>
    <body>
        <section class="uk-flex uk-flex-middle uk-flex-center" uk-height-viewport>
            <div class="uk-text-center">
                <h1 class="uk-heading-2xlarge uk-text-bold uk-text-muted"><?= $exception->getCode() ?></h1>
                <div class="uk-panel uk-width-xlarge uk-margin">
                    <h2 class="uk-h3 uk-margin-small uk-text-bold uk-text-uppercase"><?= $title ?></h2>
                    <p class="uk-margin uk-text-italic"><?= $message ?></p>
                </div>
            </div>
        </section>
        <?php $view->render("footer"); ?>
    </body>
</html>