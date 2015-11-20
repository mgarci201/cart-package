<?php

// src/AppBundle/Controller/SecurityController.php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\UserType;
use AppBundle\Entity\User;


class SecurityController extends Controller
{
	/**
	* @Route("/login", name="login_route")
	*/
	public function loginAction(Request $request)
	{

		$authenticationUtils = $this->get('security.authentication_utils');

		//get login error if theres one
		$error = $authenticationUtils->getLastAuthenticationError();

		//last username entered by user
		$lastUsername = $authenticationUtils->getLastUsername();

		return $this->render(
			'security/login.html.twig',
			array(
				// last username entered by user
				'last_username' => $lastUsername,
				'error' => $error,
				)
			);
	}

	/**
	* @Route("/login_check", name="login_check")
	*/
	public function loginCheckAction()
	{
	}

	/**
	* @Route("/register", name="user_registration")
	*/
	public function registerAction(Request $request)
	{
		// 1) Build Form
		$user = new User();
		$form = $this->createForm(new UserType(), $user);

		// 2) handle submit (happens only on POST method)
		$form->handleRequest($request);
		if ($form->isValid() && $form->isSubmitted()) {
			// 3) encode password (can also be done w/ Doctrine listener)
			$password = $this->get('security.password_encoder')
				->encodePassword($user, $user->getPlainPassword());

			$user->setPassword($password);

			// 4) Save the User!
			$em = $this->getDoctrine()->getManager();
			$em->persist($user);
			$em->flush();

        	return new Response('<html><body>User Saved in DB!</body></html>');
		}

		return $this->render(
			'security/register.html.twig',
			array('form' => $form->createView())
		);
	}	

}