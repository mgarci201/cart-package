<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Province
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Province
{
    /**
     * @var integer
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
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, unique=true)
     */
    private $slug;    

    /**
     * @ORM\ManyToOne(targetEntity="Country", inversedBy="provinces")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     */
    protected $country;     

    /**
     * @ORM\OneToMany(targetEntity="City", mappedBy="province")
     */
    protected $cities;


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
     * @return Province
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
     * Constructor
     */
    public function __construct()
    {
        $this->cities = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add cities
     *
     * @param \AppBundle\Entity\City $cities
     * @return Province
     */
    public function addCity(\AppBundle\Entity\City $cities)
    {
        $this->cities[] = $cities;

        return $this;
    }

    /**
     * Remove cities
     *
     * @param \AppBundle\Entity\City $cities
     */
    public function removeCity(\AppBundle\Entity\City $cities)
    {
        $this->cities->removeElement($cities);
    }

    /**
     * Get cities
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCities()
    {
        return $this->cities;
    }

    function __toString()
    {
        return $this->getName();
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Province
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set country
     *
     * @param \AppBundle\Entity\Country $country
     * @return Province
     */
    public function setCountry(\AppBundle\Entity\Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \AppBundle\Entity\Country 
     */
    public function getCountry()
    {
        return $this->country;
    }
}
