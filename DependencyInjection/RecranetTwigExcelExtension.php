<?php

namespace Recranet\TwigExcelBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\ConfigurableExtension;

/**
 * Class RecranetTwigExcelExtension
 *
 * @package Recranet\TwigExcelBundle\DependencyInjection
 */
class RecranetTwigExcelExtension extends ConfigurableExtension
{
    /**
     * {@inheritDoc}
     * @throws \Exception
     */
    protected function loadInternal(array $mergedConfig, ContainerBuilder $container)
    {
        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.xml');

        $container->setParameter('recranet_twig_excel.pre_calculate_formulas', $mergedConfig['pre_calculate_formulas']);
        $container->setParameter('recranet_twig_excel.disk_caching_directory', $mergedConfig['disk_caching_directory']);
    }
}
