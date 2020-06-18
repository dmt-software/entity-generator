<?php

namespace DMT\Entity\Generator;

/**
 * Interface OutputInterface
 *
 * @package DMT\Entity\Generator
 */
interface OutputInterface
{
    /**
     * Retunr the output as string.
     *
     * @return string
     */
    public function __toString(): string;

    /**
     * Get the file name.
     *
     * @return string
     */
    public function filename(): string;
}