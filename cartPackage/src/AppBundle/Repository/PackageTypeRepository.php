<?php

namespace AppBundle\Repository;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Package_Type;

class PackageTypeRepository extends EntityRepository
{
	//Query for 1 to 1 associated package.
	public function findAssociatedPackageType()
	{
		return $this->getEntityManager()->createQuery(
			"Select pt.packageNameType, p.package, p.numbers, p.cost 
			 From AppBundle:Package_Type pt
			 Inner Join AppBundle:Package p 
			 Where pt.package=p.id"
			)
		->getResult();
	}
}