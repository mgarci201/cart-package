<?php

namespace AppBundle\Model;

use Symfony\Component\Validator\Constraints as Assert;

class Location
{
	/**
	* @Assert\NotBlank()
	*/
	public $address;

	/**
	* @Assert\Type("AppBundle\Entity\City")
	* @Assert\NotNull()
	*/
	public $city;
}