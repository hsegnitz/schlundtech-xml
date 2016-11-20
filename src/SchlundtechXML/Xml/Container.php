<?php

namespace SchlundtechXML\Xml;

/**
 * Class Container
 *
 * @package SchlundtechXML\Xml
 */
class Container
{
	/** @var bool */
	protected $isRoot = false;

	/** @var string */
	protected $xml = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<nothing>
</nothing>
XML;

	/** @var \SimpleXMLElement */
	protected $simpleXMl;

	public function __construct()
	{
		$this->simpleXMl = simplexml_load_string($this->xml);
	}

	/**
	 * @return string
	 */
	public function render()
	{
		return $this->xml;
	}

	/**
	 * @return \SimpleXMLElement
	 */
	public function getSimpleXml()
	{
		return $this->simpleXMl;
	}

	/**
	 * @return string
	 */
	public function __toString()
	{
		$xml = $this->simpleXMl->asXML();
		if (! $this->isRoot) {
			return preg_replace('/<\?.*\?>/', '', $xml);
		}
		return $xml;
	}
}

