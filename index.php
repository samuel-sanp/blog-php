<?php
use SamuelConstantino\BlogPhp\Domain\Model\Article;

require_once 'vendor/autoload.php';

$article = new Article('titulo 1', 'conteudo 1', new DateTimeImmutable('1111-01-01'));

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
        <?php foreach ($artigos as $artigo) : ?>
        <h2>
            <a href="artigo.php?id=<?php echo $artigo['id']; ?>">
                <?php echo $artigo['titulo']; ?>
            </a>
        </h2>
        <p>
            <?php echo $artigo['conteudo']; ?>
        </p>
        <?php endforeach; ?>
    </div>
</body>

</html>