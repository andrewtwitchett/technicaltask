<?php

namespace Data;

class User
{
    private $name;
    private $active;
    private $value;

    /**
     * User constructor.
     * @param $name
     * @param $active
     * @param $value
     */
    public function __construct($name, $active, $value)
    {
        $this->name = $name;
        if ($active === "true" || $active === true || $active === 1) {
            $this->active = true;
        } else {
            $this->active = false;
        }
        if (is_numeric($value)) {
            $this->value = $value;
        } else {
            $this->value = 0;
        }
    }

    /**
     * @return bool
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }
}
