<?php

namespace common\components\translator\nosetime;

use common\components\translator\ProductTranslationRequest;

/**
 * Interface SearchResultParserInterface
 * Осуществляет разбор строки результата поиска. Если строка не соответствует запросу - возвратит null
 * @package common\components\translator\nosetime
 */
interface SearchResultParserInterface
{
    public function parse(ProductTranslationRequest$request, string $value): ?ParsedString;
}