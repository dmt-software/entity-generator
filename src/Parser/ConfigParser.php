<?php

namespace DMT\Entity\Generator\Parser;

use DMT\Entity\Generator\Binding;
use DMT\Entity\Generator\Output\ConfigOutput;
use DMT\Entity\Generator\OutputInterface;
use DMT\Entity\Generator\ParserInterface;

/**
 * Class ConfigParser
 *
 * @package DMT\Entity\Generator
 */
class ConfigParser implements ParserInterface
{
    /** {@inheritDoc} */
    public function parse(Binding $binding): OutputInterface
    {
        return new ConfigOutput($binding);
    }
}
