<?php
/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */

namespace EzSystems\MarkdownFieldTypeBundle\Tests\TextParser;

use cebe\markdown\Markdown;
use cebe\markdown\Parser as Engine;
use EzSystems\MarkdownFieldTypeBundle\TextParser\MarkdownParser;

class MarkdownParserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var MarkdownParser
     */
    protected $parser;

    /**
     * @var Engine
     */
    protected $engine;

    public function setUp()
    {
        $this->engine = new Markdown();
        $this->parser = new MarkdownParser($this->engine);
    }

    public function testParseMarkdownToHtml()
    {
        $text = '**markdown syntax test**';

        $parsedText = $this->parser->parse($text);

        $this->assertEquals("<p><strong>markdown syntax test</strong></p>\n", $parsedText);
    }
}
