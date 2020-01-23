-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10-Set-2015 às 02:00
-- Versão do servidor: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hva_humhub`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `ip_address` varchar(16) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `user_agent` varchar(120) CHARACTER SET latin1 NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('46d3b69ec7877d06ff4a01d78d4fbb70', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0', 1441842844, 'a:3:{s:9:"user_data";s:0:"";s:6:"result";a:4:{s:7:"usuario";a:8:{s:6:"usu_id";s:1:"1";s:10:"usu_gru_id";s:1:"1";s:8:"usu_nome";s:7:"Adriano";s:9:"usu_email";s:24:"adriano.savoir@gmail.com";s:9:"usu_senha";s:40:"8c4706aae7c89352d61a0bb4ff7ed6bd059c0917";s:11:"usu_created";s:19:"2013-12-07 23:17:06";s:10:"usu_delete";s:1:"1";s:15:"usu_data_expira";s:10:"0000-00-00";}s:5:"grupo";a:4:{s:6:"gru_id";s:1:"1";s:8:"gru_nome";s:5:"Admin";s:11:"gru_created";s:19:"2013-12-07 12:59:04";s:10:"gru_delete";s:1:"1";}s:7:"modulos";a:2:{i:0;a:8:{s:6:"mod_id";s:1:"2";s:8:"mod_nome";s:7:"Modulos";s:9:"mod_alias";s:12:"admin/modulo";s:9:"mod_ordem";s:1:"1";s:11:"mod_visible";s:1:"1";s:10:"gfp_per_id";s:1:"1";s:10:"gfp_gru_id";s:1:"1";s:15:"funcionalidades";a:4:{i:0;a:6:{s:6:"fun_id";s:1:"2";s:10:"fun_mod_id";s:1:"2";s:8:"fun_nome";s:8:"Cadastro";s:9:"fun_alias";s:12:"admin/modulo";s:9:"fun_ordem";s:1:"1";s:11:"fun_visible";s:1:"1";}i:1;a:6:{s:6:"fun_id";s:2:"10";s:10:"fun_mod_id";s:1:"2";s:8:"fun_nome";s:15:"Funcionalidades";s:9:"fun_alias";s:20:"admin/funcionalidade";s:9:"fun_ordem";s:1:"2";s:11:"fun_visible";s:1:"1";}i:2;a:6:{s:6:"fun_id";s:2:"12";s:10:"fun_mod_id";s:1:"2";s:8:"fun_nome";s:16:"Outra Controller";s:9:"fun_alias";s:21:"admin/outracontroller";s:9:"fun_ordem";s:1:"3";s:11:"fun_visible";s:1:"1";}i:3;a:6:{s:6:"fun_id";s:2:"11";s:10:"fun_mod_id";s:1:"2";s:8:"fun_nome";s:18:"Outra Controller 2";s:9:"fun_alias";s:22:"admin/outracontroller2";s:9:"fun_ordem";s:1:"4";s:11:"fun_visible";s:1:"1";}}}i:1;a:8:{s:6:"mod_id";s:1:"1";s:8:"mod_nome";s:15:"Configurações";s:9:"mod_alias";s:18:"admin/configuracao";s:9:"mod_ordem";s:1:"2";s:11:"mod_visible";s:1:"1";s:10:"gfp_per_id";s:1:"1";s:10:"gfp_gru_id";s:1:"1";s:15:"funcionalidades";a:3:{i:0;a:6:{s:6:"fun_id";s:1:"3";s:10:"fun_mod_id";s:1:"1";s:8:"fun_nome";s:6:"Grupos";s:9:"fun_alias";s:11:"admin/grupo";s:9:"fun_ordem";s:1:"1";s:11:"fun_visible";s:1:"1";}i:1;a:6:{s:6:"fun_id";s:1:"1";s:10:"fun_mod_id";s:1:"1";s:8:"fun_nome";s:9:"Usuários";s:9:"fun_alias";s:13:"admin/usuario";s:9:"fun_ordem";s:1:"2";s:11:"fun_visible";s:1:"1";}i:2;a:6:{s:6:"fun_id";s:1:"7";s:10:"fun_mod_id";s:1:"1";s:8:"fun_nome";s:11:"Permissões";s:9:"fun_alias";s:15:"admin/permissao";s:9:"fun_ordem";s:1:"3";s:11:"fun_visible";s:1:"1";}}}}s:21:"modAndFunAndPerAndGru";a:2:{i:0;a:6:{s:6:"mod_id";s:1:"2";s:8:"mod_nome";s:7:"Modulos";s:9:"mod_alias";s:12:"admin/modulo";s:9:"mod_ordem";s:1:"1";s:11:"mod_visible";s:1:"1";s:15:"funcionalidades";a:4:{i:0;a:7:{s:6:"fun_id";s:1:"2";s:10:"fun_mod_id";s:1:"2";s:8:"fun_nome";s:8:"Cadastro";s:9:"fun_alias";s:12:"admin/modulo";s:9:"fun_ordem";s:1:"1";s:11:"fun_visible";s:1:"1";s:10:"permissoes";a:4:{i:0;a:6:{s:6:"per_id";s:1:"1";s:8:"per_nome";s:6:"listar";s:6:"gru_id";s:1:"1";s:8:"gru_nome";s:5:"Admin";s:11:"gru_created";s:19:"2013-12-07 12:59:04";s:10:"gru_delete";s:1:"1";}i:1;a:6:{s:6:"per_id";s:1:"2";s:8:"per_nome";s:6:"editar";s:6:"gru_id";s:1:"1";s:8:"gru_nome";s:5:"Admin";s:11:"gru_created";s:19:"2013-12-07 12:59:04";s:10:"gru_delete";s:1:"1";}i:2;a:6:{s:6:"per_id";s:1:"3";s:8:"per_nome";s:7:"remover";s:6:"gru_id";s:1:"1";s:8:"gru_nome";s:5:"Admin";s:11:"gru_created";s:19:"2013-12-07 12:59:04";s:10:"gru_delete";s:1:"1";}i:3;a:6:{s:6:"per_id";s:1:"4";s:8:"per_nome";s:5:"criar";s:6:"gru_id";s:1:"1";s:8:"gru_nome";s:5:"Admin";s:11:"gru_created";s:19:"2013-12-07 12:59:04";s:10:"gru_delete";s:1:"1";}}}i:1;a:7:{s:6:"fun_id";s:2:"10";s:10:"fun_mod_id";s:1:"2";s:8:"fun_nome";s:15:"Funcionalidades";s:9:"fun_alias";s:20:"admin/funcionalidade";s:9:"fun_ordem";s:1:"2";s:11:"fun_visible";s:1:"1";s:10:"permissoes";a:4:{i:0;a:6:{s:6:"per_id";s:1:"1";s:8:"per_nome";s:6:"listar";s:6:"gru_id";s:1:"1";s:8:"gru_nome";s:5:"Admin";s:11:"gru_created";s:19:"2013-12-07 12:59:04";s:10:"gru_delete";s:1:"1";}i:1;a:6:{s:6:"per_id";s:1:"2";s:8:"per_nome";s:6:"editar";s:6:"gru_id";s:1:"1";s:8:"gru_nome";s:5:"Admin";s:11:"gru_created";s:19:"2013-12-07 12:59:04";s:10:"gru_delete";s:1:"1";}i:2;a:6:{s:6:"per_id";s:1:"3";s:8:"per_nome";s:7:"remover";s:6:"gru_id";s:1:"1";s:8:"gru_nome";s:5:"Admin";s:11:"gru_created";s:19:"2013-12-07 12:59:04";s:10:"gru_delete";s:1:"1";}i:3;a:6:{s:6:"per_id";s:1:"4";s:8:"per_nome";s:5:"criar";s:6:"gru_id";s:1:"1";s:8:"gru_nome";s:5:"Admin";s:11:"gru_created";s:19:"2013-12-07 12:59:04";s:10:"gru_delete";s:1:"1";}}}i:2;a:7:{s:6:"fun_id";s:2:"12";s:10:"fun_mod_id";s:1:"2";s:8:"fun_nome";s:16:"Outra Controller";s:9:"fun_alias";s:21:"admin/outracontroller";s:9:"fun_ordem";s:1:"3";s:11:"fun_visible";s:1:"1";s:10:"permissoes";a:5:{i:0;a:6:{s:6:"per_id";s:1:"1";s:8:"per_nome";s:6:"listar";s:6:"gru_id";s:1:"1";s:8:"gru_nome";s:5:"Admin";s:11:"gru_created";s:19:"2013-12-07 12:59:04";s:10:"gru_delete";s:1:"1";}i:1;a:6:{s:6:"per_id";s:1:"2";s:8:"per_nome";s:6:"editar";s:6:"gru_id";s:1:"1";s:8:"gru_nome";s:5:"Admin";s:11:"gru_created";s:19:"2013-12-07 12:59:04";s:10:"gru_delete";s:1:"1";}i:2;a:6:{s:6:"per_id";s:1:"3";s:8:"per_nome";s:7:"remover";s:6:"gru_id";s:1:"1";s:8:"gru_nome";s:5:"Admin";s:11:"gru_created";s:19:"2013-12-07 12:59:04";s:10:"gru_delete";s:1:"1";}i:3;a:6:{s:6:"per_id";s:1:"4";s:8:"per_nome";s:5:"criar";s:6:"gru_id";s:1:"1";s:8:"gru_nome";s:5:"Admin";s:11:"gru_created";s:19:"2013-12-07 12:59:04";s:10:"gru_delete";s:1:"1";}i:4;a:6:{s:6:"per_id";s:1:"1";s:8:"per_nome";s:6:"listar";s:6:"gru_id";s:1:"2";s:8:"gru_nome";s:11:"Colaborador";s:11:"gru_created";s:19:"2013-08-06 17:29:36";s:10:"gru_delete";s:1:"1";}}}i:3;a:7:{s:6:"fun_id";s:2:"11";s:10:"fun_mod_id";s:1:"2";s:8:"fun_nome";s:18:"Outra Controller 2";s:9:"fun_alias";s:22:"admin/outracontroller2";s:9:"fun_ordem";s:1:"4";s:11:"fun_visible";s:1:"1";s:10:"permissoes";a:4:{i:0;a:6:{s:6:"per_id";s:1:"1";s:8:"per_nome";s:6:"listar";s:6:"gru_id";s:1:"1";s:8:"gru_nome";s:5:"Admin";s:11:"gru_created";s:19:"2013-12-07 12:59:04";s:10:"gru_delete";s:1:"1";}i:1;a:6:{s:6:"per_id";s:1:"2";s:8:"per_nome";s:6:"editar";s:6:"gru_id";s:1:"1";s:8:"gru_nome";s:5:"Admin";s:11:"gru_created";s:19:"2013-12-07 12:59:04";s:10:"gru_delete";s:1:"1";}i:2;a:6:{s:6:"per_id";s:1:"3";s:8:"per_nome";s:7:"remover";s:6:"gru_id";s:1:"1";s:8:"gru_nome";s:5:"Admin";s:11:"gru_created";s:19:"2013-12-07 12:59:04";s:10:"gru_delete";s:1:"1";}i:3;a:6:{s:6:"per_id";s:1:"4";s:8:"per_nome";s:5:"criar";s:6:"gru_id";s:1:"1";s:8:"gru_nome";s:5:"Admin";s:11:"gru_created";s:19:"2013-12-07 12:59:04";s:10:"gru_delete";s:1:"1";}}}}}i:1;a:6:{s:6:"mod_id";s:1:"1";s:8:"mod_nome";s:15:"Configurações";s:9:"mod_alias";s:18:"admin/configuracao";s:9:"mod_ordem";s:1:"2";s:11:"mod_visible";s:1:"1";s:15:"funcionalidades";a:3:{i:0;a:7:{s:6:"fun_id";s:1:"3";s:10:"fun_mod_id";s:1:"1";s:8:"fun_nome";s:6:"Grupos";s:9:"fun_alias";s:11:"admin/grupo";s:9:"fun_ordem";s:1:"1";s:11:"fun_visible";s:1:"1";s:10:"permissoes";a:4:{i:0;a:6:{s:6:"per_id";s:1:"1";s:8:"per_nome";s:6:"listar";s:6:"gru_id";s:1:"1";s:8:"gru_nome";s:5:"Admin";s:11:"gru_created";s:19:"2013-12-07 12:59:04";s:10:"gru_delete";s:1:"1";}i:1;a:6:{s:6:"per_id";s:1:"2";s:8:"per_nome";s:6:"editar";s:6:"gru_id";s:1:"1";s:8:"gru_nome";s:5:"Admin";s:11:"gru_created";s:19:"2013-12-07 12:59:04";s:10:"gru_delete";s:1:"1";}i:2;a:6:{s:6:"per_id";s:1:"3";s:8:"per_nome";s:7:"remover";s:6:"gru_id";s:1:"1";s:8:"gru_nome";s:5:"Admin";s:11:"gru_created";s:19:"2013-12-07 12:59:04";s:10:"gru_delete";s:1:"1";}i:3;a:6:{s:6:"per_id";s:1:"4";s:8:"per_nome";s:5:"criar";s:6:"gru_id";s:1:"1";s:8:"gru_nome";s:5:"Admin";s:11:"gru_created";s:19:"2013-12-07 12:59:04";s:10:"gru_delete";s:1:"1";}}}i:1;a:7:{s:6:"fun_id";s:1:"1";s:10:"fun_mod_id";s:1:"1";s:8:"fun_nome";s:9:"Usuários";s:9:"fun_alias";s:13:"admin/usuario";s:9:"fun_ordem";s:1:"2";s:11:"fun_visible";s:1:"1";s:10:"permissoes";a:5:{i:0;a:6:{s:6:"per_id";s:1:"1";s:8:"per_nome";s:6:"listar";s:6:"gru_id";s:1:"1";s:8:"gru_nome";s:5:"Admin";s:11:"gru_created";s:19:"2013-12-07 12:59:04";s:10:"gru_delete";s:1:"1";}i:1;a:6:{s:6:"per_id";s:1:"2";s:8:"per_nome";s:6:"editar";s:6:"gru_id";s:1:"1";s:8:"gru_nome";s:5:"Admin";s:11:"gru_created";s:19:"2013-12-07 12:59:04";s:10:"gru_delete";s:1:"1";}i:2;a:6:{s:6:"per_id";s:1:"3";s:8:"per_nome";s:7:"remover";s:6:"gru_id";s:1:"1";s:8:"gru_nome";s:5:"Admin";s:11:"gru_created";s:19:"2013-12-07 12:59:04";s:10:"gru_delete";s:1:"1";}i:3;a:6:{s:6:"per_id";s:1:"4";s:8:"per_nome";s:5:"criar";s:6:"gru_id";s:1:"1";s:8:"gru_nome";s:5:"Admin";s:11:"gru_created";s:19:"2013-12-07 12:59:04";s:10:"gru_delete";s:1:"1";}i:4;a:6:{s:6:"per_id";s:1:"1";s:8:"per_nome";s:6:"listar";s:6:"gru_id";s:1:"2";s:8:"gru_nome";s:11:"Colaborador";s:11:"gru_created";s:19:"2013-08-06 17:29:36";s:10:"gru_delete";s:1:"1";}}}i:2;a:7:{s:6:"fun_id";s:1:"7";s:10:"fun_mod_id";s:1:"1";s:8:"fun_nome";s:11:"Permissões";s:9:"fun_alias";s:15:"admin/permissao";s:9:"fun_ordem";s:1:"3";s:11:"fun_visible";s:1:"1";s:10:"permissoes";a:4:{i:0;a:6:{s:6:"per_id";s:1:"1";s:8:"per_nome";s:6:"listar";s:6:"gru_id";s:1:"1";s:8:"gru_nome";s:5:"Admin";s:11:"gru_created";s:19:"2013-12-07 12:59:04";s:10:"gru_delete";s:1:"1";}i:1;a:6:{s:6:"per_id";s:1:"2";s:8:"per_nome";s:6:"editar";s:6:"gru_id";s:1:"1";s:8:"gru_nome";s:5:"Admin";s:11:"gru_created";s:19:"2013-12-07 12:59:04";s:10:"gru_delete";s:1:"1";}i:2;a:6:{s:6:"per_id";s:1:"3";s:8:"per_nome";s:7:"remover";s:6:"gru_id";s:1:"1";s:8:"gru_nome";s:5:"Admin";s:11:"gru_created";s:19:"2013-12-07 12:59:04";s:10:"gru_delete";s:1:"1";}i:3;a:6:{s:6:"per_id";s:1:"4";s:8:"per_nome";s:5:"criar";s:6:"gru_id";s:1:"1";s:8:"gru_nome";s:5:"Admin";s:11:"gru_created";s:19:"2013-12-07 12:59:04";s:10:"gru_delete";s:1:"1";}}}}}}}s:6:"logged";b:1;}');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_funcionalidade`
--

