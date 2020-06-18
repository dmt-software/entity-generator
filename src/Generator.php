<?php

namespace DMT\Entity\Generator;

/**
 * Class Generator
 *
 * @package DMT\Entity\Generator
 */
class Generator
{
    /** @var ParserInterface $parser */
    protected $parser;
    /** @var string $path */
    protected $path;

    /**
     * Generator constructor.
     *
     * @param ParserInterface $parser
     * @param string|null $path
     */
    public function __construct(ParserInterface $parser, string $path = null)
    {
        $this->parser = $parser;
        $this->path = rtrim($path ?? sys_get_temp_dir(), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
    }

    /**
     * Generate entities.
     *
     * @param Binding[] $bindings Bindings to process.
     * @param bool $dryRun
     */
    public function generate(array $bindings, bool $dryRun = false)
    {
        foreach ($bindings as $binding) {
            $output = $this->parser->parse($binding);
            if (!$dryRun) {
                file_put_contents($this->path . $output->filename(), (string) $output);
            } else {
                print (string) $output;
            }
        }
    }
}
