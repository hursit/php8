<?php
namespace App\Model;
use Stringable;

#[\Symfony\Component\DependencyInjection\Attribute\Autoconfigure]
class Item implements Stringable
{
    public function __toString ()
    {
        return 'STRINGABLE DENEME';
    }
}