#!/usr/bin/php
<?php

use DMT\Entity\Generator\Binding;
use DMT\Entity\Generator\Generator;
use DMT\Entity\Generator\Parser\ClassParser;
use DMT\Entity\Generator\Parser\ConfigParser;

include __DIR__ . '/../vendor/autoload.php';

$options  = getopt('f:p:', ['', 'file::', 'path::', 'dryRun', 'help']);
$filename = $options['file'] ?? $options['f'] ?? null;
$path     = $options['path'] ?? $options['p'] ?? null;
$dryRun   = array_key_exists('dryRun', $options);

if (array_key_exists('help', $options)) {
    print PHP_EOL . 'usage: generate.php [OPTION...]';
    print PHP_EOL;
    print PHP_EOL . ' Configuration options:';
    print PHP_EOL . '  -f, --file=FILE   The file containing the bindings';
    print PHP_EOL . '  -p, --path=PATH   The output directory for the generated code, default: ' . sys_get_temp_dir();
    print PHP_EOL . '  --dryRun          When set the generated code is displayed and not saved';
    print PHP_EOL . '  --help            Show this options';
    exit(PHP_EOL . PHP_EOL);
}

if (!$filename || !is_file($filename)) {
    exit(PHP_EOL . 'no binding file found' . PHP_EOL);
}

$bindings = include $filename;
if (!is_array($bindings) || !current($bindings) instanceof Binding) {
    exit('no bindings found' . PHP_EOL);
}

$classGenerator = new Generator(new ClassParser(), $path);
$classGenerator->generate($bindings, $dryRun);

$configGenerator = new Generator(new ConfigParser(), $path);
$configGenerator->generate($bindings, $dryRun);

