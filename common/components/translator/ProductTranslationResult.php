<?php

namespace common\components\translator;

class ProductTranslationResult
{
    /**
     * @var ProductTranslation|null
     */
    private $translation;
    /**
     * @var array
     */
    private $logs;

    public function __construct(?ProductTranslation $translation, array $logs)
    {
        $this->translation = $translation;
        $this->logs = $logs;
    }

    /**
     * @return ProductTranslation|null
     */
    public function getTranslation(): ?ProductTranslation
    {
        return $this->translation;
    }

    /**
     * @return array
     */
    public function getLogs(): array
    {
        return $this->logs;
    }
}