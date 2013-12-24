<?php

namespace Flyer\Components\Router;

use Closure;
use Flyer\Foundation\Registry;
use Symfony\Component\HttpFoundation\Request;
use Flyer\Components\Http;
use Flyer\Components\Router\Route;
use Flyer\Foundation\Events\Events;

class Router
{

	protected static $routes = array();

	protected $methods = array("POST", "GET"); // DELETE/UPDATE?

	private $request;

	public static function addRoute($method, $listener, $route)
	{
		self::$routes[$listener] = array(
			'method' => $method,
			'route' => $route
		);
	}

	public function setRequest(Request $request)
	{
		$this->request = $request;
	}

	public function route()
	{
		if (in_array($this->request->server->get('REQUEST_METHOD'), $this->methods))
		{
			foreach (self::$routes as $listener => $route)
			{
				if ($this->request->server->get('REQUEST_METHOD') == $route['method'])
				{
					$uri = explode('/', ltrim($this->request->getPathInfo(), '/'));

					if (strtolower($uri[0]) == $listener)
					{
						$this->generateRouteEvent($route['route']);
						return;
					}
				}
			}
		}
	}

	public function generateRouteEvent($route)
	{
		if (is_object($route) && $route instanceof Closure)
		{
			$this->handleClosure($route);
		} else if (is_string($route)) {
			$this->handleString($route);
		} else {
			throw new \Exception("Router: Cannot determain variable type of route");
		}
	}

	protected function handleClosure($route)
	{
		Events::create(array(
			'title' => 'application.route',
			'event' => $route
		));
	}

	protected function handleString($route)
	{
		Registry::set('application.controller.path', $this->resolveController($route));

		Events::create(array(
			'title' => 'application.route',
			'event' => function () {
				$action = Registry::get('application.controller.path');

				$route = new $action['controller'];
				$route->$action['method']();
			}
		));
	}

	protected function resolveController($route)
	{
		$pieces = explode('@', $route);

		return array(
			'controller' => $pieces[0],
			'method' => $pieces[1]
		);
	}
}