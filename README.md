# ezplatform-markdown-fieldtype

Adds new fieldtype to eZ Platform, which allows to write using Markdown syntax. It is parsed to HTML using [cebe/markdown](https://github.com/cebe/markdown) library.

## Installation

It isn't available in composer repository yet. Installation steps for now:

1. Add in `composer.json`:
```
"repositories": [
    { "type": "vcs", "url": "https://github.com/webhdx/ezplatform-markdown-fieldtype" }
]
```

2. Run: `composer require webhdx/ezplatform-markdown-fieldtype:dev-master`
3. Register bundle in `app/AppKernel.php`:  
```
$bundles = array(
...
new EzSystems\MarkdownFieldTypeBundle\EzSystemsMarkdownFieldTypeBundle(),
...
);
```