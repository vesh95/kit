<?php namespace tests\common\parser;

use common\components\translator\ChineseTranslation;
use common\components\translator\exceptions\TranslationIsNotChineseException;

class TranslationTest extends \Codeception\Test\Unit
{
    /**
     * @var \tests\common\UnitTester
     */
    protected $tester;

    public function testCreation()
    {
        $exception = null;
        try {
            $translation = new ChineseTranslation('abc');
        } catch (\Exception $exception) {
        }
        $this->assertInstanceOf(TranslationIsNotChineseException::class, $exception);
    }
}