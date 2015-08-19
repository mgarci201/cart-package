<?php

namespace AppBundle\Repository;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Package;

class PackageRepository extends EntityRepository
{
	public function findAllOrderedByName()
	{
		return $this->getEntityManager()->createQuery(
			'Select p 
			From AppBundle:Package p 
			Order By p.name ASC'
			)
		->getResult();
	}
}