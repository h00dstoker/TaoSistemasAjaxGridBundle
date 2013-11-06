<?php

namespace TaoSistemas\AjaxGridBundle\Entity;

class Column
{
    protected $title;

    /**
     * Column name of field with query alias, if exists (eg: u.name).
     * @var string
     */
    protected $columnName;

    protected $htmlAttributes;

    protected $size;

    public function __construct($title, $columnName = null, $htmlAttributes = array(), $size = null)
    {
        $this->title = $title;
        $this->columnName = $columnName;
        $this->htmlAttributes = $htmlAttributes;
        $this->size = $size;
    }

    /**
     * Gets the value of name.
     *
     * @return mixed
     */
    public function getColumnName()
    {
        return $this->columnName;
    }

    /**
     * Sets the value of name.
     *
     * @param mixed $columnName the name
     *
     * @return self
     */
    public function setColumnName($columnName)
    {
        $this->name = $columnName;

        return $this;
    }

    /**
     * Gets the value of title.
     *
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the value of title.
     *
     * @param mixed $title the title
     *
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Gets the value of htmlAttributes.
     *
     * @return mixed
     */
    public function getHtmlAttributes()
    {
        return $this->htmlAttributes;
    }

    /**
     * Sets the value of htmlAttributes.
     *
     * @param mixed $htmlAttributes the html attributes
     *
     * @return self
     */
    public function setHtmlAttributes($htmlAttributes)
    {
        $this->htmlAttributes = $htmlAttributes;

        return $this;
    }

    /**
     * Gets the value of size.
     *
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Sets the value of size.
     *
     * @param mixed $size the size
     *
     * @return self
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }
}
