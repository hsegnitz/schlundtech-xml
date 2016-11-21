<?php

namespace SchlundtechXML;

use SchlundtechXML\Xml\Container;

class Request extends Container
{
	/** @var bool */
	protected $isRoot = true;

	/** @var string */
	protected $xml = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<request>
	<auth></auth>
	<owner></owner>
	<language>en</language>
	<task></task>
</request>
XML;

	/**
	 * @param Auth $auth
	 */
	public function setAuth(Auth $auth)
	{
		foreach ($auth->getSimpleXml() as $key => $value) {
			$this->simpleXMl->auth->$key = $value;
		}
	}

	/**
	 * @param Owner $owner
	 */
	public function setOwner(Owner $owner)
	{
		foreach ($owner->getSimpleXml() as $key => $value) {
			$this->simpleXMl->owner->$key = $value;
		}
	}

	/**
	 * @param $language
	 */
	public function setLanguage($language)
	{
		$this->simpleXMl->language = $language;
	}

	/**
	 * @param Task $task
	 */
	public function setTask(Task $task)
	{
		foreach ($task->getSimpleXml() as $key => $value) {
			$this->simpleXMl->task->$key = $value;
		}
	}
}