<?php

namespace App\Service\AttributeTest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD|Attribute::TARGET_CLASS_CONSTANT|Attribute::IS_REPEATABLE)]
class MethodAttribute
{
    public function __construct (private string $name)
    {
    }

    /**
     * @return string
     */
    public function getName (): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return MethodAttribute
     */
    public function setName (string $name): MethodAttribute
    {
        $this->name = $name;
        return $this;
    }
}