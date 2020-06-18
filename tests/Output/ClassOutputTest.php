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
        $binding->properties = [new Binding()];
        $binding->properties[0]->name = 'id';
        $binding->properties[0]->type = 'Foo\\Bar\\Elem\\Id';
        $binding->properties[0]->multiple = true;
        $binding->properties[0]->description = 'The id for this element';

        $output = new ClassOutput($binding);
        $this->assertSame('Foo/Bar/Baz.php', $output->filename());
        $this->assertStringContainsString('namespace Foo\\Bar;', (string) $output);
        $this->assertStringContainsString('class Baz', (string) $output);
        $this->assertStringContainsString('@var Elem\\Id[] $id', (string) $output);
        $this->assertStringContainsString('The id for this element', (string) $output);

    }
}
