<?php

use SamuelConstantino\BlogPhp\Infrastructure\Repository\PdoArticleRepository;
use SamuelConstantino\BlogPhp\Infrastructure\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';

$connection = ConnectionCreator::createConnection();

$repository = new PdoArticleRepository($connection);

$articles = $repository->getAll();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Meu Blog</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div id="container">
        <h1>Meu Blog</h1>
        <?php foreach ($articles as $article) : ?>
            <h2>
                <a href="artigo.php?id=<?php echo $article->getId(); ?>">
                    <?php echo $article->getTitle(); ?>
                </a>
            </h2>
            <p>
                <?php echo $article->getContent(); ?>
            </p>
        <?php endforeach; ?>
    </div>
</body>

</html>