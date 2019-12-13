<?php

namespace common\components\translator;

class ProductTranslationRequest
{
    /**
     * @var string
     */
    private $brand;
    /**
     * @var string
     */
    private $product;
    /**
     * @var int
     */
    private $gender;

    public function __construct(string $brand, string $product, int $gender)
    {

        $this->brand = $brand;
        $this->product = $product;
        $this->gender = $gender;
    }

    /**
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * @return string
     */
    public function getProduct(): string
    {
        return $this->product;
    }

    /**
     * @return int
     */
    public function getGender(): int
    {
        return $this->gender;
    }
}