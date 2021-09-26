<?php

declare(strict_types=1);

namespace Sys\Restaurant\Products\Application\Update;

final class ProductUpdaterRequest
{
    private $id;
    private $name;
    private $category;
    private $price;
    private $available;
    private $state;

    public function __construct(
        string $id,
        string $name,
        string $category,
        float  $price,
        bool   $available,
        string $state
    )
    {
        $this->id           = $id;
        $this->name         = $name;
        $this->category     = $category;
        $this->price        = $price;
        $this->available    = $available;
        $this->state        = $state;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function category(): string
    {
        return $this->category;
    }

    public function price(): float
    {
        return $this->price;
    }

    public function available(): bool
    {
        return $this->available;
    }

    public function state(): string
    {
        return $this->state;
    }
}
