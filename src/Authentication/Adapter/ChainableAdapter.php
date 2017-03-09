<?php

namespace Zend\UserModule\Authentication\Adapter;

interface ChainableAdapter
{
    public function authenticate(\Zend\EventManager\Event $e);
}
