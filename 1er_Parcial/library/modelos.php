<?php

class visit
{
    public $name;
    public $lastname;
    public $cedula;
    public $age;
    public $motive;
    public $date;

    function __construct($data = [])
    {
        if (is_object($data)) {
            $data = (array)$data;
        }
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
        if (empty($this->date)) {
            $tz = new DateTimeZone('America/Santo_Domingo');
            $this->date = (new DateTime('now', $tz))->format('Y-m-d H:i:s');
        }
    }
}
