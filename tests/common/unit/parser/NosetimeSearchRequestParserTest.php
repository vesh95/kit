<?php namespace tests\common\parser;

use common\components\translator\nosetime\SearchResultParser;
use common\components\translator\ProductTranslationRequest;
use common\models\TranslatorParser;

class NosetimearchRequestParserTest extends \Codeception\Test\Unit
{
    /**
     * @var \tests\common\UnitTester
     */
    protected $tester;

    /**
     * @var SearchResultParser
     */
    private $parser;


    protected function _before()
    {
        $this->parser = new SearchResultParser();
    }

    protected function _after()
    {
    }

    public function testSomeFeature()
    {
        $request = new ProductTranslationRequest(
            'Abercrombie & Fitch',
            '41 Cologne',
            TranslatorParser::GENDER_MALE
        );

        $this->tester->wantToTest('Верно разбирается строка с признаком пола');

        $result = $this->parser->parse($request,'A&F 41号古龙水 Abercrombie & Fitch 41 Cologne for Men, 2007');

        $this->assertNull($result->getBrand());
        $this->assertEquals('41号古龙水', $result->getName());
        $this->assertEquals(TranslatorParser::GENDER_MALE, $result->getGenderSign());

        $this->tester->wantToTest('Верно определяется отсутствуие признака пола');


        $result = $this->parser->parse($request, 'A&F 41号古龙水 Abercrombie & Fitch 41 Cologne, 2007');

        $this->assertNull($result->getBrand());
        $this->assertEquals('41号古龙水', $result->getName());
        $this->assertNull($result->getGenderSign());



    }

}