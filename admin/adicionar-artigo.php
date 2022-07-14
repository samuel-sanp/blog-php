<?php
use SamuelConstantino\BlogPhp\Infrastructure\Persistence\ConnectionCreator;
use SamuelConstantino\BlogPhp\Infrastructure\Repository\PdoArticleRepository;

require_once __DIR__.'/../vendor/autoload.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $connection = ConnectionCreator::createConnection();
    $repository = new PdoArticleRepository($connection);

    // $repository->;

    header("Location: index.php");
    die();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta charset="UTF-8">
    <title>Adicionar Artigo</title>
</head>

<body>
    <div id="container">
        <h1>Adicionar Artigo</h1>
        <form action="adicionar-artigo.php" method="POST">
            <p>
                <label for="">Digite o título do artigo</label>
                <input class="campo-form" type="text" name="titulo" id="titulo" />
            </p>
            <p>
                <label for="">Digite o conteúdo do artigo</label>
                <textarea class="campo-form" type="text" name="conteudo" id="conteudo"></textarea>
            </p>
            <p>
                <button type="submit" class="botao">Criar Artigo</button>
            </p>
        </form>
    </div>
</body>

</html>