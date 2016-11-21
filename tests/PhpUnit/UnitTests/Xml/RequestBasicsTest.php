<?php

use PHPUnit\Framework\TestCase;

class RequestBasicsTest extends TestCase
{
	public function testAssembly()
	{
		$auth = new \SchlundtechXML\Auth();
		$auth->setContext(42);
		$auth->setUser('test-user');
		$auth->setPassword('test-password');

		$owner = new \SchlundtechXML\Owner();
		$owner->setUser('test-owner');
		$owner->setContext(23);

		$task = new MTask();
		$task->setCode(666);

		$request = new \SchlundtechXML\Request();
		$request->setAuth($auth);
		$request->setOwner($owner);
		$request->setLanguage('de');
		$request->setTask($task);

		$xml = $request->render();

		$xml2 = simplexml_load_string($xml);

		$this->assertEquals(42,              (int)$xml2->auth->context);
		$this->assertEquals('test-user',     (string)$xml2->auth->user);
		$this->assertEquals('test-password', (string)$xml2->auth->password);
		$this->assertEquals(23,              (int)$xml2->owner->context);
		$this->assertEquals('test-owner',    (string)$xml2->owner->user);
		$this->assertEquals(666,             (int)$xml2->task->code);
		$this->assertEquals('de',            (string)$xml2->language);
	}

}

class MTask extends \SchlundtechXML\Task
{

}
