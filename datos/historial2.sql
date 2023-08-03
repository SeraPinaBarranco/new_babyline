CREATE TABLE `historial2` (
  `id_historial` int(11) NOT NULL,
  `codigo_barra` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `codigo_interno` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `movimiento` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cantidad_anterior` int(11) NOT NULL,
  `cantidad_actualizada` int(11) NOT NULL,
  `fecha_actualizado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;