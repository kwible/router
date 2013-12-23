<?php

namespace Flyer\Components\Router;

use Symfony\Component\HttpFoundation\Request;
use Flyer\Components\Router\Route;
use Flyer\Components\Router\RouterInterface;

class Router
{

	protected $routes = array();

	protected $methods = array("POST", "GET"); // DELETE/UPDATE?

	private $request;

	public function addRoute(Route $route)
	{
		$this->routes[$route->getListener()] = array(
			'method' => $route->getMethod(),
			'route' => $route->getRoute()
		);
	}

	public function setRequest(Request $request)
	{
		$this->request = $request;
		//print_r($this->request);
	}

	public function route()
	{
		
		if (in_array($this->request->server->get('REQUEST_METHOD'), $this->methods))
		{
			// Checks the current request method
			switch($this->request->server->get('REQUEST_METHOD'))
			{

			}
		}
	}
}