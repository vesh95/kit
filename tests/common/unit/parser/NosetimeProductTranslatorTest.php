<?php namespace tests\common\parser;

use common\components\translator\NoseTimeProductTranslator;
use common\components\translator\ProductTranslationRequest;
use common\models\TranslatorParser;

class NosetimeProductTranslatorTest extends \Codeception\Test\Unit
{
    /**
     * @var \tests\common\UnitTester
     */
    protected $tester;

    /**
     * @var NoseTimeProductTranslator
     */
    private $parser;


    protected function _before()
    {
        $this->parser = new NoseTimeProductTranslator();
    }

    protected function _after()
    {
    }

    public function testSomeFeature()
    {
        $request = new ProductTranslationRequest('asdfasdf', 'asdfasdf', 1);

        $result = $this->parser->parse($request);

        // @todo делать проверки ткт
    }

    public function testAnotherFeature()
    {
        $cases = [
            [
                'source_brand' => 'Amouage',
                'source_name' => ' Epic',
                'translated_brand' => '爱慕',
                'translated_name' => '史诗女士',
                'gender' => TranslatorParser::GENDER_FEMALE
            ],
            [
                'source_brand' => 'Amouage',
                'source_name' => ' Epic',
                'translated_brand' => '爱慕',
                'translated_name' => '史诗男士',
                'gender' => TranslatorParser::GENDER_MALE
            ],
            [
                'source_brand' => 'Amouage',
                'source_name' => ' Epic',
                'translated_brand' => '',
                'translated_name' => '',
                'gender' => TranslatorParser::GENDER_UNKNOWN
            ],
            [
                'source_brand' => 'Davidoff',
                'source_name' => 'Cool Water',
                'translated_brand' => '大卫杜夫',
                'translated_name' => '冷水男士',
                'gender' => TranslatorParser::GENDER_UNKNOWN
            ],
            [
                'source_brand' => 'Davidoff',
                'source_name' => 'Echo',
                'translated_brand' => '大卫杜夫',
                'translated_name' => '冷水男士',
                'gender' => TranslatorParser::GENDER_FEMALE
            ],
            [
                'source_brand' => 'Davidoff',
                'source_name' => 'Echo',
                'translated_brand' => '大卫杜夫',
                'translated_name' => '冷水男士',
                'gender' => TranslatorParser::GENDER_FEMALE
            ],
            [
                'source_brand' => 'Davidoff',
                'source_name' => 'Echo',
                'translated_brand' => '大卫杜夫',
                'translated_name' => '回音',
                'gender' => TranslatorParser::GENDER_MALE
            ],
            [
                'source_brand' => 'Davidoff',
                'source_name' => 'Echo',
                'translated_brand' => '大卫杜夫',
                'translated_name' => '回音',
                'gender' => TranslatorParser::GENDER_UNKNOWN
            ],
            [
                'source_brand' => 'Creed',
                'source_name' => 'Aventus',
                'translated_brand' => '信仰',
                'translated_name' => '成功',
                'gender' => TranslatorParser::GENDER_UNKNOWN
            ],
            [
                'source_brand' => 'Creed',
                'source_name' => 'Aventus',
                'translated_brand' => '信仰',
                'translated_name' => '成功',
                'gender' => TranslatorParser::GENDER_MALE
            ],
            [
                'source_brand' => 'Creed',
                'source_name' => 'Aventus',
                'translated_brand' => '信仰',
                'translated_name' => '成功女士',
                'gender' => TranslatorParser::GENDER_FEMALE
            ],
            [
                'source_brand' => 'Hermes',
                'source_name' => 'Terre d\'Hermes',
                'translated_brand' => '爱马仕',
                'translated_name' => '大地',
                'gender' => TranslatorParser::GENDER_UNKNOWN
            ],
            [
                'source_brand' => 'Hermes',
                'source_name' => 'Terre d\'Hermes',
                'translated_brand' => '爱马仕',
                'translated_name' => '大地',
                'gender' => TranslatorParser::GENDER_MALE
            ],
            [
                'source_brand' => 'Hermes',
                'source_name' => 'Terre d\'Hermes',
                'translated_brand' => '爱马仕',
                'translated_name' => '大地',
                'gender' => TranslatorParser::GENDER_FEMALE
            ],
            [
                'source_brand' => 'Davidoff',
                'source_name' => 'Adventure',
                'translated_brand' => '大卫杜夫',
                'translated_name' => '追风骑士',
                'gender' => TranslatorParser::GENDER_FEMALE
            ],
            [
                'source_brand' => 'Davidoff',
                'source_name' => 'Adventure',
                'translated_brand' => '大卫杜夫',
                'translated_name' => '追风骑士',
                'gender' => TranslatorParser::GENDER_MALE
            ],
            [
                'source_brand' => 'Davidoff',
                'source_name' => 'Adventure',
                'translated_brand' => '大卫杜夫',
                'translated_name' => '追风骑士',
                'gender' => TranslatorParser::GENDER_UNKNOWN
            ],
            [
                'source_brand' => 'Davidoff',
                'source_name' => 'Adventure Amazonia',
                'translated_brand' => '大卫杜夫',
                'translated_name' => '亚马逊探险',
                'gender' => TranslatorParser::GENDER_UNKNOWN
            ],
            [
                'source_brand' => 'Davidoff',
                'source_name' => 'Adventure Amazonia',
                'translated_brand' => '大卫杜夫',
                'translated_name' => '亚马逊探险',
                'gender' => TranslatorParser::GENDER_MALE
            ],
            [
                'source_brand' => 'Davidoff',
                'source_name' => 'Adventure Amazonia',
                'translated_brand' => '大卫杜夫',
                'translated_name' => '亚马逊探险',
                'gender' => TranslatorParser::GENDER_FEMALE
            ],
            [
                'source_brand' => 'Amouage',
                'source_name' => 'Gold',
                'translated_brand' => '爱慕',
                'translated_name' => '黄金女士',
                'gender' => TranslatorParser::GENDER_FEMALE
            ],
            [
                'source_brand' => 'Amouage',
                'source_name' => 'Gold',
                'translated_brand' => '爱慕',
                'translated_name' => '黄金男士',
                'gender' => TranslatorParser::GENDER_MALE
            ],
            [
                'source_brand' => 'Amouage',
                'source_name' => 'Gold',
                'translated_brand' => '',
                'translated_name' => '',
                'gender' => TranslatorParser::GENDER_UNKNOWN
            ],
            [
                'source_brand' => 'Burberry',
                'source_name' => 'Weekend',
                'translated_brand' => '博柏利',
                'translated_name' => '周末男士',
                'gender' => TranslatorParser::GENDER_MALE
            ],
            [
                'source_brand' => 'Burberry',
                'source_name' => 'Weekend',
                'translated_brand' => '博柏利',
                'translated_name' => '周末女士',
                'gender' => TranslatorParser::GENDER_FEMALE
            ],
            [
                'source_brand' => 'Burberry',
                'source_name' => 'Weekend',
                'translated_brand' => '',
                'translated_name' => '',
                'gender' => TranslatorParser::GENDER_UNKNOWN
            ],
            [
                'source_brand' => 'Arabian Oud',
                'source_name' => 'Arabian Knight',
                'translated_brand' => '',
                'translated_name' => '',
                'gender' => TranslatorParser::GENDER_UNKNOWN
            ],
            [
                'source_brand' => 'Atkinsons',
                'source_name' => 'Fashion Decree',
                'translated_brand' => '',
                'translated_name' => '',
                'gender' => TranslatorParser::GENDER_UNKNOWN
            ],
            [
                'source_brand' => 'Bond No 9',
                'source_name' => 'Nuits de Noho',
                'translated_brand' => '',
                'translated_name' => '',
                'gender' => TranslatorParser::GENDER_UNKNOWN
            ],
            [
                'source_brand' => 'Calvin Klein',
                'source_name' => 'ck2',
                'translated_brand' => '',
                'translated_name' => '',
                'gender' => TranslatorParser::GENDER_UNKNOWN
            ],
        ];
        $request = new ProductTranslationRequest('asdfasdf', 'asdfasdf', 1);

        $result = $this->parser->parse($request);

        // @todo делать проверки ткт
    }
}