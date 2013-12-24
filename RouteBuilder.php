<?php

namespace Flyer\Components\Router;

class RouteBuilder
{

	private static $listener;

	private static $route;

	private static $method;

	private static $options = array();

	public static function setListener($listener) 
	{
		$this->listener = $listener;
	}

	public static function setRoute($route)
	{
		$this->route = $route;
	}

	public static function setMethod($method)
	{
		$this->method = $method;
	}

	public static function setOptions(array $options = $options) 
	{
		$this->options = $options;
	}

	public static function getListener()
	{
		return $this->listener;
	}

	public static function getRoute()
	{
		return $this->route;
	}

	public static function getMethod()
	{
		return $this->method;
	}

	public static function getOptions()
	{
		return $this->options;
	}
	
}