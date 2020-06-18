<?php

namespace DMT\Entity\Generator;

/**
 * Interface ParserInterface
 *
 * @package DMT\Entity\Generator
 */
interface ParserInterface
{
    /**
     * @param Binding $binding
     * @return OutputInterface
     */
    public function parse(Binding $binding): OutputInterface;
}