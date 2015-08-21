<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Package_Type;

/**
 * Package
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PackageRepository")
 */

class Package
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
     * @ORM\OneToOne(targetEntity="Package_Type", mappedBy="package")
     * @ORM\Column(name="package", type="string", length=255)
     */
    private $package;

    /**
     * @var string
     *
     * @ORM\Column(name="numbers", type="string", length=50)
     */
    private $numbers;

    /**
     * @var string
     *
     * @ORM\Column(name="cost", type="string")
     */
    private $cost;
    

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
     * Set package
     *
     * @param string $package
     * @return Package
     */
    public function setPackage($package)
    {
        $this->package = $package;

        return $this;
    }

    /**
     * Get package
     *
     * @return string 
     */
    public function getPackage()
    {
        return $this->package;
    }

    /**
     * Set numbers
     *
     * @param string $numbers
     * @return Package
     */
    public function setNumbers($numbers)
    {
        $this->numbers = $numbers;

        return $this;
    }

    /**
     * Get numbers
     *
     * @return string 
     */
    public function getNumbers()
    {
        return $this->numbers;
    }

    /**
     * Set cost
     *
     * @param string $cost
     * @return Package
     */
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Get cost
     *
     * @return string 
     */
    public function getCost()
    {
        return $this->cost;
    }

}
