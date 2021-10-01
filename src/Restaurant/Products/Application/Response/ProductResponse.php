<?php

declare(strict_types=1);

namespace Sys\Restaurant\Products\Application\Response;

final class ProductResponse
{
    private $id;
    private $name;
    private $category;
    private $price;
    private $available;
    private $state;
    private $created_at;
    private $updated_at;

    public function __construct(
        string $id,
        string $name,
        string $category,
        float $price,
        bool $available,
        string $state,
        string $created_at,
        string $updated_at
    )
    {
        $this->id           = $id;
        $this->name         = $name;
        $this->category     = $category;
        $this->price        = $price;
        $this->available    = $available;
        $this->state        = $state;
        $this->created_at   = $created_at;
        $this->updated_at   = $updated_at;
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

    public function created_at(): string
    {
        return $this->created_at;
    }

    public function updated_at(): string
    {
        return $this->updated_at;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'category' => $this->category,
            'price' => $this->price,
            'available' => $this->available,
            'state' => $this->state,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
