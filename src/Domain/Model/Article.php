<?php

namespace SamuelConstantino\BlogPhp\Domain\Model;
use DateTimeInterface;

class Article 
{
    private ?int $id;
    private string $title;
    private string $content;
    private DateTimeInterface $publicationDate;

    public function __construct(?int $id, string $title, string $content, DateTimeInterface $publicationDate)
    {   
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->publicationDate = $publicationDate;
    }
	/**
	 * @return int
	 */
	public function getId(): ?int {
		return $this->id;
	}
	
	/**
	 * @param ?int $id 
	 * @return Article
	 */
	public function setId(?int $id): self {
		$this->id = $id;
		return $this;
	}
	/**
	 * @return string
	 */
	public function getTitle(): string {
		return $this->title;
	}
	
	/**
	 * @param string $title 
	 * @return Article
	 */
	public function setTitle(string $title): self {
		$this->title = $title;
		return $this;
	}
	/**
	 * @return string
	 */
	public function getContent(): string {
		return $this->content;
	}
	
	/**
	 * @param string $content 
	 * @return Article
	 */
	public function setContent(string $content): self {
		$this->content = $content;
		return $this;
	}
}