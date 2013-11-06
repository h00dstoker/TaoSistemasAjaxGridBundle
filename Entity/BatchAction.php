<?php

namespace TaoSistemas\AjaxGridBundle\Entity;

class BatchAction
{
    /**
     * Title of the batch action;
     * @var string
     */
    protected $title;

    /**
     * Route to controller that will process the operation.
     * @var string
     */
    protected $route;

    /**
     * Parameters of route to controller that will process the operation.
     * @var string
     */
    protected $routeParams;

    public function __construct($title, $route, $routeParams)
    {
        $this->title = $title;
        $this->route = $route;
        $this->routeParams = $routeParams;
    }

    /**
     * Gets the title of the batch action;.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title of the batch action;.
     *
     * @param string $title the title
     *
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }


    /**
     * Gets the Route to controller that will process the operation..
     *
     * @return string
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * Sets the Route to controller that will process the operation..
     *
     * @param string $route the route
     *
     * @return self
     */
    public function setRoute($route)
    {
        $this->route = $route;

        return $this;
    }

    /**
     * Gets the Parameters of route to controller that will process the operation..
     *
     * @return string
     */
    public function getRouteParams()
    {
        return $this->routeParams;
    }

    /**
     * Sets the Parameters of route to controller that will process the operation..
     *
     * @param string $routeParams the route params
     *
     * @return self
     */
    public function setRouteParams($routeParams)
    {
        $this->routeParams = $routeParams;

        return $this;
    }
}
