<?php
/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */

namespace EzSystems\MarkdownFieldType\TextParser;

/**
 * Parser interface.
 */
interface Parser
{
    /**
     * Parses supplied text
     *
     * @param string $text Text to be parsed
     * @return string
     */
    public function parse($text);
}