<?php

namespace DMT\Test\Entity\Generator\Output;

use DMT\Entity\Generator\Binding;
use DMT\Entity\Generator\Output\ClassOutput;
use PHPUnit\Framework\TestCase;

class ClassOutputTest extends TestCase
{
    public function test()
    {
        $binding = new Binding();
        $binding->name = null;
        $binding->type = 'Foo\\Bar\\Baz';
        $binding->description = 'Description of Baz';
        $binding->properties = [new Binding(), new Binding(), new Binding()];
        $binding->properties[0]->name = 'id';
        $binding->properties[0]->type = 'Foo\\Bar\\Elem\\Id';
        $binding->properties[0]->description = 'The id for this element';
        $binding->properties[1]->name = 'created';
        $binding->properties[1]->type = '\\DateTime';
        $binding->properties[2]->name = 'comments';
        $binding->properties[2]->type = 'string';
        $binding->properties[2]->multiple = true;

        $output = new ClassOutput($binding);
        $this->assertSame('Foo/Bar/Baz.php', $output->filename());
        $this->assertStringContainsString('namespace Foo\\Bar;', (string) $output);
        $this->assertStringContainsString('class Baz', (string) $output);
        $this->assertStringContainsString('@var Elem\\Id $id', (string) $output);
        $this->assertStringContainsString('The id for this element', (string) $output);
        $this->assertStringContainsString('@var \\DateTime $created', (string) $output);
        $this->assertStringContainsString('public $created', (string) $output);
        $this->assertStringContainsString('@var string[] $comments', (string) $output);
    }
}
