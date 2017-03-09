<?php

namespace Zend\UserModule\Options;

use Zend\UserModule\Options\RegistrationOptionsInterface;

interface UserServiceOptionsInterface extends
    RegistrationOptionsInterface,
    AuthenticationOptionsInterface
{
    /**
     * set user entity class name
     *
     * @param string $userEntityClass
     * @return ModuleOptions
     */
    public function setUserEntityClass($userEntityClass);

    /**
     * get user entity class name
     *
     * @return string
     */
    public function getUserEntityClass();
}
