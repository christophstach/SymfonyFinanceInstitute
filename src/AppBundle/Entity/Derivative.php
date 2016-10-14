<?php
/**
 * Created by PhpStorm.
 * User: Christoph Stach
 * Date: 14.10.2016
 * Time: 08:36
 */

namespace AppBundle\Entity;

use JMS\Serializer\Annotation\Type;


class Derivative
{
    /**
     * @Type("AppBundle\Entity\Company")
     * @var Company
     */
    private $issuer;

    /**
     * @Type("AppBundle\Entity\Company")
     * @var Company
     */
    private $underlying;

    /**
     * @return Company
     */
    public function getIssuer(): Company
    {
        return $this->issuer;
    }

    /**
     * @param Company $issuer
     */
    public function setIssuer(Company $issuer)
    {
        $this->issuer = $issuer;
    }

    /**
     * @return Company
     */
    public function getUnderlying(): Company
    {
        return $this->underlying;
    }

    /**
     * @param Company $underlying
     */
    public function setUnderlying(Company $underlying)
    {
        $this->underlying = $underlying;
    }
}