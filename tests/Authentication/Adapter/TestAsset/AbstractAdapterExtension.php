<?php

namespace Zend\UserModuleTest\Authentication\Adapter\TestAsset;

use Zend\UserModule\Authentication\Adapter\AbstractAdapter;
use Zend\UserModule\Authentication\Adapter\AdapterChainEvent;

class AbstractAdapterExtension extends AbstractAdapter
{
    public function authenticate(\Zend\EventManager\Event $e)
    {
    }
}
