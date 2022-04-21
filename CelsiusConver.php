<?php
require_once 'consts.php';
class CelsiusConver
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
            case FAHRENHEIT:
                return $this->toFahrenheit();
            case KELVIN:
                return $this->toKelvin();
            default:
                return "Nie uzupełniłeś jednostek";

        }
    }

    public function toFahrenheit(): float //convert temp to Fahrenheit
    {
            return ($this->value * 9 / 5) + 32;

    }
    public function toKelvin(): float //convert temp to Kelvin
    {
        return $this->value + 273.15;
    }
    public function __destruct() //destruct object
    {
        ;
    }

}