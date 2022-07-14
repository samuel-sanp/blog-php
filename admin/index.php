<?php
use SamuelConstantino\BlogPhp\Infrastructure\Persistence\ConnectionCreator;
use SamuelConstantino\BlogPhp\Infrastructure\Repository\PdoArticleRepository;

require_once __DIR__.'/../vendor/autoload.php';

$connection = ConnectionCreator::createConnection();
$repository = new PdoArticleRepository($connection);
$articles = $repository->getAll();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Página administrativa</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>

<body>
    <div id="container">
        <h1>Página Administrativa</h1>
        <div>
            <?php foreach($articles as $article) { ?>
                <div id="artigo-admin">
                    <p>
                        <?php echo $article->getTitle() ?>
                    </p>
                    <nav>
                        <a class="botao" href="editar-artigo.php?id=<?php echo $article->getId()?>">Editar</a>
                        <a class="botao" href="excluir-artigo.php?id=<?php echo $article->getId()?>">Excluir</a>
                    </nav>
                </div>
            <?php } ?>
        </div>
        <a class="botao botao-block" href="adicionar-artigo.php">Adicionar Artigo</a>
    </div>
</body>

</html>