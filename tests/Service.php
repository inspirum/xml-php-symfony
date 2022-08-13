<?php

declare(strict_types=1);

namespace Inspirum\Xml\Integration\Symfony\Tests;

use Inspirum\XML\Builder\DOMDocumentFactory;
use Inspirum\XML\Builder\DefaultDOMDocumentFactory;
use Inspirum\XML\Builder\DefaultDocumentFactory;
use Inspirum\XML\Builder\Document;
use Inspirum\XML\Builder\DocumentFactory;
use Inspirum\XML\Reader\DefaultReaderFactory;
use Inspirum\XML\Reader\DefaultXMLReaderFactory;
use Inspirum\XML\Reader\ReaderFactory;
use Inspirum\XML\Reader\XMLReaderFactory;

final class Service
{
    public function __construct(
        public readonly DOMDocumentFactory $DOMDocumentFactory,
        public readonly DefaultDOMDocumentFactory $defaultDOMDocumentFactory,
        public readonly DocumentFactory $documentFactory,
        public readonly DefaultDocumentFactory $defaultDocumentFactory,
        public readonly Document $document,
        public readonly XMLReaderFactory $XMLReaderFactory,
        public readonly DefaultXMLReaderFactory $defaultXMLReaderFactory,
        public readonly ReaderFactory $readerFactory,
        public readonly DefaultReaderFactory $defaultReaderFactory,
    ) {
    }
}
