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
<overwrite_me>
</overwrite_me>
XML;

	/** @var \SimpleXMLElement */
	protected $simpleXMl;

	/**
	 * Container constructor.
	 */
	public function __construct()
	{
		$this->simpleXMl = simplexml_load_string($this->xml);
	}

	/**
	 * @return string
	 */
	public function render()
	{
		$xml = $this->simpleXMl->asXML();
		if (! $this->isRoot) {
			return preg_replace('/<\?.*\?>/', '', $xml);
		}
		//@todo remove empty elements
		return $xml;
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
		return $this->render();
	}
}

