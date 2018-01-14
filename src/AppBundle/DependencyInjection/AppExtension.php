<?php
/**
 * Created by PhpStorm.
 * User: Marc
 * Date: 14/01/2018
 * Time: 23:48
 */

namespace AppBundle\DependencyInjection;


use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;


class AppExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        // TODO: Implement load() method.
        $loader=new XmlFileLoader($container,new FileLocator(__DIR__."/../Resources/config"));
        $loader->load('orm.xml');
    }
}