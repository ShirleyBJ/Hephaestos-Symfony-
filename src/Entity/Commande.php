<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommandeRepository::class)
 */
class Commande
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCommande;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateRetraitCommande;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="commandes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity=Employe::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $employe;

    /**
     * @ORM\Column(type="float")
     */
    private $prixUnitaire;

    /**
     * @ORM\Column(type="float")
     */
    private $prixTotalCommande;

    /**
     * @ORM\Column(type="float")
     */
    private $prixTotalProduit;

    /**
     * @ORM\OneToMany(targetEntity=ProduitCommander::class, mappedBy="commande")
     */
    private $produitCommanders;

    public function __construct()
    {
        $this->produit = new ArrayCollection();
        $this->produitCommanders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->dateCommande;
    }

    public function setDateCommande(\DateTimeInterface $dateCommande): self
    {
        $this->dateCommande = $dateCommande;

        return $this;
    }

    public function getDateRetraitCommande(): ?\DateTimeInterface
    {
        return $this->dateRetraitCommande;
    }

    public function setDateRetraitCommande(?\DateTimeInterface $dateRetraitCommande): self
    {
        $this->dateRetraitCommande = $dateRetraitCommande;

        return $this;
    }

    public function getClient(): ?Utilisateur
    {
        return $this->client;
    }

    public function setClient(?Utilisateur $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getEmploye(): ?Employe
    {
        return $this->employe;
    }

    public function setEmploye(?Employe $employe): self
    {
        $this->employe = $employe;

        return $this;
    }

    /**
     * @return Collection|ProduitCommander[]
     */
    public function getProduit(): Collection
    {
        return $this->produit;
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

    public function getPrixTotalCommande(): ?float
    {
        return $this->prixTotalCommande;
    }

    public function setPrixTotalCommande(float $prixTotalCommande): self
    {
        $this->prixTotalCommande = $prixTotalCommande;

        return $this;
    }

    public function getPrixTotalProduit(): ?float
    {
        return $this->prixTotalProduit;
    }

    public function setPrixTotalProduit(float $prixTotalProduit): self
    {
        $this->prixTotalProduit = $prixTotalProduit;

        return $this;
    }

    /**
     * @return Collection|ProduitCommander[]
     */
    public function getProduitCommanders(): Collection
    {
        return $this->produitCommanders;
    }

    public function addProduitCommander(ProduitCommander $produitCommander): self
    {
        if (!$this->produitCommanders->contains($produitCommander)) {
            $this->produitCommanders[] = $produitCommander;
            $produitCommander->setCommande($this);
        }

        return $this;
    }

    public function removeProduitCommander(ProduitCommander $produitCommander): self
    {
        if ($this->produitCommanders->removeElement($produitCommander)) {
            // set the owning side to null (unless already changed)
            if ($produitCommander->getCommande() === $this) {
                $produitCommander->setCommande(null);
            }
        }

        return $this;
    }
}
