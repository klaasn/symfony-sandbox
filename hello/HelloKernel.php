<?php

require_once __DIR__.'/../src/autoload.php';

use Symfony\Framework\Kernel;
use Symfony\Components\DependencyInjection\Loader\YamlFileLoader as ContainerLoader;
use Symfony\Components\Routing\Loader\YamlFileLoader as RoutingLoader;

use Symfony\Framework\KernelBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\ZendBundle\ZendBundle;
use Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle;
use Symfony\Bundle\DoctrineBundle\DoctrineBundle;
use Symfony\Bundle\DoctrineMigrationsBundle\DoctrineMigrationsBundle;
use Symfony\Bundle\DoctrineMongoDBBundle\DoctrineMongoDBBundle;
use Symfony\Bundle\PropelBundle\PropelBundle;
use Symfony\Bundke\TwigBundle\TwigBundle;
use Application\HelloBundle\HelloBundle;

class HelloKernel extends Kernel
{
    public function registerRootDir()
    {
        return __DIR__;
    }

    public function registerBundles()
    {
        $bundles = array(
            new KernelBundle(),
            new FrameworkBundle(),
            new ZendBundle(),
            new SwiftmailerBundle(),
            new DoctrineBundle(),
            //new DoctrineMigrationsBundle(),
            //new DoctrineMongoDBBundle(),
            //new PropelBundle(),
            //new TwigBundle(),
            new HelloBundle(),
        );

        if ($this->isDebug()) {
        }

        return $bundles;
    }

    public function registerBundleDirs()
    {
        return array(
            'Application'        => __DIR__.'/../src/Application',
            'Bundle'             => __DIR__.'/../src/Bundle',
            'Symfony\\Bundle'    => __DIR__.'/../src/vendor/symfony/src/Symfony/Bundle',
        );
    }

    public function registerContainerConfiguration()
    {
        $loader = new ContainerLoader($this->getBundleDirs());

        return $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }

    public function registerRoutes()
    {
        $loader = new RoutingLoader($this->getBundleDirs());

        return $loader->load(__DIR__.'/config/routing.yml');
    }
}
