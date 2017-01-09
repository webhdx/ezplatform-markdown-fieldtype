<?php
/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */

namespace EzSystems\MarkdownFieldTypeBundle\FieldType\Markdown;

use eZ\Publish\Core\FieldType\TextBlock\Type as TextBlockType;
use eZ\Publish\SPI\FieldType\Value as SPIValue;

/**
 * The Markdown field type.
 *
 * Represents a larger body of text, such as text areas. Uses own syntax which is later parsed to HTML.
 * NOTE: Inherits most logic from TextBlock field type.
 */
class Type extends TextBlockType
{
    /**
     * Returns the field type identifier for this field type.
     *
     * @return string
     */
    public function getFieldTypeIdentifier()
    {
        return 'ezmarkdown';
    }

    /**
     * Returns the fallback default value of field type when no such default
     * value is provided in the field definition in content types.
     *
     * @return Value
     */
    public function getEmptyValue()
    {
        return new Value();
    }

    /**
     * Returns if the given $value is considered empty by the field type.
     *
     * @param SPIValue $value
     *
     * @return bool
     */
    public function isEmptyValue(SPIValue $value)
    {
        return $value->text === null || trim($value->text) === '';
    }

    /**
     * Inspects given $inputValue and potentially converts it into a dedicated value object.
     *
     * @param string|\eZ\Publish\Core\FieldType\TextBlock\Value $inputValue
     *
     * @return \eZ\Publish\Core\FieldType\TextBlock\Value The potentially converted and structurally plausible value.
     */
    protected function createValueFromInput($inputValue)
    {
        if (is_string($inputValue)) {
            $inputValue = new Value($inputValue);
        }

        return $inputValue;
    }

    /**
     * Converts an $hash to the Value defined by the field type.
     *
     * @param mixed $hash
     *
     * @return Value $value
     */
    public function fromHash($hash)
    {
        if ($hash === null) {
            return $this->getEmptyValue();
        }

        return new Value($hash);
    }

    /**
     * Converts a $value to a hash.
     *
     * @param SPIValue $value
     *
     * @return mixed
     */
    public function toHash(SPIValue $value)
    {
        if ($this->isEmptyValue($value)) {
            return null;
        }

        return $value->text;
    }
}
