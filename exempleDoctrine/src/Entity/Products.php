<?php

namespace App\Entity;

use App\Repository\ProductsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ProductsRepository::class)
 */
class Products
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=40)
     * @Assert\NotBlank(
     *     message="Veuillez renseigner le nom du fournisseur"
     * )
     * @Assert\Regex(
     *     pattern="/^[\s\w\#\_\-éèàçâêîôûùäaëïüö]+$/",
     *     message="Caratère(s) non valide(s)"
     * )
     */
    private $ProductName;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\NotBlank(
     *     message="Veuillez renseigner l'ID de la catégorie"
     * )
     * @Assert\Regex(
     *     pattern="/^[\d]+$/",
     *     message="Veuillez n'entrer que des nombres"
     * )
     */
    private $CategoryID;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     * @Assert\NotBlank(
     *     message="Veuillez renseigner ce que contient une unité"
     * )
     * @Assert\Regex(
     *     pattern="/^[\s\w\#\_\-éèàçâêîôûùäaëïüö]+$/",
     *     message="Caratère(s) non valide(s) (Format : Maximum 6 chiffres avant la virgule, 4 après (optionnel)"
     * )
     */
    private $QuantityPerUnit;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=4, nullable=true)
     * @Assert\NotBlank(
     *     message="Veuillez renseigner le prix à l'unité"
     * )
     * @Assert\Regex(
     *     pattern="/^[0-9]{1,6}([\,\.]{1}[\d]{1,4})?$/",
     *     message="Caratère(s) non valide(s) (Format : Maximum 6 chiffres avant la virgule, 4 après (optionnel)"
     * )
     */

    private $UnitPrice;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     * @Assert\NotBlank(
     *     message="Veuillez renseigner la quantité en stock"
     * )
     * @Assert\Regex(
     *  pattern="/^[\d]+$/",
     *  message="Veuillez n'entrer que des nombres"
     * )
     */
    private $UnitsInStock;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     * @Assert\NotBlank(
     *     message="Veuillez renseigner la quantité en cours de commande"
     * )
     * @Assert\Regex(
     *     pattern="/^[\d]+$/",
     *     message="Veuillez n'entrer que des nombres"
     * )
     */
    private $UnitsOnOrder;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     * @Assert\NotBlank(
     *      message="Veuillez renseigner la quantité limite pour recommander"
     * )
     * @Assert\Regex(
     *     pattern="/^[\d]+$/",
     *     message="Veuillez n'entrer que des nombres"
     * )
     */
    private $ReorderLevel;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Discontinue;

    /**
     * @ORM\ManyToOne(targetEntity=Suppliers::class, inversedBy="getProducts")
     */
    private $SupplierID;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductName(): ?string
    {
        return $this->ProductName;
    }

    public function setProductName(string $ProductName): self
    {
        $this->ProductName = $ProductName;

        return $this;
    }

    public function getCategoryID(): ?int
    {
        return $this->CategoryID;
    }

    public function setCategoryID(?int $CategoryID): self
    {
        $this->CategoryID = $CategoryID;

        return $this;
    }

    public function getQuantityPerUnit(): ?string
    {
        return $this->QuantityPerUnit;
    }

    public function setQuantityPerUnit(?string $QuantityPerUnit): self
    {
        $this->QuantityPerUnit = $QuantityPerUnit;

        return $this;
    }

    public function getUnitPrice(): ?string
    {
        return $this->UnitPrice;
    }

    public function setUnitPrice(?string $UnitPrice): self
    {
        $this->UnitPrice = $UnitPrice;

        return $this;
    }

    public function getUnitsInStock(): ?int
    {
        return $this->UnitsInStock;
    }

    public function setUnitsInStock(?int $UnitsInStock): self
    {
        $this->UnitsInStock = $UnitsInStock;

        return $this;
    }

    public function getUnitsOnOrder(): ?int
    {
        return $this->UnitsOnOrder;
    }

    public function setUnitsOnOrder(?int $UnitsOnOrder): self
    {
        $this->UnitsOnOrder = $UnitsOnOrder;

        return $this;
    }

    public function getReorderLevel(): ?int
    {
        return $this->ReorderLevel;
    }

    public function setReorderLevel(?int $ReorderLevel): self
    {
        $this->ReorderLevel = $ReorderLevel;

        return $this;
    }

    public function getDiscontinue(): ?bool
    {
        return $this->Discontinue;
    }

    public function setDiscontinue(bool $Discontinue): self
    {
        $this->Discontinue = $Discontinue;

        return $this;
    }

    public function getSupplierID(): ?Suppliers
    {
        return $this->SupplierID;
    }

    public function setSupplierID(?Suppliers $SupplierID): self
    {
        $this->SupplierID = $SupplierID;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }
}
