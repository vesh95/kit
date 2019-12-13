<?php

namespace common\components;

use yii\base\Widget;

class JS extends Widget
{
    /**
     * @var string the ID of this block.
     */
    public $id;

    public $position;

    /**
     * Starts recording a block.
     */
    public function init()
    {
        ob_start();
        ob_implicit_flush(false);
    }

    /**
     * Ends recording a code block.
     * This method stops output buffering and saves the result to js[].
     */
    public function run()
    {
        $code = ob_get_clean();
        $code = preg_replace('/<\/?script[^>]*>/', '', $code);
        $this->view->registerJs($code);
    }
}
