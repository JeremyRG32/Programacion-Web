<?php
class base
{
    public $id = "";
    public function __construct($data = [])
    {
        if (is_object($data)) {
            $data = (array)$data;
        }
        foreach ($data as $key => $value) {

            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }
}

class character extends base
{
    public $name = "";
    public $lastname = "";
    public $birthdate = "";
    public $age = 0;
    public $img = "";
    public $job = "";
    public $exp = 0;

    public function __construct($data = [], $img = null)
    {
        if (is_object($data)) {
            $data = (array)$data;
        }
        foreach ($data as $key => $value) {

            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
        if ($img) {
            $this->img = $img;
        }
    }
}
class job extends base
{
    public $name = "";
    public $category = "";
    public $salary = 0;
}
