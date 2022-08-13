<?php

declare(strict_types=1);

namespace Inspirum\XML\Integration\Symfony\Tests;

use Inspirum\XML\Integration\Symfony\XMLBundle;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpKernel\Kernel;

final class XMLBundleTest extends TestCase
{
    public function testBundle(): void
    {
        $kernel = new class ('dev', true) extends Kernel {
            /**
             * @return iterable<\Symfony\Component\HttpKernel\Bundle\BundleInterface>
             */
            public function registerBundles(): iterable
            {
                return [new XMLBundle()];
            }

            public function registerContainerConfiguration(LoaderInterface $loader): void
            {
                $loader->load(__DIR__ . '/config/config.yaml');
            }
        };

        try {
            $kernel->boot();

            /** @var \Inspirum\XML\Integration\Symfony\Tests\Service $service */
            $service = $kernel->getContainer()->get(Service::class);

            self::assertInstanceOf(Service::class, $service);
        } finally {
            (new Filesystem())->remove($kernel->getCacheDir());
        }
    }
}
