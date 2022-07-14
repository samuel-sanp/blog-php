<?php

use SamuelConstantino\BlogPhp\Infrastructure\Repository\PdoArticleRepository;
use SamuelConstantino\BlogPhp\Infrastructure\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';

$connection = ConnectionCreator::createConnection();
$repository = new PdoArticleRepository($connection);
$articleId = intval($_GET['id']);
$article = $repository->getById($articleId);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Artigo</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div id="container">
        <h1>
            <?php echo $article->getTitle() ?>
        </h1>
        <p>
            <?php echo nl2br($article->getContent()) ?>
        </p>
        <div>
            <a class="botao botao-block" href="index.php">Voltar</a>
        </div>
    </div>
</body>

</html>