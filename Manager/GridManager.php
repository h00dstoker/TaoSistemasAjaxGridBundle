<?php

namespace TaoSistemas\AjaxGridBundle\Manager;

use TaoSistemas\AjaxGridBundle\Entity\Paginator;
use TaoSistemas\AjaxGridBundle\Entity\Filter;
use TaoSistemas\AjaxGridBundle\Entity\Grid;

class GridManager
{
    public function newGrid($query, $countColumn)
    {
        $paginator = new Paginator($query, $countColumn);
        $filter = new Filter();

        $grid = new Grid($paginator, $filter, $query);

        return $grid;
    }
}