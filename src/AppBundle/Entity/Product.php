<?php
/**
 * Created by PhpStorm.
 * User: Christoph Stach
 * Date: 13.10.2016
 * Time: 20:54
 */

namespace AppBundle\Entity;

use JMS\Serializer\Annotation\Type;

class Product
{
    /**
     * @Type("string")
     * @var string
     */
    private $_id;

    /**
     * @Type("AppBundle\Entity\Derivative")
     * @var Derivative
     */
    private $derived;

    /**
     * @Type("AppBundle\Entity\IdentifierSet")
     * @var IdentifierSet
     */
    private $ids;

    /**
     * @Type("AppBundle\Entity\FigureSet")
     * @var FigureSet
     */
    private $figures;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->_id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id)
    {
        $this->_id = $id;
    }

    /**
     * @return Derivative
     */
    public function getDerived(): Derivative
    {
        return $this->derived;
    }

    /**
     * @param Derivative $derived
     */
    public function setDerived(Derivative $derived)
    {
        $this->derived = $derived;
    }

    /**
     * @return IdentifierSet
     */
    public function getIds(): IdentifierSet
    {
        return $this->ids;
    }

    /**
     * @param IdentifierSet $ids
     */
    public function setIds(IdentifierSet $ids)
    {
        $this->ids = $ids;
    }

    /**
     * @return FigureSet
     */
    public function getFigures(): FigureSet
    {
        return $this->figures;
    }

    /**
     * @param FigureSet $figures
     */
    public function setFigures(FigureSet $figures)
    {
        $this->figures = $figures;
    }
}