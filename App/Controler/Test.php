<?php


namespace app\controler;

use \model\test\Test as TestModel;

class Test
{
    function test($test){

        $testmodel = new TestModel();
        $testmodel->add();
        return json_encode($testmodel->list());
    }
}