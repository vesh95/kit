<?php

namespace common\components\translator;


/**
 * Interface ProductTranlatorInterface
 *
 * Осуществляет перевод названия товара указанного пола и бренда
 *
 * @package common\components\translator
 */
interface ProductTranslatorInterface
{
    public function parse(ProductTranslationRequest $request): ProductTranslationResult;
}