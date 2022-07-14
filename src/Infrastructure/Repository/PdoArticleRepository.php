<?php

namespace SamuelConstantino\Infrastructure\Repository;
use SamuelConstantino\BlogPhp\Domain\Repository\ArticleRepository;
use PDO;
use PDOStatement;
use SamuelConstantino\BlogPhp\Domain\Model\Article;
use DateTimeImmutable;

class PdoArticleRepository implements ArticleRepository
{

    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }
    
	/**
	 *
	 * @return array
	 */
	function getAll(): array {
        $sql = "SELECT * FROM articles";
        $stmt = $this->connection->query($sql);

        return $this->hydrateArticleList($stmt);
	}

    function hydrateArticleList(PDOStatement $stmt): array
    {
        $articleDataList = $stmt->fetchAll();
    
        $articleList = [];
        foreach ($articleDataList as $articleData) {
            $articleList[] = new Article(
                $articleData['id'],
                $articleData['title'],
                $articleData['content'],
                new DateTimeImmutable($articleData['publication_date'])
            );
        }
        return $articleList;
    }
	
	/**
	 *
	 * @return array
	 */
	function getById(): array {
	}
	
	/**
	 *
	 * @return bool
	 */
	function create(): bool {
	}
	
	/**
	 *
	 * @return bool
	 */
	function update(): bool {
	}
	
	/**
	 *
	 * @return bool
	 */
	function remove(): bool {
	}
}