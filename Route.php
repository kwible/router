<?php

namespace Flyer\Components\Router;

use Flyer\Components\Router\RouteBuilder;

class Route
{
	public static function get($uri, $action)
	{
		Router::addRoute("GET", $uri, $action);
	}

	public static function post($uri, $action)
	{
		Router::addRoute("POST", $uri, $action);
	}

	public static function update($uri, $action)
	{
		Router::addRoute("UPDATE", $uri, $action);
	}

	public static function delete($uri, $action)
	{
		Router::addRoute("DELETE", $uri, $action);
	}

	public static function any($uri, $action)
	{
		Router::addRoute("ANY", $uri, $action);
	}
}