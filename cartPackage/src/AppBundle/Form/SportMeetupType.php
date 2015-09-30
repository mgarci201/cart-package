<?php

namespace AppBundle\Form\SportMeetupType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use AppBundle\Entity\Sport;

class SportMeetupType extends AbstractType
{

	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('sport', 'entity', array(
				'class' => 'AppBundle:Package_Type',
				'placeholder' => '',
				));

		$formModifier = function (FormInterface $form, Sport $sport = null)	{
			$positions = null === $sport ? array() : $sport->getAvailablePositions();

			$form->add('package', 'entity', array(
					'class' => 'AppBundle:Positions',
					'placeholder' => '',
					'choices' => $positions,
					));
		};

		$builder->addEventListener(
			FormEvents::PRE_SET_DATA,
			function (FormEvent $event) use ($formModifier) {

				//this would be my entity for packages
				$data = $event->getData();

				$formModifier($event->getForm(), $data->getSport());
			}
		);

		$builder->get('sport')->addEventListener(
			FormEvents::POST_SUBMIT,
			function(FormEvent $event) use ($formModifier) {
            // It's important here to fetch $event->getForm()->getData(), as
            // $event->getData() will get you the client data (that is, the ID)
            $sport = $event->getForm()->getData();

            // since we've added the listener to the child, we'll have to pass on
            // the parent to the callback functions!
            $formModifier($event->getForm()->getParent(), $sport);            			
			}
		);
	}
	
}