<?php
/**
 * Created by PhpStorm.
 * User: Clayton Daley
 * Date: 5/6/2015
 * Time: 6:43 PM
 */

namespace Zend\UserModule\Factory\Mapper;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\UserModule\Mapper;

class User implements FactoryInterface
{
    public function __invoke(ContainerInterface $serviceLocator, $requestedName, array $options = null)
    {
        $options = $serviceLocator->get('zenduser_module_options');
        $mapper = new Mapper\User();
        $mapper->setDbAdapter($serviceLocator->get('zenduser_zend_db_adapter'));
        $entityClass = $options->getUserEntityClass();
        $mapper->setEntityPrototype(new $entityClass);
        $mapper->setHydrator(new Mapper\UserHydrator());
        $mapper->setTableName($options->getTableName());
        return $mapper;
    }

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return $this->__invoke($serviceLocator, null);
    }
}
