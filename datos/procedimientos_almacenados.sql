DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_cambios_babyline`(IN `cmodel` VARCHAR(64), IN `cean` VARCHAR(14))
update cambios SET up_babyline = 1 WHERE model = cmodel and ean = cean$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_cambios_happy`(IN `cmodel` VARCHAR(64), IN `cean` VARCHAR(14))
update cambios SET up_happy = 1 WHERE model = cmodel and ean = cean$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_cambios_ropadecu`(IN `cmodel` VARCHAR(64), IN `cean` VARCHAR(14))
update cambios SET up_ropadecu = 1 WHERE model = cmodel and ean = cean$$
DELIMITER ;
