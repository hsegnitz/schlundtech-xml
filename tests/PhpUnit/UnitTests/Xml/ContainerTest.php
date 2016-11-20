<?php

use PHPUnit\Framework\TestCase;

class XmlContainerTest extends TestCase
{
	public function testRootElementHasXMLHeader()
	{
		$rootElement = new RootElement();
		$xml = $rootElement->render();

		$this->assertStringStartsWith("<?xml ", $xml);
	}

	public function testSubStructures()
	{
		$rootElement = new RootElement();
		$sub = new ChildStructure();
		$sub->setKey1('asdf');
		$sub->setKey2('jkloe');

		$rootElement->setChildStructure($sub);

		$xml = (string)$rootElement;
		$sXml = simplexml_load_string($xml);

		$this->assertEquals('asdf', $sXml->childStructure->key1);
		$this->assertEquals('jkloe', $sXml->childStructure->key2);
	}
}


class RootElement extends \SchlundtechXML\Xml\Container
{
	protected $isRoot = true;

	protected $xml = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<testMe>
	<someElement></someElement>
	<childStructure></childStructure>
</testMe>
XML;


	public function setSomeElement($someElement = '')
	{
		$this->simpleXMl->someElement = $someElement;
	}

	public function setChildStructure(ChildStructure $childStructure)
	{
		foreach ($childStructure->getSimpleXml() as $key => $value) {
			$this->simpleXMl->childStructure->$key = $value;
		}
	}
}


class ChildStructure extends \SchlundtechXML\Xml\Container
{
	protected $xml = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<childStructure>
	<key1></key1>
	<key2></key2>
</childStructure>
XML;


	public function setKey1($key1)
	{
		$this->simpleXMl->key1 = $key1;
	}

	public function setKey2($key2)
	{
		$this->simpleXMl->key2 = $key2;
	}
}
