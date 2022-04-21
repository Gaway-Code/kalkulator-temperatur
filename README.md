
# Kalkulator temperatur

Aplikacja webowa służąca do konwersji temperatur na inne jednostki.

# Wymagania
- PHP 7
- Baza danych SQL (Testowane na mysql)

# Konfiguracja
- consts.php
```
const DB_HOST = "localhost";
const DB_USER = "calculator";
const DB_PASS = "";
const DB_NAME = "calculator";
```
# Struktura bazy danych
```
CREATE TABLE `calculations` (
  `id_calculations` int(11) NOT NULL,
  `value_input` float NOT NULL,
  `input_temp_unit` char(20) COLLATE utf8_bin NOT NULL,
  `output_temp_unit` char(20) COLLATE utf8_bin NOT NULL,
  `value_output` float NOT NULL,
  `date` datetime NOT NULL,
  `ip` varchar(16) COLLATE utf8_bin NOT NULL
) 
```
## Demo
- Kalkulator
  ![](https://i.ibb.co/M5pnnKs/1.png)
- Historia ostatnich działań
  ![](https://i.ibb.co/wdrK5Nz/history.png)
 - [demo](http://kalkulator.gaway.pl)

## License

[MIT](https://choosealicense.com/licenses/mit/)


## Author

- [@Gaway-code](https://github.com/Gaway-Code)
