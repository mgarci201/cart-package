<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Package;
use AppBundle\Entity\Package_Type;


/**
 * Package_Type
 * @ORM\Table()
 * @ORM\Entity
 */
class Package_Type
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
     * @ORM\Column(name="package_name_type", type="string", length=255)
     */
    private $packageNameType;

    /**
     * @ORM\OneToOne(targetEntity="Package", mappedBy="package_type")
     * @ORM\JoinColumn(name="package_type_id", referencedColumnName="id")
     */
    protected $package;    


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
     * Set packageNameType
     *
     * @param string $packageNameType
     * @return Package_Type
     */
    public function setPackageNameType($packageNameType)
    {
        $this->packageNameType = $packageNameType;

        return $this;
    }

    /**
     * Get packageNameType
     *
     * @return string 
     */
    public function getPackageNameType()
    {
        return $this->packageNameType;
    }

    /**
     * Set package
     *
     * @param \AppBundle\Entity\Package $package
     * @return Package_Type
     */
    public function setPackage(\AppBundle\Entity\Package $package = null)
    {
        $this->package = $package;

        return $this;
    }

    /**
     * Get package
     *
     * @return \AppBundle\Entity\Package
     */
    public function getPackage()
    {
        return $this->package;
    }
}
