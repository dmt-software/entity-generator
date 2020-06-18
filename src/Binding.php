<?php

namespace DMT\Entity\Generator;

/**
 * Class Binding
 *
 * @package DMT\Entity\Generator
 */
class Binding
{
    /**
     * The property name.
     * @var string $name
     */
    public $name;
    /**
     * The property type or class name.
     * @var string $type
     */
    public $type = 'string';

    /**
     * The doc comment for property or class.
     * @var string $description
     */
    public $description;

    /**
     * Indication of an array of types.
     * @var bool $multiple
     */
    public $multiple = false;

    /**
     * The class properties (null in case of a property)
     * @var null|Binding[]
     */
    public $properties;

    /**
     * A config option for the (de)serialize input/output name.
     * @var string $entry
     */
    public $entry;

    /**
     * Config option to check if the property is required.
     * @var bool $required
     */
    public $required = false;

    /**
     * Config option for XML prefix.
     * @var string $prefix
     */
    public $prefix;

    /**
     * Config option for XML namespace.
     * @var string $namespace
     */
    public $namespace;
}