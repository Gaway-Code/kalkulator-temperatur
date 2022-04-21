<?php
class History
{
    private $value;
    private $tempUnitInput;
    private $tempUnitOutput;
    private $result;
    private $date;
    private $ip;
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    public function __construct($value_,$tempUnitInput_,$tempUnitOutput_,$result_,$date_,$ip_)
    {
        $this->value=$value_;
        $this->tempUnitInput=$tempUnitInput_;
        $this->tempUnitOutput=$tempUnitOutput_;
        $this->result=$result_;
        $this->date=$date_;
        $this->ip=$ip_;
    }
    public function save()
    {
        try {
            $db = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8", $this->user, $this->pass, [ //create object PDO to connect to database
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION

            ]);

        } catch (PDOException $error) { //if it fails, write down error

            echo $error->getMessage();
            exit('Database error');

        }
        $query = $db->prepare('INSERT INTO calculations VALUES (NULL, :value_input,:input_temp_unit,:output_temp_unit,:value_output,:date,:ip)'); //create sql query
        $query->bindValue(':value_input', $this->value);
        $query->bindValue(':input_temp_unit',$this->tempUnitInput);
        $query->bindValue(':output_temp_unit',$this->tempUnitOutput);
        $query->bindValue(':value_output',$this->result);
        $query->bindValue(':date', $this->date);
        $query->bindValue(':ip',$this->ip);
        $query->execute();


    }
    public function add():string{
        return "Wartość wejsciowa: " . $this->value. " stopni ".$this->tempUnitInput . " na ". $this->result . " stopni " . $this->tempUnitOutput; //return date to session history
    }

    public function __destruct() //destruct object
    {
        ;
    }
}