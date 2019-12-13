<?php

namespace common\components\translator;

use common\components\translator\exceptions\TranslationIsEmptyException;
use common\components\translator\exceptions\TranslationIsNotChineseException;

class ChineseTranslation
{
    /**
     * @var string
     */
    private $value;

    /**
     * Translation constructor.
     * @param string $value
     * @throws TranslationIsEmptyException
     * @throws TranslationIsNotChineseException
     */
    public function __construct(string $value)
    {
        if (empty($value)) {
            throw new TranslationIsEmptyException();
        }
        if (!$this->checkIsChinese($value)) {
            throw new TranslationIsNotChineseException();
        }
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    private function checkIsChinese(string $value): bool
    {
        return true;
        //todo реализовать пока что тест будет фейлиться
    }

}