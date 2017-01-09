<?php
/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */

namespace EzSystems\MarkdownFieldTypeBundle\Tests\Templating\Twig\Extension;

use cebe\markdown\Markdown;
use cebe\markdown\Parser as Engine;
use EzSystems\MarkdownFieldType\TextParser\MarkdownParser;
use EzSystems\MarkdownFieldTypeBundle\Templating\Twig\Extension\MarkdownExtension;

class MarkdownExtensionTest extends \PHPUnit_Framework_TestCase
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

        $extension = new MarkdownExtension($this->parser);
        $parsedText = $extension->parseMarkdownToHtml($text);

        $this->assertEquals("<p><strong>markdown syntax test</strong></p>\n", $parsedText);
    }
}
