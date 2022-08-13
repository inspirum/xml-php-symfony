<?php

declare(strict_types=1);

namespace Inspirum\Xml\Integration\Symfony\Tests;

use Inspirum\Xml\Integration\Symfony\XmlBundle;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpKernel\Kernel;

final class XmlBundleTest extends TestCase
{
    public function testBundle(): void
    {
        $kernel = new class ('dev', true) extends Kernel {
            /**
             * @return iterable<\Symfony\Component\HttpKernel\Bundle\BundleInterface>
             */
            public function registerBundles(): iterable
            {
                return [new XmlBundle()];
            }

            public function registerContainerConfiguration(LoaderInterface $loader): void
            {
                $loader->load(__DIR__ . '/config/config.yaml');
            }
        };

        try {
            $kernel->boot();

            /** @var \Inspirum\Xml\Integration\Symfony\Tests\Service $service */
            $service = $kernel->getContainer()->get(Service::class);

            self::assertInstanceOf(Service::class, $service);
        } finally {
            (new Filesystem())->remove($kernel->getCacheDir());
        }
    }
}
