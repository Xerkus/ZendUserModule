<?php

namespace Zend\UserModule\Options;

use Zend\UserModule\Options\AuthenticationOptionsInterface;

interface UserControllerOptionsInterface
{
    /**
     * set use redirect param if present
     *
     * @param bool $useRedirectParameterIfPresent
     */
    public function setUseRedirectParameterIfPresent($useRedirectParameterIfPresent);

    /**
     * get use redirect param if present
     *
     * @return bool
     */
    public function getUseRedirectParameterIfPresent();
}
