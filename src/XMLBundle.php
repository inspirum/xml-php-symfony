<?php

declare(strict_types=1);

namespace Inspirum\XML\Integration\Symfony;

use Inspirum\XML\Builder\DOMDocumentFactory;
use Inspirum\XML\Builder\DefaultDOMDocumentFactory;
use Inspirum\XML\Builder\DefaultDocumentFactory;
use Inspirum\XML\Builder\Document;
use Inspirum\XML\Builder\DocumentFactory;
use Inspirum\XML\Reader\DefaultReaderFactory;
use Inspirum\XML\Reader\DefaultXMLReaderFactory;
use Inspirum\XML\Reader\ReaderFactory;
use Inspirum\XML\Reader\XMLReaderFactory;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\DependencyInjection\Loader\Configurator\ServicesConfigurator;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

final class XMLBundle extends AbstractBundle
{
    public const ALIAS = 'xml';

    protected string $extensionAlias = self::ALIAS;

    /**
     * @param array<string,mixed> $config
     */
    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        $services = $container->services();

        $this->registerBuilder($services);
        $this->registerReader($services);
    }

    private function registerBuilder(ServicesConfigurator $services): void
    {
        $services->set(DefaultDOMDocumentFactory::class);
        $services->alias(DOMDocumentFactory::class, DefaultDOMDocumentFactory::class);

        $services->set(DefaultDocumentFactory::class)->args([new Reference(DOMDocumentFactory::class)]);
        $services->alias(DocumentFactory::class, DefaultDocumentFactory::class);

        $services->set(Document::class)->factory([new Reference(DocumentFactory::class), 'create']);
    }

    private function registerReader(ServicesConfigurator $services): void
    {
        $services->set(DefaultXMLReaderFactory::class);
        $services->alias(XMLReaderFactory::class, DefaultXMLReaderFactory::class);

        $services->set(DefaultReaderFactory::class)->args([
            new Reference(XMLReaderFactory::class),
            new Reference(DocumentFactory::class),
        ]);
        $services->alias(ReaderFactory::class, DefaultReaderFactory::class);
    }
}
