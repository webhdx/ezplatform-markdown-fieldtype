<?php
/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */

namespace EzSystems\MarkdownFieldTypeBundle\FieldType\Markdown;

use eZ\Publish\Core\FieldType\TextBlock\Value as TextBlockValue;

/**
 * Value for Markdown field type.
 *
 * NOTE: Inherits TextBlockValue as there are no differences in data representation (plain text).
 */
class Value extends TextBlockValue
{
}
