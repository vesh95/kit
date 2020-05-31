<?php

namespace backend\models;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use common\models\Category;


/**
 * Import SCV file Category Form
 */
class CategoryCsvForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $csvFile;

    /**
     * @var Array
     */
    public $categories = array();

    public function rules()
    {
      return [
        [['csvFile'], 'file', 'skipOnEmpty' => false],
      ];
    }

    public function attributeLabels(): array
    {
        return [
            'csvFile' => Yii::t('backend', 'Файл импорта(*.csv)')
        ];
    }


    public function import()
    {
        if ($this->validate()) {
            $categoriesNames = file($this->csvFile->tempName);
            foreach ($categoriesNames as $name) {
                $category = new Category();
                $category->title = $name;
                if ($category->save()) {
                    array_push($this->categories, $category);
                }
            }

            return true;
        } else {
            return false;
        }
      }

}
