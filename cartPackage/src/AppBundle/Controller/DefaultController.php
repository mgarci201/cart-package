<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Task;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Package;
use AppBundle\Entity\Package_Type;
use AppBundle\Form\PackageType;
use AppBundle\Form\DropdownPackageType;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceListInterface;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;



class DefaultController extends Controller
{
    /**
     * @Route("/app/example", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * Finds and displays a Package entity.
     * @Route("/showpackage/{id}", name="showpackage")
     * @Method("GET")
     * @Template("default/index.html.twig")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Package')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Package entity.');
        }

        return array('entity' => $entity);
    }  

    /**
    * Creates a form to choose a Package entity.
    *
    * @param Package $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createChoosePackageForm(Package $entity)
    {
        $form = $this->createForm(new DropdownPackageType(), $entity);

        $form->add('submit', 'submit', array('label' => 'Update', 'attr' => array('class' => 'btn btn-primary')  ));

        return $form;
    }    

    /**
     * Finds and displays a dropdown entity from package type.
     * @Route("/dropdownpackage", name="dropdown")
     */
    public function selectPackage()
    { 
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('AppBundle:Package_Type')->findAll();

        $choosePackageForm = $this->createChoosePackageForm($entity);
        $choosePackageForm->handleRequest($request);

        return array(
            'entity' =>$entity,
            'DropdownPackageType' => $choosePackageForm->createView(),
            );

        //$packageTypes = $this->getDoctrine()
        // ->getRepository('AppBundle:Package_Type')
        // ##->findBy(array());
        // ->findAll();

        // $package = new Package();

        // ##$choiceList = new \Symfony\Bridge\Doctrine\Form\ChoiceList\EntityChoiceList($packageType->getPackageNameType(), $packageType->getPackage());

        // $choiceList = new ArrayChoiceList($packageTypes);


        // $form = $this->createFormBuilder($packageTypes)
        //     ->add('package_Type', 'choice', array(
        //         ##'choice_list' => new ChoiceList($packageType->getPackageNameType(), $packageType->getPackage() ) 
        //         'choices' => $choiceList 
        //     ))

        //     ->add('save', 'submit', array('label' => 'label'))
        //     ->getForm();

        // $form->handleRequest($request);

    }


    /**
     * Finds and displays a dropdown entity from package type.
     * @Route("/dropdowntest", name="dropdowntest")
     */
    public function dropdownAction(Request $request)
    {
        $task = new Task();
        $task->setTask('Write a test');
        $task->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createFormBuilder($task)
            ->add('task', 'text')
            ->add('dueDate', 'date')
            ->add('save', 'submit', array('label' => 'Create Task'))
            ->getForm();

        return $this->render('base.html.twig', array(
            'form' => $form->createView(),
            ));
    }  

}
