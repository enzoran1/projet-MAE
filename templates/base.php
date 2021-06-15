<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/modal.css">
    <link rel="stylesheet" href="/css/formulaire.css">
</head>


    <title><?= $title ?? '' ?></title>
  </head>
  <body>
    <header>
      <?php require_once 'inc_dir/header.php'; ?>
    </header>

    <main>
        <?= $body ?>
    </main>

  </body>
  <?php  require_once 'inc_dir/footer.php'; ?>
</html>
