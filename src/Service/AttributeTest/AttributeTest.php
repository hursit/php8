<?php
namespace App\Service\AttributeTest;

use App\Service\AttributeTest\Attributes\ClassAttribute;
use App\Service\AttributeTest\Attributes\MethodAttribute;

class AttributeTest
{
    #[MethodAttribute(name:"Gildas")]
    private const GILDAS = 15;

    #[MethodAttribute(name: "Adem")]
    #[MethodAttribute(name: "Erkan")]
    public function exampleMethod ()
    {

    }

}