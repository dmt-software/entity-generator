<?php

namespace DMT\Test\Entity\Generator\Output;

use DMT\Entity\Generator\Binding;
use DMT\Entity\Generator\Output\ConfigOutput;
use PHPUnit\Framework\TestCase;

class ConfigOutputTest extends TestCase
{
    public function test()
    {
        $binding = new Binding();
        $binding->name = null;
        $binding->type = 'Foo\\Bar\\Baz';
        $binding->element = 'element';
        $binding->namespace =  'urn.something.else';
        $binding->entry = 'Bazz';
        $binding->description = 'Description of Baz';
        $binding->properties = [new Binding(), new Binding(), new Binding()];
        $binding->properties[0]->name = 'id';
        $binding->properties[0]->type = 'Foo\\Bar\\Elem\\Id';
        $binding->properties[0]->description = 'The id for this element';
        $binding->properties[1]->name = 'comments';
        $binding->properties[1]->type = 'string';
        $binding->properties[1]->multiple = true;
        $binding->properties[1]->element = 'element';
        $binding->properties[1]->namespace = 'urn.something.else';
        $binding->properties[2]->name = 'created';
        $binding->properties[2]->type = '\\DateTime';
        $binding->properties[2]->entry = 'TS';

        $output = new ConfigOutput($binding);
        $this->assertSame('Foo/Bar/Baz.yml', $output->filename());
        $this->assertStringContainsString('Foo\\Bar\\Baz:', (string) $output);
        $this->assertStringContainsString('  xml_root: Bazz', (string) $output);
        $this->assertStringContainsString('    id:', (string) $output);
        $this->assertStringContainsString('      type: Foo\\Bar\\Elem\\Id', (string) $output);
        $this->assertStringContainsString('      xml_list:', (string) $output);
        $this->assertStringContainsString('        inline: true', (string) $output);
        $this->assertStringContainsString('        namespace: urn.something.else', (string) $output);
        $this->assertStringContainsString('    created:', (string) $output);
        $this->assertStringContainsString('      serialized_name: TS', (string) $output);
    }
}
