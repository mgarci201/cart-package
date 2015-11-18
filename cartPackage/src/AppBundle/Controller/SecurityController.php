<?php

// src/AppBundle/Controller/SecurityController.php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class SecurityController extends Controller
{
	/**
	* @Route("/login", name="login_route")
	*/
	public function loginAction(Request $request)
	{
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

}