<?php

declare(strict_types=1);

namespace Sys\Restaurant\Products\Domain\Entity;

use Illuminate\Support\Facades\Date;
use Sys\Restaurant\Products\Domain\ValueObjects\ProductAvailable;
use Sys\Restaurant\Products\Domain\ValueObjects\ProductCategory;
use Sys\Restaurant\Products\Domain\ValueObjects\ProductId;
use Sys\Restaurant\Products\Domain\ValueObjects\ProductName;
use Sys\Restaurant\Products\Domain\ValueObjects\ProductPrice;
use Sys\Restaurant\Products\Domain\ValueObjects\ProductState;
use Sys\Shared\Domain\ValueObjects\DateTimeValueObject;

final class Product
{
    const TABLE = 'products';

    private $id;
    private $name;
    private $category;
    private $price;
    private $available;
    private $state;
    private $created_at;
    private $updated_at;

    public function __construct(
        ProductId           $id,
        ProductName         $name,
        ProductCategory     $category,
        ProductPrice        $price,
        ProductAvailable    $available,
        ProductState        $state,
        DateTimeValueObject $created_at,
        DateTimeValueObject $updated_at
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

    public static function create
    (
        ProductId           $id,
        ProductName         $name,
        ProductCategory     $category,
        ProductPrice        $price,
        ProductAvailable    $available,
        ProductState        $state
    ): self
    {
        return new self(
            $id,
            $name,
            $category,
            $price,
            $available,
            $state,
            new DateTimeValueObject(),
            new DateTimeValueObject()
        );
    }

    public static function fromValues(
        string $id,
        string $name,
        string $category,
        float $price,
        bool $available,
        string $state,
        string $created_at,
        string $updated_at
    ): self
    {
        return new self(
            new ProductId($id),
            new ProductName($name),
            new ProductCategory($category),
            new ProductPrice($price),
            new ProductAvailable($available),
            new ProductState($state),
            new DateTimeValueObject($created_at),
            new DateTimeValueObject($updated_at)
        );
    }

    public function id(): ProductId
    {
        return $this->id;
    }

    public function name(): ProductName
    {
        return $this->name;
    }

    public function category(): ProductCategory
    {
        return $this->category;
    }

    public function price(): ProductPrice
    {
        return $this->price;
    }

    public function available(): ProductAvailable
    {
        return $this->available;
    }

    public function state(): ProductState
    {
        return $this->state;
    }

    public function created_at(): DateTimeValueObject
    {
        return $this->created_at;
    }

    public function updated_at(): DateTimeValueObject
    {
        return $this->updated_at;
    }

    public function changeName(ProductName $name): void
    {
        if (! $this->name->equals($name)) {
            $this->name = $name;
            $this->updated_at = new DateTimeValueObject();
        }
    }

    public function changeCategory(ProductCategory $category): void
    {
        if (! $this->category->equals($category)) {
            $this->category = $category;
            $this->updated_at = new DateTimeValueObject();
        }
    }

    public function changePrice(ProductPrice $price): void
    {
        if (! $this->price->equals($price)) {
            $this->price = $price;
            $this->updated_at = new DateTimeValueObject();
        }
    }

    public function changeAvailable(ProductAvailable $available): void
    {
        if (! $this->available->equals($available)) {
            $this->available = $available;
            $this->updated_at = new DateTimeValueObject();
        }
    }

    public function changeState(ProductState $state): void
    {
        if (! $this->state->equals($state)) {
            $this->state = $state;
            $this->updated_at = new DateTimeValueObject();
        }
    }

    public function toArray(): array
    {
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'category'      => $this->category,
            'price'         => $this->price,
            'available'     => $this->available,
            'state'         => $this->state,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at
        ];
    }

}
