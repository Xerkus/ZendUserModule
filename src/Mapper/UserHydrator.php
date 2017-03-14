<?php

namespace Zend\UserModule\Mapper;

use Zend\Hydrator\ClassMethods;
use Zend\UserModule\Entity\UserInterface as UserEntityInterface;

class UserHydrator extends ClassMethods
{

    /**
     * Extract values from an object
     *
     * @param  object $object
     * @return array
     * @throws Exception\InvalidArgumentException
     */
    public function extract($object)
    {
        if (!$object instanceof UserEntityInterface) {
            throw new Exception\InvalidArgumentException('$object must be an instance of Zend\UserModule\Entity\UserInterface');
        }
        /* @var $object UserInterface */
        $data = parent::extract($object);
        if ($data['id'] !== null) {
            $data = $this->mapField('id', 'user_id', $data);
        } else {
            unset($data['id']);
        }
        return $data;
    }

    /**
     * Hydrate $object with the provided $data.
     *
     * @param  array $data
     * @param  object $object
     * @return UserInterface
     * @throws Exception\InvalidArgumentException
     */
    public function hydrate(array $data, $object)
    {
        if (!$object instanceof UserEntityInterface) {
            throw new Exception\InvalidArgumentException('$object must be an instance of Zend\UserModule\Entity\UserInterface');
        }
        $data = $this->mapField('user_id', 'id', $data);
        return parent::hydrate($data, $object);
    }

    protected function mapField($keyFrom, $keyTo, array $array)
    {
        if (in_array($keyFrom, $array) ) {
            $array[$keyTo] = $array[$keyFrom];
            unset($array[$keyFrom]);
        }
        return $array;
    }
}
