<?php

namespace SchlundtechXML;

use SchlundtechXML\Xml\Container;

class Owner extends Container
{
	protected $xml = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<owner>
	<user></user>
	<context></context>
</owner>
XML;

	/**
	 * @param string $user
	 */
	public function setUser($user)
	{
		$this->simpleXMl->user = $user;
	}

	/**
	 * @param string $context
	 */
	public function setContext($context)
	{
		$this->simpleXMl->context = $context;
	}
}