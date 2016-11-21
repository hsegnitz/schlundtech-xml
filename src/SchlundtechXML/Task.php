<?php

namespace SchlundtechXML;

use SchlundtechXML\Xml\Container;

abstract class Task extends Container
{
	protected $xml = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<task>
	<code></code>
</task>
XML;

	public function setCode($code)
	{
		$this->simpleXMl->code = $code;
	}
}
