<?php

namespace DMT\Entity\Generator;

/**
 * Interface ParserInterface
 *
 * @package DMT\Entity\Generator
 */
interface ParserInterface
{
    public function parse(Binding $binding): OutputInterface;
}