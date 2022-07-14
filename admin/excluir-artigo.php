<?php

use SamuelConstantino\BlogPhp\Infrastructure\Persistence\ConnectionCreator;
use SamuelConstantino\BlogPhp\Infrastructure\Repository\PdoArticleRepository;

require_once __DIR__.'/../vendor/autoload.php';
require_once '../redirect.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $connection = ConnectionCreator::createConnection();
    $repository = new PdoArticleRepository($connection);

    $articles = $repository->remove($_POST['id']);

    header("Location: index.php");
    die();

    // redirect('index.php');
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta charset="UTF-8">
    <title>Excluir Artigo</title>
</head>

<body>
    <div id="container">
        <h1>Você realmente deseja excluir o artigo?</h1>
        <form method="post" action="excluir-artigo.php">
            <p>
                <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" />
                <button class="botao">Excluir</button>
            </p>
        </form>
    </div>
</body>

</html>