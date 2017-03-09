<?php
namespace Zend\UserModule\Db\Adapter;

interface MasterSlaveAdapterInterface
{
    /**
     * @return \Zend\Db\Adapter\Adapter
     */
    public function getSlaveAdapter();
}
