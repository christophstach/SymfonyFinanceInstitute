<?php
/**
 * Created by PhpStorm.
 * User: Christoph Stach
 * Date: 14.10.2016
 * Time: 10:13
 */

namespace AppBundle\Entity;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

class FigureSet
{
    /**
     * @SerializedName("sideYield")
     * @Type("float")
     * @var float
     */
    private $sideYield;

    /**
     * @SerializedName("sideYieldPa")
     * @Type("float")
     * @var float
     */
    private $sideYieldPa;

    /**
     * @return float
     */
    public function getSideYield(): float
    {
        return $this->sideYield;
    }

    /**
     * @param float $sideYield
     */
    public function setSideYield(float $sideYield)
    {
        $this->sideYield = $sideYield;
    }

    /**
     * @return float
     */
    public function getSideYieldPa(): float
    {
        return $this->sideYieldPa;
    }

    /**
     * @param float $sideYieldPa
     */
    public function setSideYieldPa(float $sideYieldPa)
    {
        $this->sideYieldPa = $sideYieldPa;
    }
}