<?php

namespace Flyer\Components\Router;

use Symfony\Component\HttpFoundation\Request;

interface RouterInterface
{
	public function setRequest(Request $request);
}