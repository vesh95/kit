<?php

namespace common\components\translator;

class ProductTranslation
{
    /**
     * @var string
     */
    private $brandTranslation;
    /**
     * @var string
     */
    private $productTranslation;

    public function __construct(?ChineseTranslation $brandTranslation, ?ChineseTranslation $productTranslation)
    {
        $this->brandTranslation = $brandTranslation;
        $this->productTranslation = $productTranslation;
    }

    public function isBrandTranslated(): bool
    {
        return !is_null($this->brandTranslation);
    }

    public function isProductTranslated():bool{
        return !is_null($this->productTranslation);
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getBrandTranslation(): ChineseTranslation
    {
        if(!$this->isBrandTranslated()){
            throw new \Exception('brand is not translated');
        }
        return $this->brandTranslation;
    }

    /**
     * @return ChineseTranslation
     * @throws \Exception
     */
    public function getProductTranslation(): ChineseTranslation
    {
        if(!$this->isProductTranslated()){
            throw new \Exception('product is not translated');
        }
        return $this->productTranslation;
    }
}