CREATE TABLE IF NOT EXISTS `tbl_funcionalidade` (
`fun_id` int(10) unsigned NOT NULL,
  `fun_mod_id` int(10) unsigned NOT NULL,
  `fun_nome` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `fun_alias` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `fun_ordem` tinyint(1) unsigned NOT NULL,
  `fun_visible` tinyint(1) unsigned NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tbl_funcionalidade`
--

INSERT INTO `tbl_funcionalidade` (`fun_id`, `fun_mod_id`, `fun_nome`, `fun_alias`, `fun_ordem`, `fun_visible`) VALUES
(1, 1, 'Usuários', 'admin/usuario', 2, 1),
(2, 2, 'Cadastro', 'admin/modulo', 1, 1),
(3, 1, 'Grupos', 'admin/grupo', 1, 1),
(7, 1, 'Permissões', 'admin/permissao', 3, 1),
(10, 2, 'Funcionalidades', 'admin/funcionalidade', 2, 1),
(11, 2, 'Outra Controller 2', 'admin/outracontroller2', 4, 1),
(12, 2, 'Outra Controller', 'admin/outracontroller', 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_grupo`
--

CREATE TABLE IF NOT EXISTS `tbl_grupo` (
`gru_id` int(10) unsigned NOT NULL,
  `gru_nome` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `gru_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gru_delete` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tbl_grupo`
--

INSERT INTO `tbl_grupo` (`gru_id`, `gru_nome`, `gru_created`, `gru_delete`) VALUES
(1, 'Admin', '2013-12-07 14:59:04', 1),
(2, 'Colaborador', '2013-08-06 20:29:36', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_grupo_funcionalidade_permissao`
--

CREATE TABLE IF NOT EXISTS `tbl_grupo_funcionalidade_permissao` (
  `gfp_gru_id` int(10) unsigned NOT NULL,
  `gfp_fun_id` int(10) unsigned NOT NULL,
  `gfp_per_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tbl_grupo_funcionalidade_permissao`
--

INSERT INTO `tbl_grupo_funcionalidade_permissao` (`gfp_gru_id`, `gfp_fun_id`, `gfp_per_id`) VALUES
(1, 2, 1),
(1, 2, 2),
(1, 2, 3),
(1, 2, 4),
(1, 10, 2),
(1, 10, 4),
(1, 10, 3),
(1, 10, 1),
(1, 3, 2),
(1, 3, 4),
(1, 3, 3),
(1, 3, 1),
(1, 1, 2),
(1, 1, 4),
(1, 1, 3),
(1, 1, 1),
(2, 1, 1),
(1, 7, 2),
(1, 7, 4),
(1, 7, 3),
(1, 7, 1),
(1, 11, 4),
(1, 11, 2),
(1, 11, 1),
(1, 11, 3),
(1, 12, 4),
(1, 12, 2),
(1, 12, 1),
(1, 12, 3),
(2, 12, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_modulo`
--

CREATE TABLE IF NOT EXISTS `tbl_modulo` (
`mod_id` int(10) unsigned NOT NULL,
  `mod_nome` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `mod_alias` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `mod_ordem` tinyint(1) unsigned NOT NULL,
  `mod_visible` tinyint(1) unsigned NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tbl_modulo`
--

INSERT INTO `tbl_modulo` (`mod_id`, `mod_nome`, `mod_alias`, `mod_ordem`, `mod_visible`) VALUES
(1, 'Configurações', 'admin/configuracao', 2, 1),
(2, 'Modulos', 'admin/modulo', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_permissao`
--

CREATE TABLE IF NOT EXISTS `tbl_permissao` (
`per_id` int(10) unsigned NOT NULL,
  `per_nome` char(16) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tbl_permissao`
--

INSERT INTO `tbl_permissao` (`per_id`, `per_nome`) VALUES
(1, 'listar'),
(2, 'editar'),
(3, 'remover'),
(4, 'criar');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_usuario`
--

CREATE TABLE IF NOT EXISTS `tbl_usuario` (
`usu_id` int(10) unsigned NOT NULL,
  `usu_gru_id` int(10) unsigned NOT NULL,
  `usu_nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `usu_email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `usu_senha` varchar(40) CHARACTER SET latin1 NOT NULL,
  `usu_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usu_delete` tinyint(1) NOT NULL DEFAULT '1',
  `usu_data_expira` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`usu_id`, `usu_gru_id`, `usu_nome`, `usu_email`, `usu_senha`, `usu_created`, `usu_delete`, `usu_data_expira`) VALUES
(1, 1, 'Adriano', 'adriano.savoir@gmail.com', '8c4706aae7c89352d61a0bb4ff7ed6bd059c0917', '2013-12-08 01:17:06', 1, '0000-00-00'),
(2, 2, 'Usuário Operador', 'adrianomotos@ymail.com', '8c4706aae7c89352d61a0bb4ff7ed6bd059c0917', '2013-12-12 17:27:49', 1, '2014-12-12'),
(6, 4, 'Teste 30maio', 'teste30maio@ciadearte.com', '29a2ec116ff3dbdcf11deec84ac6deaebc3cd595', '2014-05-31 05:29:15', 0, '2014-12-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
 ADD PRIMARY KEY (`session_id`), ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `tbl_funcionalidade`
--
ALTER TABLE `tbl_funcionalidade`
 ADD PRIMARY KEY (`fun_id`);

--
-- Indexes for table `tbl_grupo`
--
ALTER TABLE `tbl_grupo`
 ADD PRIMARY KEY (`gru_id`);

--
-- Indexes for table `tbl_modulo`
--
ALTER TABLE `tbl_modulo`
 ADD PRIMARY KEY (`mod_id`);

--
-- Indexes for table `tbl_permissao`
--
ALTER TABLE `tbl_permissao`
 ADD PRIMARY KEY (`per_id`);

--
-- Indexes for table `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
 ADD PRIMARY KEY (`usu_id`), ADD UNIQUE KEY `usu_email` (`usu_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_funcionalidade`
--
ALTER TABLE `tbl_funcionalidade`
MODIFY `fun_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbl_grupo`
--
ALTER TABLE `tbl_grupo`
MODIFY `gru_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_modulo`
--
ALTER TABLE `tbl_modulo`
MODIFY `mod_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_permissao`
--
ALTER TABLE `tbl_permissao`
MODIFY `per_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
MODIFY `usu_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
