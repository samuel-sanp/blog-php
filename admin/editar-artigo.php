<?php

require_once '../config.php';
require_once '../src/Artigo.php';
require_once '../redireciona.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    try{
        $artigo = new Artigo($mysql);
        $artigo->editar($_POST['id'], $_POST['titulo'],$_POST['conteudo']);

        redireciona('index.php');
    }
    catch (Throwable $e) {
        echo $e->getMessage();
    }
}

$obj_artigo = new Artigo($mysql);
$artigo = $obj_artigo->encontrarPorId($_GET['id']);

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta charset="UTF-8">
    <title>Editar Artigo</title>
</head>

<body>
    <div id="container">
        <h1>Editar Artigo</h1>
        <form action="editar-artigo.php" method="POST">
            <p>
                <label for="titulo">Digite o novo título do artigo</label>
                <input class="campo-form" type="text" name="titulo" id="titulo" value="<?php echo $artigo['titulo'] ?>" />
            </p>
            <p>
                <label for="conteudo">Digite o novo conteúdo do artigo</label>
                <textarea class="campo-form" type="text" name="conteudo" id="titulo">
                    <?php echo $artigo['conteudo'] ?>
                </textarea>
            </p>
            <p>
                <input type="hidden" name="id" value="<?php echo $artigo['id']; ?>" />
            </p>
            <p>
                <button class="botao">Editar Artigo</button>
            </p>
        </form>
    </div>
</body>

</html>