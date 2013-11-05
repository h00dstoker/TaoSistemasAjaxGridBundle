<?php

namespace TaoSistemas\AjaxGridBundle\Entity;

class BatchAction
{
    /**
     * Name of the batch action;
     * @var string
     */
    protected $name;

    /**
     * Route to controller that will process the operation.
     * @var string
     */
    protected $processingRoute;

    /**
     * Parameters of route to controller that will process the operation.
     * @var string
     */
    protected $processingRouteParams;

    public function __construct($name, $processingRoute, $processingRouteParams)
    {
        $this->name = $name;
        $this->processingRoute;
        $this->processingRouteParams = $processingRouteParams;
    }

    /**
     * Gets the Name of the batch action;.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the Name of the batch action;.
     *
     * @param string $name the name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the Route to controller that will process the operation..
     *
     * @return string
     */
    public function getProcessingRoute()
    {
        return $this->processingRoute;
    }

    /**
     * Sets the Route to controller that will process the operation..
     *
     * @param string $processingRoute the processing route
     *
     * @return self
     */
    public function setProcessingRoute($processingRoute)
    {
        $this->processingRoute = $processingRoute;

        return $this;
    }

    /**
     * Gets the Parameters of route to controller that will process the operation..
     *
     * @return string
     */
    public function getProcessingRouteParams()
    {
        return $this->processingRouteParams;
    }
}
