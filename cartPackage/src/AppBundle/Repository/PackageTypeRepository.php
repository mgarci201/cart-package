<?php

namespace AppBundle\Repository;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Package_Type;

class PackageRepository extends EntityRepository
{
	public function findAll()
	{
		return $this->getEntityManager()
		->createQuery(
		'SELECT p, pt 
		FROM AppBundle:Package_Type pt
		JOIN pt.package p'
			)

		->getResult();
	}
}