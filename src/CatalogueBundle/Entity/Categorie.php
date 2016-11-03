<?php

namespace CatalogueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie
 *
 * @ORM\Table(name="categorie")
 * @ORM\Entity(repositoryClass="CatalogueBundle\Repository\CategorieRepository")
 */
class Categorie
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;
    
    /**
     * @ORM\OneToMany(targetEntity="CatalogueBundle\Entity\Produit", mappedBy="categorie")
     */
     private $produits;
     
    /**
     * @ORM\ManyToMany(targetEntity="CatalogueBundle\Entity\Categorie")
     * @ORM\JoinTable(name="souscategorie",
     *      joinColumns={@ORM\JoinColumn(name="categorie_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="sous_categorie_id", referencedColumnName="id")}
     *      )
     */
      private $souscategorie;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->produits = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Categorie
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return Categorie
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Add produit
     *
     * @param \CatalogueBundle\Entity\Produit $produit
     *
     * @return Categorie
     */
    public function addProduit(\CatalogueBundle\Entity\Produit $produit)
    {
        $this->produits[] = $produit;

        return $this;
    }

    /**
     * Remove produit
     *
     * @param \CatalogueBundle\Entity\Produit $produit
     */
    public function removeProduit(\CatalogueBundle\Entity\Produit $produit)
    {
        $this->produits->removeElement($produit);
    }

    /**
     * Get produits
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProduits()
    {
        return $this->produits;
    }

    /**
     * Add souscategorie
     *
     * @param \CatalogueBundle\Entity\Categorie $souscategorie
     *
     * @return Categorie
     */
    public function addSouscategorie(\CatalogueBundle\Entity\Categorie $souscategorie)
    {
        $this->souscategorie[] = $souscategorie;

        return $this;
    }

    /**
     * Remove souscategorie
     *
     * @param \CatalogueBundle\Entity\Categorie $souscategorie
     */
    public function removeSouscategorie(\CatalogueBundle\Entity\Categorie $souscategorie)
    {
        $this->souscategorie->removeElement($souscategorie);
    }

    /**
     * Get souscategorie
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSouscategorie()
    {
        return $this->souscategorie;
    }
    
    public function __toString(){
      return $this->getName();
    }
}
