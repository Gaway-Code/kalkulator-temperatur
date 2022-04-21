<?php
require_once 'consts.php';
class KelvinConvert
{
    public $value;
    public $tempUnitOutput;

    public function __construct(float $value_, string $tempUnitOutput_)
    {
        $this->value = $value_;
        $this->tempUnitOutput = $tempUnitOutput_;
    }

    public function convert()
    {
        switch ($this->tempUnitOutput) { //check the output unit
            case CELSIUS:
                return $this->toCelsius();
            case FAHRENHEIT:
                return $this->toFahrenheit();
            default:
                return "Nie uzupełniłeś jednostek";
        }

    }

    public function toCelsius(): float //convert temp to Celsius
    {
        return $this->value - 273.15;

    }

    public function toFahrenheit(): float //convert temp to Fahrenheit
    {
        return ($this->value - 273.15) * 1.8000 + 32.00;
    }
    public function __destruct() //destruct object
    {
        ;
    }
}