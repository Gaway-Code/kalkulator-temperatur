CREATE TABLE `calculations` (
  `id_calculations` int(11) NOT NULL,
  `value_input` float NOT NULL,
  `input_temp_unit` char(20) COLLATE utf8_bin NOT NULL,
  `output_temp_unit` char(20) COLLATE utf8_bin NOT NULL,
  `value_output` float NOT NULL,
  `date` datetime NOT NULL,
  `ip` varchar(16) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

ALTER TABLE `calculations`
  ADD PRIMARY KEY (`id_calculations`);


ALTER TABLE `calculations`
  MODIFY `id_calculations` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

