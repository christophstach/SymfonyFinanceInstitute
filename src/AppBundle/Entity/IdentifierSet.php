<?php
/**
 * Created by PhpStorm.
 * User: Christoph Stach
 * Date: 14.10.2016
 * Time: 10:16
 */

namespace AppBundle\Entity;

use JMS\Serializer\Annotation\Type;

class IdentifierSet
{
    /**
     * @Type("string")
     * @var string
     */
    private $isin;

    /**
     * @Type("string")
     * @var string
     */
    private $wkn;

    /**
     * @Type("string")
     * @var string
     */
    private $vwd;

    /**
     * @return string
     */
    public function getIsin(): string
    {
        return $this->isin;
    }

    /**
     * @param string $isin
     */
    public function setIsin(string $isin)
    {
        $this->isin = $isin;
    }

    /**
     * @return string
     */
    public function getWkn(): string
    {
        return $this->wkn;
    }

    /**
     * @param string $wkn
     */
    public function setWkn(string $wkn)
    {
        $this->wkn = $wkn;
    }

    /**
     * @return string
     */
    public function getVwd(): string
    {
        return $this->vwd;
    }

    /**
     * @param string $vwd
     */
    public function setVwd(string $vwd)
    {
        $this->vwd = $vwd;
    }
}