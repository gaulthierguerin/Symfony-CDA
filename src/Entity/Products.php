<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="products")
 */

class Products
{
    /**
     * @ORM\Column(name="ProductId", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */

    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @ORM\Column(name="ProductName", type="string", length=40)
     */

    private $name;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @ORM\Column(name="SupplierID", type="integer")
     */

    private $supplierID;

    public function getSupplierID(): ?int
    {
        return $this->supplierID;
    }

    public function setSupplierID(string $supplierID): self
    {
        $this->supplierID = $supplierID;
        return $this;
    }

    /**
     * @ORM\Column(name="CategoryID", type="integer")
     */

    private $categoryID;

    public function getCategoryID(): ?int
    {
        return $this->categoryID;
    }

    public function setCategoryID($categoryID): self
    {
        $this->categoryID = $categoryID;
        return $this;
    }

    /**
     * @ORM\Column(name="QuantityPerUnit", type="string", length=20)
     */

    private $quantityPerUnit;

    public function getQuantityPerUnit(): ?string
    {
        return $this->quantityPerUnit;
    }

    public function setQuantityPerUnit($quantityPerUnit): self
    {
        $this->quantityPerUnit = $quantityPerUnit;
        return $this;
    }

    /**
     * @ORM\Column(name="UnitPrice", type="decimal")
     */

    private $unitPrice;

    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    public function setUnitPrice($unitPrice): self
    {
        $this->unitPrice = $unitPrice;
        return $this;
    }

    /**
     * @ORM\Column(name="UnitsInStock", type="smallint")
     */

    private $unitsInStock;

    public function getUnitsInStock()
    {
        return $this->unitsInStock;
    }

    public function setUnitsInStock($unitsInStock): self
    {
        $this->unitsInStock = $unitsInStock;
        return $this;
    }

    /**
     * @ORM\Column(name="UnitsOnOrder", type="smallint")
     */

    private $unitsOnOrder;

    public function getUnitsOnOrder()
    {
        return $this->unitsOnOrder;
    }

    public function setUnitsOnOrder($unitsOnOrder): self
    {
        $this->unitsOnOrder = $unitsOnOrder;
        return $this;
    }

    /**
     * @ORM\Column(name="ReorderLevel", type="smallint")
     */

    private $reorderLevel;

    public function getReorderLevel()
    {
        return $this->reorderLevel;
    }

    public function setReorderLevel($reorderLevel): self
    {
        $this->reorderLevel = $reorderLevel;
        return $this;
    }

    /**
     * @ORM\Column(name="Discontinued", type="boolean")
     */

    private $discontinued;

    public function getDiscontinued()
    {
        return $this->discontinued;
    }

    public function setDiscontinued($discontinued): self
    {
        $this->discontinued = $discontinued;
        return $this;
    }
}