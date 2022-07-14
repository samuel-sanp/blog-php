<?php

namespace SamuelConstantino\BlogPhp\Domain\Repository;

interface ArticleRepository
{
    public function getAll(): array;
    public function getById(): array;
    public function create(): bool;
    public function update(): bool;
    public function remove(): bool;
}