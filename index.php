<?php
use SamuelConstantino\BlogPhp\Domain\Model\Article;

require_once 'vendor/autoload.php';

$article = new Article('titulo 1', 'conteudo 1', new DateTimeImmutable('1111-01-01'));

var_dump($article);