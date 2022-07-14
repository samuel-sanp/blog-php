<?php

namespace SamuelConstantino\BlogPhp\Infrastructure\Persistence;
use PDO;

class ConnectionCreator
{
    public static function createConnection(): PDO
    {
        $connection = new PDO(
            'mysql:host=127.0.0.1;dbname=blogPhp',
            'root',
            '',
        );
        
        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $connection;
    }
}