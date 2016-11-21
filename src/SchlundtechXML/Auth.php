<?php

namespace SchlundtechXML;

use SchlundtechXML\Xml\Container;

class Auth extends Container
{
	protected $xml = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<auth>
	<user></user>
	<password></password>
	<context></context>
</auth>
XML;

	/**
	 * @param string $user
	 */
	public function setUser($user)
	{
		$this->simpleXMl->user = $user;
	}

	/**
	 * @param string $password
	 */
	public function setPassword($password)
	{
		$this->simpleXMl->password = $password;
	}

	/**
	 * @param string $context
	 */
	public function setContext($context)
	{
		$this->simpleXMl->context = $context;
	}
}