<?php
namespace MyApp\FilmothequeBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="film")
 */
class Film
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string",length=255)
     * @Assert\NotBlank()
     * @Assert\Length(min=3)
     */
    private $titre;

    /**
     * @ORM\Column(type="string",length=500)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="Category")
     * @Assert\NotBlank()
     */
    private $category;

    /**
     * @ORM\ManyToMany(targetEntity="Acteur")
     */
    private $acteurs;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->acteurs = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set titre
     *
     * @param string $titre
     *
     * @return Film
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Film
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set categorie
     *
     * @param \MyApp\FilmothequeBundle\Entity\Category $category
     *
     * @return Film
     */
    public function setCategorie(\MyApp\FilmothequeBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \MyApp\FilmothequeBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add acteur
     *
     * @param \MyApp\FilmothequeBundle\Entity\Acteur $acteur
     *
     * @return Film
     */
    public function addActeur(\MyApp\FilmothequeBundle\Entity\Acteur $acteur)
    {
        $this->acteurs[] = $acteur;

        return $this;
    }

    /**
     * Remove acteur
     *
     * @param \MyApp\FilmothequeBundle\Entity\Acteur $acteur
     */
    public function removeActeur(\MyApp\FilmothequeBundle\Entity\Acteur $acteur)
    {
        $this->acteurs->removeElement($acteur);
    }

    /**
     * Get acteurs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getActeurs()
    {
        return $this->acteurs;
    }
}
