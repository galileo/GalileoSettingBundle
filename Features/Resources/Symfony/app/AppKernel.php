<?php

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel;

class AppKernel extends Kernel
{
    use MicroKernelTrait;

    /**
     * @return array
     */
    public function registerBundles()
    {
        return [
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
//            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new Galileo\SettingBundle\GalileoSettingBundle(),
        ];
    }

    /**
     * @return string
     */
    public function getCacheDir()
    {
        return sys_get_temp_dir().'/cache'.$this->environment;
    }

    /**
     * @return string
     */
    public function getLogDir()
    {
        return sys_get_temp_dir().'/logs';
    }

    /**
     * @param ContainerBuilder $c
     * @param LoaderInterface $loader
     */
    protected function configureContainer(ContainerBuilder $c, LoaderInterface $loader)
    {
        $c->loadFromExtension(
            'framework',
            [
                'secret' => 'my$ecret',
                'test' => null,
                'templating' => ['engines' => ['php']],
                'profiler' => [
                    'collect' => false,
                ],
            ]
        );
        $c->loadFromExtension(
            'doctrine',
            [
                'orm' => [
                    'auto_generate_proxy_classes' => "%kernel.debug%",
                    'naming_strategy' => 'doctrine.orm.naming_strategy.underscore',
                    'auto_mapping' => true,
//                    'entity_managers' => [
//                        'defualt' => ['auto_mapping' => true],
//                    ],
                ],
                'dbal' => [
                    'driver' => 'pdo_mysql',
                    'host' => 'localhost',
                    'port' => '3306',
                    'dbname' => 'bundle_test',
                    'user' => 'tests',
                    'password' => 'secret',
                    'charset' => 'UTF8',
                ],
            ]
        );
    }

    /**
     * Add or import routes into your application.
     *
     *     $routes->import('config/routing.yml');
     *     $routes->add('/admin', 'AppBundle:Admin:dashboard', 'admin_dashboard');
     *
     * @param \Symfony\Component\Routing\RouteCollectionBuilder $routes
     */
    protected function configureRoutes(\Symfony\Component\Routing\RouteCollectionBuilder $routes)
    {
        // TODO: Implement configureRoutes() method.
    }
}