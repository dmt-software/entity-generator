<?php

namespace DMT\Entity\Generator\Parser;

use DMT\Entity\Generator\Binding;
use DMT\Entity\Generator\Output\ClassOutput;
use DMT\Entity\Generator\OutputInterface;
use DMT\Entity\Generator\ParserInterface;

/**
 * Class ClassParser
 *
 * @package DMT\Entity\Generator
 */
class ClassParser implements ParserInterface
{
    public function parse(Binding $binding): OutputInterface
    {
        return new ClassOutput($binding);
    }
}