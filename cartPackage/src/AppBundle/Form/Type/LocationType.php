<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use AppBundle\Form\EventListener\AddCityFieldSubscriber;
use AppBundle\Form\EventListener\AddProvinceFieldSubscriber;
use AppBundle\Form\EventListener\AddCountryFieldSubscriber;

class LocationType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$factory = $builder->getFormFactory();
        $citySubscriber = new AddCityFieldSubscriber($factory);

        $builder->addEventSubscriber($citySubscriber);
        $provinceSubscriber = new AddProvinceFieldSubscriber($factory);

        $builder->addEventSubscriber($provinceSubscriber);
        $countrySubscriber = new AddCountryFieldSubscriber($factory);

        $builder->addEventSubscriber($countrySubscriber);

        $builder->add('address');
	}

	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'AppBundle\Model\Location'));
	}

	public function getName()
	{
		return 'location';
	}


}