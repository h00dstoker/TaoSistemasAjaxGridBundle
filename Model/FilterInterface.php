<?php

namespace TaoSistemas\AjaxGridBundle\Manager;

class FilterInterface
{
    /**
     * Returns the QueryBuilder that will be used to filter the results.
     * @return QueryBuilder
     */
    public function getQueryBuilder();
}