<?php

namespace Flyer\Components\Router;

class Route
{

	private $listener;

	private $route;

	private $method;

	private $options = array();

	public function setListener($listener) 
	{
		$this->listener = $listener;
	}

	public function setRoute($route)
	{
		$this->route = $route;
	}

	public function setMethod($method)
	{
		$this->method = $method;
	}

	public function setOptions(array $options = $options) 
	{
		$this->options = $options;
	}

	public function getListener()
	{
		return $this->listener;
	}

	public function getRoute()
	{
		return $this->route;
	}

	public function getMethod()
	{
		return $this->method;
	}

	public function getOptions()
	{
		return $this->options;
	}
	
}