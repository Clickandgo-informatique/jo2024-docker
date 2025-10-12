<?php

namespace App\Service;

use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\TableOfContents\TableOfContentsExtension;
use League\CommonMark\Extension\HeadingPermalink\HeadingPermalinkExtension;
use League\CommonMark\MarkdownConverter;

class MarkdownParser
{
    private MarkdownConverter $converter;

    public function __construct()
    {
        $config = [
            'heading_permalink' => [
                'html_class' => 'heading-anchor',
                'id_prefix' => '',
                'apply_id_to_heading' => true,
                'insert' => 'after', // ajoute le lien # après le titre
                'title' => 'Lien direct vers ce titre',
                'symbol' => '#',
            ],
            'table_of_contents' => [
                'html_class' => 'toc',
                'position' => 'placeholder', // [TOC]
                'style' => 'bullet',
                'min_heading_level' => 2,
                'max_heading_level' => 4,
            ],
        ];

        $environment = new Environment($config);

        // Extensions principales
        $environment->addExtension(new CommonMarkCoreExtension());
        $environment->addExtension(new HeadingPermalinkExtension());
        $environment->addExtension(new TableOfContentsExtension());

        $this->converter = new MarkdownConverter($environment);
    }

    public function toHtml(string $markdown): string
    {
        return $this->converter->convert($markdown)->getContent();
    }
}
