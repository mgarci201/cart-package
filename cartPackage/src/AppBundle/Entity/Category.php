<? php 

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Category
{
	/**
	* @Assert\NotBlank()
	*/
	public $name;

	public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		$this->name = $name;
	}
}