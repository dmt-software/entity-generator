<?php

namespace DMT\Entity\Generator\Output;

use DMT\Entity\Generator\Binding;
use DMT\Entity\Generator\OutputInterface;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

/**
 * Class ConfigOutput
 *
 * @package DMT\Entity\Generator
 */
class ConfigOutput implements OutputInterface
{
    const TEMPLATE = 'config_jms.twig';

    /** @var Binding */
    protected $binding;

    /** @var Environment */
    private $env;

    /**
     * ClassOutput constructor.
     *
     * @param Binding $binding
     */
    public function __construct(Binding $binding)
    {
        $this->binding = $binding;
        $this->env = new Environment(new FilesystemLoader([__DIR__ . '/../../templates/']));
    }

    /** {@inheritDoc} */
    public function __toString(): string
    {
        return $this->env->render(static::TEMPLATE, ['binding' => $this->binding]);
    }

    /** {@inheritDoc} */
    public function filename(): string
    {
        return str_replace('\\', DIRECTORY_SEPARATOR, $this->binding->type) . '.yml';
    }
}