<?php

namespace SamuelConstantino\BlogPhp\Domain\Repository;
use SamuelConstantino\BlogPhp\Domain\Model\Article;

interface ArticleRepository
{
    public function getAll(): array;
    public function getById(int $id): Article;
    public function create(Article $article): bool;
    public function update(Article $article): bool;
    public function remove(Article $article): bool;
}