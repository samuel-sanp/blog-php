<?php

namespace SamuelConstantino\BlogPhp\Infrastructure\Repository;
require_once __DIR__.'/../../../vendor/autoload.php';

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
	public function getAll(): array
	{
		$sql = "SELECT id, title, content, publication_date FROM articles";
		$stmt = $this->connection->query($sql);

		return $this->hydrateArticleList($stmt);
	}

    private function hydrateArticleList(PDOStatement $stmt): array
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
	 * @return Article
	 */
	public function getById(int $id): Article
	{
		$sql = "SELECT id, title, content, publication_date FROM articles WHERE id = ?";
		$stmt = $this->connection->prepare($sql);
		$stmt->bindValue(1, $id, PDO::PARAM_INT);
		$stmt->execute();

		$articleData = $stmt->fetch();
		
		$article = new Article(
			$articleData['id'],
			$articleData['title'],
			$articleData['content'],
			new DateTimeImmutable($articleData['publication_date']),
		);
		
		return $article;
	}
	
	/**
	 *
	 * @return bool
	 */
	function create(Article $article): bool {
		return false;
	}
	
	/**
	 *
	 * @return bool
	 */
	function update(Article $article): bool {
		return false;
	}
	
	/**
	 *
	 * @return bool
	 */
	function remove(int $id): bool {
		$sql = "DELETE FROM articles WHERE id = ?";
		$stmt = $this->connection->prepare($sql);
		$stmt->bindValue(1, $id, PDO::PARAM_INT);

		return $stmt->execute();
	}
}