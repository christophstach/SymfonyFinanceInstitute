<?php
/**
 * Created by PhpStorm.
 * User: Christoph Stach
 * Date: 13.10.2016
 * Time: 23:02
 */

namespace AppBundle\Entity;

use JMS\Serializer\Annotation\Type;

class Company
{

    /**
     * @Type("string")
     * @var string
     */
    private $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }
}