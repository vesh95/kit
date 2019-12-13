<?php

namespace common\components\translator\nosetime;

class ParsedString
{
    /**
     * @var string
     */
    private $brand;
    /**
     * @var string
     */
    private $name;
    /**
     * @var int
     */
    private $genderSign;

    public function __construct(string $brand, string $name, int $genderSign)
    {
        $this->brand = $brand;
        $this->name = $name;
        $this->genderSign = $genderSign;
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getGenderSign(): int
    {
        return $this->genderSign;
    }
}