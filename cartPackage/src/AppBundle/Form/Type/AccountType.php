<?php

namespace AppBundle\Form\Type;

use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Province;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\FormInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AccountType extends AbstractType 
{
	protected $em;

	function __construct(EntityManager $em)
	{
		$this->em = $em;
	}

	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		//Name of user
		$builder->add('name', 'text');

		/* Additional fields here */

		$builder->add('save', 'submit');

		//Add listeners 
        $builder->addEventListener(FormEvents::PRE_SET_DATA, array($this, 'onPreSetData'));
        $builder->addEventListener(FormEvents::PRE_SUBMIT, array($this, 'onPreSubmit'));
	}

	protected function addElements(FormInterface $form, Province $province = null)
	{
		// Remove the submit button, we will place this at the end of the form later
		$form->remove('save');

		//add Province element
		$form->add('province', 'entity', array(
			'data' => $province,
			'empty_value' => '--Choose --',
			'class' => 'AppBundle:Province',
			'mapped' => false)
		);

		// Cities are empty, unless we actually supplied a province
		$cities = array();
		if ($province) {
			//Fetch cities from specified province
			$repo = $this->em->getRepository('AppBundle:City');
			$cities = $repo->findByProvince($province, array('name' => 'asc'));
		}

		// Add City Element
		$form->add('city', 'entity', array(
			'empty_value' => '-- Select Province First --', 
			'class' => 'AppBundle:City',
			'choices' => $cities,
			));

		// Add submit button again, this time, it's back at the end of the form
		$form->add($submit);
	}

	function onPreSubmit(FormEvent $event)
	{
		$form = $event->getForm();
		$data = $event->getData();

		//Note data is not yet hydrated into the entity
		$province = $this->em->getRepository('AppBundle:Province')->find($data['province']);
		$this->addElements($form, $province);
	}

	function onPreSetData(FormEvent $event)
	{
		$account = $event->getData();
		$form = $event->getForm();

		//we might hav an empty account 
		$province = $account->getCity() ? $account->getCity()->getProvince() : null;
		$this->addElements($form, $province);
	}

	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'AppBundle\Entity\Account'));
	}

	public function getName()
	{
		return 'account_type';
	}

}