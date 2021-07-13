<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 */
class Produit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $nom;

    /**
     * @ORM\Column(type="float")
     */
    private $prixUnitaire;

    /**
     * @ORM\Column(type="integer")
     */
    private $uniteStock;

    /**
     * @ORM\ManyToOne(targetEntity=CategorieProduit::class)
     * @ORM\JoinColumn(nullable=true)
     */
    private $categorieProduit;

    /**
     * @ORM\OneToOne(targetEntity=Fournisseur::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $fournisseur;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $imgProduit;

    public function __toString(): string
    {
        return (string) $this->nom;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrixUnitaire(): ?float
    {
        return $this->prixUnitaire;
    }

    public function setPrixUnitaire(float $prixUnitaire): self
    {
        $this->prixUnitaire = $prixUnitaire;

        return $this;
    }

    public function getUniteStock(): ?int
    {
        return $this->uniteStock;
    }

    public function setUniteStock(int $uniteStock): self
    {
        $this->uniteStock = $uniteStock;

        return $this;
    }

    public function getCategorieProduit(): ?CategorieProduit
    {
        return $this->categorieProduit;
    }

    public function setCategorieProduit(?CategorieProduit $categorieProduit): self
    {
        $this->categorieProduit = $categorieProduit;

        return $this;
    }

    public function getFournisseur(): ?Fournisseur
    {
        return $this->fournisseur;
    }

    public function setFournisseur(Fournisseur $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    public function getImgProduit(): ?string
    {
        return $this->imgProduit;
    }

    public function setImgProduit(?string $imgProduit): self
    {
        $this->imgProduit = $imgProduit;

        return $this;
    }
}
