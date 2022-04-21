<?php
require_once 'consts.php';
class FahrenheitConvert
{
    public $value;
    public $tempUnitOutput;

    public function __construct(float $value_, string $tempUnitOutput_)
    {
        $this->value = $value_;
        $this->tempUnitOutput = $tempUnitOutput_;
    }
    public function convert(){
        switch ($this->tempUnitOutput){ //check the output unit
            case CELSIUS:
                return $this->toCelsius();
            case KELVIN:
                return $this->toKelvin();
            default:
                return "Nie uzupełniłeś jednostek";

        }
    }

    public function toCelsius(): float //convert temp to Celsius
    {
        return ($this->value - 32) / 1.8000;

    }
    public function toKelvin(): float //convert temp to Kelvin
    {
        return ($this->value - 32) / 1.8000 + 273.15;
    }
    public function __destruct() //destruct object
    {
        ;
    }

}