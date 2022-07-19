<?php

namespace CleverAge\ColissimoBundle\Model\Shipping\Letter;

class CustomsDeclarations
{
    private string $includeCustomsDeclarations = '0';
    /** @var Article[] $articles */
    private array $articles;
    private ?int $category = null;

    public function getIncludeCustomsDeclarations(): string
    {
        return $this->includeCustomsDeclarations;
    }

    public function setIncludeCustomsDeclarations(string $includeCustomsDeclarations): CustomsDeclarations
    {
        $this->includeCustomsDeclarations = $includeCustomsDeclarations;

        return $this;
    }

    public function getArticles(): array
    {
        return $this->articles;
    }

    public function setArticles(array $articles): CustomsDeclarations
    {
        $this->articles = $articles;

        return $this;
    }

    public function getCategory(): ?int
    {
        return $this->category;
    }

    public function setCategory(?int $category): CustomsDeclarations
    {
        $this->category = $category;

        return $this;
    }

    public function toArray(): array
    {
        $articles = [];
        foreach ($this->getArticles() as $article) {
            $articles[] = [
                'description' => $article->getDescription(),
                'quantity' => $article->getQuantity(),
                'weight' => $article->getWeight(),
                'value' => $article->getValue(),
            ];
        }

        $customDeclarations = [
            'includeCustomsDeclarations' => $this->getIncludeCustomsDeclarations(),
            'contents' => ['article' => $articles],
        ];

        if ($category = $this->getCategory()) {
            $customDeclarations['category'] = ['value' => $category];
        }

        return $customDeclarations;
    }
}
