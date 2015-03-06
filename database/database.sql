--
-- Base de datos: `myblog`
--

CREATE DATABASE IF NOT EXISTS `myblog`;
USE `myblog`;
 
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `created` datetime NOT NULL DEFAULT NOW(),
  `updated` datetime NOT NULL DEFAULT NOW(),
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_rol` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `created` datetime NOT NULL DEFAULT NOW(),
  `updated` datetime NOT NULL DEFAULT NOW(),
  PRIMARY KEY (`id_user`),
  INDEX (`id_rol`),
  FOREIGN KEY (`id_rol`) REFERENCES roles(`id_rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `content` text NOT NULL,
  `censured` tinyint(1) NOT NULL DEFAULT 0,
  `created` datetime NOT NULL DEFAULT NOW(),
  `updated` datetime NOT NULL DEFAULT NOW(),
  PRIMARY KEY (`id_post`),
  INDEX (`id_user`),
  FOREIGN KEY (`id_user`) REFERENCES users(`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

INSERT INTO `users` (`id_user`, `id_rol`, `name`, `pass`, `created`, `updated`) 
VALUES (1, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2015-03-03 16:10:12', '2015-03-03 16:10:12');