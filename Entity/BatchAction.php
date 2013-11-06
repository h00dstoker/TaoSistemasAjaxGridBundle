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
    protected $processingRoute;

    /**
     * Parameters of route to controller that will process the operation.
     * @var string
     */
    protected $processingRouteParams;

    public function __construct($title, $processingRoute, $processingRouteParams)
    {
        $this->title = $title;
        $this->processingRoute;
        $this->processingRouteParams = $processingRouteParams;
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
