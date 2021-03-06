<?php
/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */

namespace EzSystems\MarkdownFieldTypeBundle\Templating\Twig\Extension;

use EzSystems\MarkdownFieldType\TextParser\MarkdownParser;

/**
 * Adds Markdown filter to Twig which transforms supplied markdown syntax to HTML
 */
class MarkdownExtension extends \Twig_Extension
{
    /**
     * @var MarkdownParser $parser Parser used to transform markdown text into HTML
     */
    protected $parser;

    /**
     * MarkdownExtension constructor
     *
     * @param MarkdownParser $parser
     */
    public function __construct(MarkdownParser $parser)
    {
        $this->parser = $parser;
    }

    /**
     * {@inheritDoc}
     */
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('markdown_to_html', array($this, 'parseMarkdownToHtml')),
        );
    }

    /**
     * @param string $markdown Text using markdown syntax to be parsed into HTML
     * @return string
     */
    public function parseMarkdownToHtml($markdown)
    {
        return $this->parser->parse($markdown);
    }

    public function getName()
    {
        return 'ezpublish_markdown';
    }
}