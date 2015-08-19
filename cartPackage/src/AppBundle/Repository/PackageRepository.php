<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Package;

class PackageRepository extends EntityRepository
{
	public function findAllOrderedByName()
	{
		return $this->getEntityManager()->createQuery(
			'Select p From AppBundle:Product p Order By p.name ASC'
			)
		->getResult();
	}
}
}