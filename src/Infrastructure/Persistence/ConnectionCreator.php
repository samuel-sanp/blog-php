<?php

namespace SamuelConstantino\BlogPhp\Infrastructure\Persistence;
require_once 'vendor/autoload.php';

use PDO;
use PDOException;
use Throwable;

class ConnectionCreator
{
    public static function createConnection(): PDO
    {
        try {
            $connection = new PDO(
                'mysql:host=127.0.0.1;dbname=blogPhp',
                'root',
                '',
                );
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }

        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $connection;
    }
}