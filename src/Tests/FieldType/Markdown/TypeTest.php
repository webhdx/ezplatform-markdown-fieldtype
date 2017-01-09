<?php
/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */

namespace EzSystems\MarkdownFieldTypeBundle\Tests\FieldType\Markdown;

use EzSystems\MarkdownFieldTypeBundle\FieldType\Markdown\Type;
use EzSystems\MarkdownFieldTypeBundle\FieldType\Markdown\Value;

class TypeTest extends \PHPUnit_Framework_TestCase
{
    /** @var Type */
    protected $type;

    protected function setUp()
    {
        $this->type = new Type();
        $this->type->fromHash('');
    }

    public function testGetFieldTypeIdentifier()
    {
        $this->assertEquals('ezmarkdown', $this->type->getFieldTypeIdentifier());
    }

    public function testGetEmptyValue()
    {
        $this->assertEquals(new Value(), $this->type->getEmptyValue());
    }

    public function testIsEmptyValue()
    {
        $referenceValue = new Value('');
        $this->assertTrue($this->type->isEmptyValue($referenceValue));
    }

    public function testFromHash()
    {
        $this->assertEquals(new Value(), $this->type->fromHash(null));
        $this->assertEquals(new Value('test'), $this->type->fromHash('test'));
    }

    public function testToHash()
    {
        $this->assertEquals(null, $this->type->toHash(new Value()));
        $this->assertEquals('test', $this->type->toHash(new Value('test')));
    }
}