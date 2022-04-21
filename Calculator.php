<?php
require_once 'consts.php';
require_once 'CelsiusConver.php';
require_once 'FahrenheitConvert.php';
require_once 'KelvinConvert.php';

class Calculator
{
    public $value;
    public $tempUnitInput;
    public $tempUnitOutput;
    public $result;


    public function __construct($value_, $tempUnitInput_, $tempUnitOutput_) //get input data
    {
        $this->value = $value_;
        $this->tempUnitInput = $tempUnitInput_;
        $this->tempUnitOutput = $tempUnitOutput_;
    }

    public function calc()
    {
        if(!is_numeric($this->value)){ //check if value is a numbers
            return "Kalkulator pracuje na liczbach ;) ";
        }else if (strlen($this->value)>10){ //check if amount of signs is more than 10
            return "kalkulator przyjmuje maksymalnie 10 cyfr";
        }else{
        switch ($this->tempUnitInput) { //check the input unit
            case CELSIUS:
                $c = new CelsiusConver($this->value, $this->tempUnitOutput);
                $this->result = $c->convert();
                return round($this->result,2); //result rounded to decimal places
            case FAHRENHEIT:
                $f = new FahrenheitConvert($this->value, $this->tempUnitOutput);
                $this->result = $f->convert();
                return round($this->result,2); //result rounded to decimal places
            case KELVIN:
                $k = new KelvinConvert($this->value, $this->tempUnitOutput);
                $this->result = $k->convert();
                return round($this->result,2); //result rounded to decimal places
            default:
                return "Nie uzupełniłeś jednostek"; //if user do does not choose unit
            }
        }
    }

    public function info(): string // print information about the object
    {
        return "Pobrana wartość: " . $this->value . " przeliczone z " . $this->tempUnitInput . " na " . $this->tempUnitOutput;
    }

    public function __destruct() //destruct object
    {
        ;
    }
}