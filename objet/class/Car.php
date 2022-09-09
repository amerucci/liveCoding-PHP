<?php

class Car {

    public $name;
    public $model;
    public $year;
    
    /**
     * __construct
     *
     * @param  mixed $name
     * @param  mixed $model
     * @param  mixed $year
     * @return void
     */
    public function __construct($param1, $param2, $param3){
        $this->name = $param1;
        $this->model = $param2;
        $this->year = $param3;

    }

    public function congratulations(){
        echo "Félicitations tu as acheté une ".$this->name." ".$this->model." de ".$this->year."(".$this->calculate().")";
    }

    public function calculate(){
        return (2022 - $this->year);
    }

}