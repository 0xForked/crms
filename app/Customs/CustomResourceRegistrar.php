<?php

namespace App\Customs;

use Illuminate\Routing\ResourceRegistrar;

class CustomResourceRegistrar extends ResourceRegistrar
{

    /**
     * The default actions for a resourceful controller.
     *
     * @var array
     */
    protected $resourceDefaults = [
        'index', 'create', 'store', 'show',
        'edit', 'update', 'destroy', 'status', 'restore'
    ];

    /**
     * Add the data method for a resourceful route.
     *
     * @param string $name
     * @param string $base
     * @param string $controller
     * @param array $options
     * @return \Illuminate\Routing\Route
     */
    protected function addResourceStatus($name, $base, $controller, $options)
    {
        $name = $this->getShallowName($name, $options);

        $uri = $this->getResourceUri($name).'/{'.$base.'}/status';

        $action = $this->getResourceAction($name, $controller, 'status', $options);

        return $this->router->match(['PUT', 'PATCH'], $uri, $action);
    }

    /**
     * Add the data method for a resourceful route.
     *
     * @param string $name
     * @param string $base
     * @param string $controller
     * @param array $options
     * @return \Illuminate\Routing\Route
     */
    protected function addResourceRestore($name, $base, $controller, $options)
    {
        $name = $this->getShallowName($name, $options);

        $uri = $this->getResourceUri($name).'/{'.$base.'}/restore';

        $action = $this->getResourceAction($name, $controller, 'restore', $options);

        return $this->router->match(['PUT', 'PATCH'], $uri, $action);
    }
}
