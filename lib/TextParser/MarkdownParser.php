<?php
/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */

namespace EzSystems\MarkdownFieldType\TextParser;

use cebe\markdown\Parser as MarkdownEngine;

/**
 * Parsers Markdown formatted text to HTML
 */
class MarkdownParser implements Parser
{
    /** @var MarkdownEngine Engine to use for parsing */
    protected $engine;

    public function __construct(MarkdownEngine $engine)
    {
        $this->engine = $engine;
    }

    public function parse($text)
    {
        return $this->engine->parse($text);
    }
}