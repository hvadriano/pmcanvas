-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 04/02/2020 às 17:33
-- Versão do servidor: 8.0.19
-- Versão do PHP: 7.2.24-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pmcanvas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0',
  `ip_address` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0',
  `user_agent` varchar(120) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `last_activity` int UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('1d309b198f3e046b0229b18ddfe0dc7a', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:72.0) Gecko/20100101 Firefox/72.0', 1580846146, 'a:3:{s:9:\"user_data\";s:0:\"\";s:6:\"logged\";b:1;s:6:\"result\";a:4:{s:7:\"usuario\";a:8:{s:6:\"usu_id\";s:1:\"1\";s:10:\"usu_gru_id\";s:1:\"1\";s:8:\"usu_nome\";s:7:\"Adriano\";s:9:\"usu_email\";s:24:\"adriano.savoir@gmail.com\";s:9:\"usu_senha\";s:40:\"8c4706aae7c89352d61a0bb4ff7ed6bd059c0917\";s:11:\"usu_created\";s:19:\"2013-12-07 23:17:06\";s:10:\"usu_delete\";s:1:\"1\";s:15:\"usu_data_expira\";s:10:\"0000-00-00\";}s:5:\"grupo\";a:4:{s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}s:7:\"modulos\";a:2:{i:0;a:8:{s:6:\"mod_id\";s:1:\"2\";s:8:\"mod_nome\";s:7:\"Modulos\";s:9:\"mod_alias\";s:12:\"admin/modulo\";s:9:\"mod_ordem\";s:1:\"1\";s:11:\"mod_visible\";s:1:\"1\";s:10:\"gfp_per_id\";s:1:\"1\";s:10:\"gfp_gru_id\";s:1:\"1\";s:15:\"funcionalidades\";a:4:{i:0;a:6:{s:6:\"fun_id\";s:1:\"2\";s:10:\"fun_mod_id\";s:1:\"2\";s:8:\"fun_nome\";s:8:\"Cadastro\";s:9:\"fun_alias\";s:12:\"admin/modulo\";s:9:\"fun_ordem\";s:1:\"1\";s:11:\"fun_visible\";s:1:\"1\";}i:1;a:6:{s:6:\"fun_id\";s:2:\"10\";s:10:\"fun_mod_id\";s:1:\"2\";s:8:\"fun_nome\";s:15:\"Funcionalidades\";s:9:\"fun_alias\";s:20:\"admin/funcionalidade\";s:9:\"fun_ordem\";s:1:\"2\";s:11:\"fun_visible\";s:1:\"1\";}i:2;a:6:{s:6:\"fun_id\";s:2:\"12\";s:10:\"fun_mod_id\";s:1:\"2\";s:8:\"fun_nome\";s:16:\"Outra Controller\";s:9:\"fun_alias\";s:21:\"admin/outracontroller\";s:9:\"fun_ordem\";s:1:\"3\";s:11:\"fun_visible\";s:1:\"1\";}i:3;a:6:{s:6:\"fun_id\";s:2:\"11\";s:10:\"fun_mod_id\";s:1:\"2\";s:8:\"fun_nome\";s:18:\"Outra Controller 2\";s:9:\"fun_alias\";s:22:\"admin/outracontroller2\";s:9:\"fun_ordem\";s:1:\"4\";s:11:\"fun_visible\";s:1:\"1\";}}}i:1;a:8:{s:6:\"mod_id\";s:1:\"1\";s:8:\"mod_nome\";s:15:\"Configurações\";s:9:\"mod_alias\";s:18:\"admin/configuracao\";s:9:\"mod_ordem\";s:1:\"2\";s:11:\"mod_visible\";s:1:\"1\";s:10:\"gfp_per_id\";s:1:\"1\";s:10:\"gfp_gru_id\";s:1:\"1\";s:15:\"funcionalidades\";a:3:{i:0;a:6:{s:6:\"fun_id\";s:1:\"3\";s:10:\"fun_mod_id\";s:1:\"1\";s:8:\"fun_nome\";s:6:\"Grupos\";s:9:\"fun_alias\";s:11:\"admin/grupo\";s:9:\"fun_ordem\";s:1:\"1\";s:11:\"fun_visible\";s:1:\"1\";}i:1;a:6:{s:6:\"fun_id\";s:1:\"1\";s:10:\"fun_mod_id\";s:1:\"1\";s:8:\"fun_nome\";s:9:\"Usuários\";s:9:\"fun_alias\";s:13:\"admin/usuario\";s:9:\"fun_ordem\";s:1:\"2\";s:11:\"fun_visible\";s:1:\"1\";}i:2;a:6:{s:6:\"fun_id\";s:1:\"7\";s:10:\"fun_mod_id\";s:1:\"1\";s:8:\"fun_nome\";s:11:\"Permissões\";s:9:\"fun_alias\";s:15:\"admin/permissao\";s:9:\"fun_ordem\";s:1:\"3\";s:11:\"fun_visible\";s:1:\"1\";}}}}s:21:\"modAndFunAndPerAndGru\";a:2:{i:0;a:6:{s:6:\"mod_id\";s:1:\"2\";s:8:\"mod_nome\";s:7:\"Modulos\";s:9:\"mod_alias\";s:12:\"admin/modulo\";s:9:\"mod_ordem\";s:1:\"1\";s:11:\"mod_visible\";s:1:\"1\";s:15:\"funcionalidades\";a:4:{i:0;a:7:{s:6:\"fun_id\";s:1:\"2\";s:10:\"fun_mod_id\";s:1:\"2\";s:8:\"fun_nome\";s:8:\"Cadastro\";s:9:\"fun_alias\";s:12:\"admin/modulo\";s:9:\"fun_ordem\";s:1:\"1\";s:11:\"fun_visible\";s:1:\"1\";s:10:\"permissoes\";a:4:{i:0;a:6:{s:6:\"per_id\";s:1:\"1\";s:8:\"per_nome\";s:6:\"listar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:1;a:6:{s:6:\"per_id\";s:1:\"2\";s:8:\"per_nome\";s:6:\"editar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:2;a:6:{s:6:\"per_id\";s:1:\"3\";s:8:\"per_nome\";s:7:\"remover\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:3;a:6:{s:6:\"per_id\";s:1:\"4\";s:8:\"per_nome\";s:5:\"criar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}}}i:1;a:7:{s:6:\"fun_id\";s:2:\"10\";s:10:\"fun_mod_id\";s:1:\"2\";s:8:\"fun_nome\";s:15:\"Funcionalidades\";s:9:\"fun_alias\";s:20:\"admin/funcionalidade\";s:9:\"fun_ordem\";s:1:\"2\";s:11:\"fun_visible\";s:1:\"1\";s:10:\"permissoes\";a:4:{i:0;a:6:{s:6:\"per_id\";s:1:\"2\";s:8:\"per_nome\";s:6:\"editar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:1;a:6:{s:6:\"per_id\";s:1:\"4\";s:8:\"per_nome\";s:5:\"criar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:2;a:6:{s:6:\"per_id\";s:1:\"3\";s:8:\"per_nome\";s:7:\"remover\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:3;a:6:{s:6:\"per_id\";s:1:\"1\";s:8:\"per_nome\";s:6:\"listar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}}}i:2;a:7:{s:6:\"fun_id\";s:2:\"12\";s:10:\"fun_mod_id\";s:1:\"2\";s:8:\"fun_nome\";s:16:\"Outra Controller\";s:9:\"fun_alias\";s:21:\"admin/outracontroller\";s:9:\"fun_ordem\";s:1:\"3\";s:11:\"fun_visible\";s:1:\"1\";s:10:\"permissoes\";a:5:{i:0;a:6:{s:6:\"per_id\";s:1:\"4\";s:8:\"per_nome\";s:5:\"criar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:1;a:6:{s:6:\"per_id\";s:1:\"2\";s:8:\"per_nome\";s:6:\"editar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:2;a:6:{s:6:\"per_id\";s:1:\"1\";s:8:\"per_nome\";s:6:\"listar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:3;a:6:{s:6:\"per_id\";s:1:\"3\";s:8:\"per_nome\";s:7:\"remover\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:4;a:6:{s:6:\"per_id\";s:1:\"1\";s:8:\"per_nome\";s:6:\"listar\";s:6:\"gru_id\";s:1:\"2\";s:8:\"gru_nome\";s:11:\"Colaborador\";s:11:\"gru_created\";s:19:\"2013-08-06 17:29:36\";s:10:\"gru_delete\";s:1:\"1\";}}}i:3;a:7:{s:6:\"fun_id\";s:2:\"11\";s:10:\"fun_mod_id\";s:1:\"2\";s:8:\"fun_nome\";s:18:\"Outra Controller 2\";s:9:\"fun_alias\";s:22:\"admin/outracontroller2\";s:9:\"fun_ordem\";s:1:\"4\";s:11:\"fun_visible\";s:1:\"1\";s:10:\"permissoes\";a:4:{i:0;a:6:{s:6:\"per_id\";s:1:\"4\";s:8:\"per_nome\";s:5:\"criar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:1;a:6:{s:6:\"per_id\";s:1:\"2\";s:8:\"per_nome\";s:6:\"editar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:2;a:6:{s:6:\"per_id\";s:1:\"1\";s:8:\"per_nome\";s:6:\"listar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:3;a:6:{s:6:\"per_id\";s:1:\"3\";s:8:\"per_nome\";s:7:\"remover\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}}}}}i:1;a:6:{s:6:\"mod_id\";s:1:\"1\";s:8:\"mod_nome\";s:15:\"Configurações\";s:9:\"mod_alias\";s:18:\"admin/configuracao\";s:9:\"mod_ordem\";s:1:\"2\";s:11:\"mod_visible\";s:1:\"1\";s:15:\"funcionalidades\";a:3:{i:0;a:7:{s:6:\"fun_id\";s:1:\"3\";s:10:\"fun_mod_id\";s:1:\"1\";s:8:\"fun_nome\";s:6:\"Grupos\";s:9:\"fun_alias\";s:11:\"admin/grupo\";s:9:\"fun_ordem\";s:1:\"1\";s:11:\"fun_visible\";s:1:\"1\";s:10:\"permissoes\";a:4:{i:0;a:6:{s:6:\"per_id\";s:1:\"2\";s:8:\"per_nome\";s:6:\"editar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:1;a:6:{s:6:\"per_id\";s:1:\"4\";s:8:\"per_nome\";s:5:\"criar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:2;a:6:{s:6:\"per_id\";s:1:\"3\";s:8:\"per_nome\";s:7:\"remover\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:3;a:6:{s:6:\"per_id\";s:1:\"1\";s:8:\"per_nome\";s:6:\"listar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}}}i:1;a:7:{s:6:\"fun_id\";s:1:\"1\";s:10:\"fun_mod_id\";s:1:\"1\";s:8:\"fun_nome\";s:9:\"Usuários\";s:9:\"fun_alias\";s:13:\"admin/usuario\";s:9:\"fun_ordem\";s:1:\"2\";s:11:\"fun_visible\";s:1:\"1\";s:10:\"permissoes\";a:5:{i:0;a:6:{s:6:\"per_id\";s:1:\"2\";s:8:\"per_nome\";s:6:\"editar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:1;a:6:{s:6:\"per_id\";s:1:\"4\";s:8:\"per_nome\";s:5:\"criar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:2;a:6:{s:6:\"per_id\";s:1:\"3\";s:8:\"per_nome\";s:7:\"remover\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:3;a:6:{s:6:\"per_id\";s:1:\"1\";s:8:\"per_nome\";s:6:\"listar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:4;a:6:{s:6:\"per_id\";s:1:\"1\";s:8:\"per_nome\";s:6:\"listar\";s:6:\"gru_id\";s:1:\"2\";s:8:\"gru_nome\";s:11:\"Colaborador\";s:11:\"gru_created\";s:19:\"2013-08-06 17:29:36\";s:10:\"gru_delete\";s:1:\"1\";}}}i:2;a:7:{s:6:\"fun_id\";s:1:\"7\";s:10:\"fun_mod_id\";s:1:\"1\";s:8:\"fun_nome\";s:11:\"Permissões\";s:9:\"fun_alias\";s:15:\"admin/permissao\";s:9:\"fun_ordem\";s:1:\"3\";s:11:\"fun_visible\";s:1:\"1\";s:10:\"permissoes\";a:4:{i:0;a:6:{s:6:\"per_id\";s:1:\"2\";s:8:\"per_nome\";s:6:\"editar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:1;a:6:{s:6:\"per_id\";s:1:\"4\";s:8:\"per_nome\";s:5:\"criar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:2;a:6:{s:6:\"per_id\";s:1:\"3\";s:8:\"per_nome\";s:7:\"remover\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:3;a:6:{s:6:\"per_id\";s:1:\"1\";s:8:\"per_nome\";s:6:\"listar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}}}}}}}}'),
('1fd9a7ce3032c4cfa88b5d4c02384a50', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:72.0) Gecko/20100101 Firefox/72.0', 1580841596, ''),
('4978d1e5db266a5288e7b234255d5887', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:72.0) Gecko/20100101 Firefox/72.0', 1580843861, 'a:3:{s:9:\"user_data\";s:0:\"\";s:6:\"logged\";b:1;s:6:\"result\";a:4:{s:7:\"usuario\";a:8:{s:6:\"usu_id\";s:1:\"1\";s:10:\"usu_gru_id\";s:1:\"1\";s:8:\"usu_nome\";s:7:\"Adriano\";s:9:\"usu_email\";s:24:\"adriano.savoir@gmail.com\";s:9:\"usu_senha\";s:40:\"8c4706aae7c89352d61a0bb4ff7ed6bd059c0917\";s:11:\"usu_created\";s:19:\"2013-12-07 23:17:06\";s:10:\"usu_delete\";s:1:\"1\";s:15:\"usu_data_expira\";s:10:\"0000-00-00\";}s:5:\"grupo\";a:4:{s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}s:7:\"modulos\";a:2:{i:0;a:8:{s:6:\"mod_id\";s:1:\"2\";s:8:\"mod_nome\";s:7:\"Modulos\";s:9:\"mod_alias\";s:12:\"admin/modulo\";s:9:\"mod_ordem\";s:1:\"1\";s:11:\"mod_visible\";s:1:\"1\";s:10:\"gfp_per_id\";s:1:\"1\";s:10:\"gfp_gru_id\";s:1:\"1\";s:15:\"funcionalidades\";a:4:{i:0;a:6:{s:6:\"fun_id\";s:1:\"2\";s:10:\"fun_mod_id\";s:1:\"2\";s:8:\"fun_nome\";s:8:\"Cadastro\";s:9:\"fun_alias\";s:12:\"admin/modulo\";s:9:\"fun_ordem\";s:1:\"1\";s:11:\"fun_visible\";s:1:\"1\";}i:1;a:6:{s:6:\"fun_id\";s:2:\"10\";s:10:\"fun_mod_id\";s:1:\"2\";s:8:\"fun_nome\";s:15:\"Funcionalidades\";s:9:\"fun_alias\";s:20:\"admin/funcionalidade\";s:9:\"fun_ordem\";s:1:\"2\";s:11:\"fun_visible\";s:1:\"1\";}i:2;a:6:{s:6:\"fun_id\";s:2:\"12\";s:10:\"fun_mod_id\";s:1:\"2\";s:8:\"fun_nome\";s:16:\"Outra Controller\";s:9:\"fun_alias\";s:21:\"admin/outracontroller\";s:9:\"fun_ordem\";s:1:\"3\";s:11:\"fun_visible\";s:1:\"1\";}i:3;a:6:{s:6:\"fun_id\";s:2:\"11\";s:10:\"fun_mod_id\";s:1:\"2\";s:8:\"fun_nome\";s:18:\"Outra Controller 2\";s:9:\"fun_alias\";s:22:\"admin/outracontroller2\";s:9:\"fun_ordem\";s:1:\"4\";s:11:\"fun_visible\";s:1:\"1\";}}}i:1;a:8:{s:6:\"mod_id\";s:1:\"1\";s:8:\"mod_nome\";s:15:\"Configurações\";s:9:\"mod_alias\";s:18:\"admin/configuracao\";s:9:\"mod_ordem\";s:1:\"2\";s:11:\"mod_visible\";s:1:\"1\";s:10:\"gfp_per_id\";s:1:\"1\";s:10:\"gfp_gru_id\";s:1:\"1\";s:15:\"funcionalidades\";a:3:{i:0;a:6:{s:6:\"fun_id\";s:1:\"3\";s:10:\"fun_mod_id\";s:1:\"1\";s:8:\"fun_nome\";s:6:\"Grupos\";s:9:\"fun_alias\";s:11:\"admin/grupo\";s:9:\"fun_ordem\";s:1:\"1\";s:11:\"fun_visible\";s:1:\"1\";}i:1;a:6:{s:6:\"fun_id\";s:1:\"1\";s:10:\"fun_mod_id\";s:1:\"1\";s:8:\"fun_nome\";s:9:\"Usuários\";s:9:\"fun_alias\";s:13:\"admin/usuario\";s:9:\"fun_ordem\";s:1:\"2\";s:11:\"fun_visible\";s:1:\"1\";}i:2;a:6:{s:6:\"fun_id\";s:1:\"7\";s:10:\"fun_mod_id\";s:1:\"1\";s:8:\"fun_nome\";s:11:\"Permissões\";s:9:\"fun_alias\";s:15:\"admin/permissao\";s:9:\"fun_ordem\";s:1:\"3\";s:11:\"fun_visible\";s:1:\"1\";}}}}s:21:\"modAndFunAndPerAndGru\";a:2:{i:0;a:6:{s:6:\"mod_id\";s:1:\"2\";s:8:\"mod_nome\";s:7:\"Modulos\";s:9:\"mod_alias\";s:12:\"admin/modulo\";s:9:\"mod_ordem\";s:1:\"1\";s:11:\"mod_visible\";s:1:\"1\";s:15:\"funcionalidades\";a:4:{i:0;a:7:{s:6:\"fun_id\";s:1:\"2\";s:10:\"fun_mod_id\";s:1:\"2\";s:8:\"fun_nome\";s:8:\"Cadastro\";s:9:\"fun_alias\";s:12:\"admin/modulo\";s:9:\"fun_ordem\";s:1:\"1\";s:11:\"fun_visible\";s:1:\"1\";s:10:\"permissoes\";a:4:{i:0;a:6:{s:6:\"per_id\";s:1:\"1\";s:8:\"per_nome\";s:6:\"listar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:1;a:6:{s:6:\"per_id\";s:1:\"2\";s:8:\"per_nome\";s:6:\"editar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:2;a:6:{s:6:\"per_id\";s:1:\"3\";s:8:\"per_nome\";s:7:\"remover\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:3;a:6:{s:6:\"per_id\";s:1:\"4\";s:8:\"per_nome\";s:5:\"criar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}}}i:1;a:7:{s:6:\"fun_id\";s:2:\"10\";s:10:\"fun_mod_id\";s:1:\"2\";s:8:\"fun_nome\";s:15:\"Funcionalidades\";s:9:\"fun_alias\";s:20:\"admin/funcionalidade\";s:9:\"fun_ordem\";s:1:\"2\";s:11:\"fun_visible\";s:1:\"1\";s:10:\"permissoes\";a:4:{i:0;a:6:{s:6:\"per_id\";s:1:\"2\";s:8:\"per_nome\";s:6:\"editar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:1;a:6:{s:6:\"per_id\";s:1:\"4\";s:8:\"per_nome\";s:5:\"criar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:2;a:6:{s:6:\"per_id\";s:1:\"3\";s:8:\"per_nome\";s:7:\"remover\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:3;a:6:{s:6:\"per_id\";s:1:\"1\";s:8:\"per_nome\";s:6:\"listar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}}}i:2;a:7:{s:6:\"fun_id\";s:2:\"12\";s:10:\"fun_mod_id\";s:1:\"2\";s:8:\"fun_nome\";s:16:\"Outra Controller\";s:9:\"fun_alias\";s:21:\"admin/outracontroller\";s:9:\"fun_ordem\";s:1:\"3\";s:11:\"fun_visible\";s:1:\"1\";s:10:\"permissoes\";a:5:{i:0;a:6:{s:6:\"per_id\";s:1:\"4\";s:8:\"per_nome\";s:5:\"criar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:1;a:6:{s:6:\"per_id\";s:1:\"2\";s:8:\"per_nome\";s:6:\"editar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:2;a:6:{s:6:\"per_id\";s:1:\"1\";s:8:\"per_nome\";s:6:\"listar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:3;a:6:{s:6:\"per_id\";s:1:\"3\";s:8:\"per_nome\";s:7:\"remover\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:4;a:6:{s:6:\"per_id\";s:1:\"1\";s:8:\"per_nome\";s:6:\"listar\";s:6:\"gru_id\";s:1:\"2\";s:8:\"gru_nome\";s:11:\"Colaborador\";s:11:\"gru_created\";s:19:\"2013-08-06 17:29:36\";s:10:\"gru_delete\";s:1:\"1\";}}}i:3;a:7:{s:6:\"fun_id\";s:2:\"11\";s:10:\"fun_mod_id\";s:1:\"2\";s:8:\"fun_nome\";s:18:\"Outra Controller 2\";s:9:\"fun_alias\";s:22:\"admin/outracontroller2\";s:9:\"fun_ordem\";s:1:\"4\";s:11:\"fun_visible\";s:1:\"1\";s:10:\"permissoes\";a:4:{i:0;a:6:{s:6:\"per_id\";s:1:\"4\";s:8:\"per_nome\";s:5:\"criar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:1;a:6:{s:6:\"per_id\";s:1:\"2\";s:8:\"per_nome\";s:6:\"editar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:2;a:6:{s:6:\"per_id\";s:1:\"1\";s:8:\"per_nome\";s:6:\"listar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:3;a:6:{s:6:\"per_id\";s:1:\"3\";s:8:\"per_nome\";s:7:\"remover\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}}}}}i:1;a:6:{s:6:\"mod_id\";s:1:\"1\";s:8:\"mod_nome\";s:15:\"Configurações\";s:9:\"mod_alias\";s:18:\"admin/configuracao\";s:9:\"mod_ordem\";s:1:\"2\";s:11:\"mod_visible\";s:1:\"1\";s:15:\"funcionalidades\";a:3:{i:0;a:7:{s:6:\"fun_id\";s:1:\"3\";s:10:\"fun_mod_id\";s:1:\"1\";s:8:\"fun_nome\";s:6:\"Grupos\";s:9:\"fun_alias\";s:11:\"admin/grupo\";s:9:\"fun_ordem\";s:1:\"1\";s:11:\"fun_visible\";s:1:\"1\";s:10:\"permissoes\";a:4:{i:0;a:6:{s:6:\"per_id\";s:1:\"2\";s:8:\"per_nome\";s:6:\"editar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:1;a:6:{s:6:\"per_id\";s:1:\"4\";s:8:\"per_nome\";s:5:\"criar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:2;a:6:{s:6:\"per_id\";s:1:\"3\";s:8:\"per_nome\";s:7:\"remover\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:3;a:6:{s:6:\"per_id\";s:1:\"1\";s:8:\"per_nome\";s:6:\"listar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}}}i:1;a:7:{s:6:\"fun_id\";s:1:\"1\";s:10:\"fun_mod_id\";s:1:\"1\";s:8:\"fun_nome\";s:9:\"Usuários\";s:9:\"fun_alias\";s:13:\"admin/usuario\";s:9:\"fun_ordem\";s:1:\"2\";s:11:\"fun_visible\";s:1:\"1\";s:10:\"permissoes\";a:5:{i:0;a:6:{s:6:\"per_id\";s:1:\"2\";s:8:\"per_nome\";s:6:\"editar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:1;a:6:{s:6:\"per_id\";s:1:\"4\";s:8:\"per_nome\";s:5:\"criar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:2;a:6:{s:6:\"per_id\";s:1:\"3\";s:8:\"per_nome\";s:7:\"remover\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:3;a:6:{s:6:\"per_id\";s:1:\"1\";s:8:\"per_nome\";s:6:\"listar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:4;a:6:{s:6:\"per_id\";s:1:\"1\";s:8:\"per_nome\";s:6:\"listar\";s:6:\"gru_id\";s:1:\"2\";s:8:\"gru_nome\";s:11:\"Colaborador\";s:11:\"gru_created\";s:19:\"2013-08-06 17:29:36\";s:10:\"gru_delete\";s:1:\"1\";}}}i:2;a:7:{s:6:\"fun_id\";s:1:\"7\";s:10:\"fun_mod_id\";s:1:\"1\";s:8:\"fun_nome\";s:11:\"Permissões\";s:9:\"fun_alias\";s:15:\"admin/permissao\";s:9:\"fun_ordem\";s:1:\"3\";s:11:\"fun_visible\";s:1:\"1\";s:10:\"permissoes\";a:4:{i:0;a:6:{s:6:\"per_id\";s:1:\"2\";s:8:\"per_nome\";s:6:\"editar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:1;a:6:{s:6:\"per_id\";s:1:\"4\";s:8:\"per_nome\";s:5:\"criar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:2;a:6:{s:6:\"per_id\";s:1:\"3\";s:8:\"per_nome\";s:7:\"remover\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:3;a:6:{s:6:\"per_id\";s:1:\"1\";s:8:\"per_nome\";s:6:\"listar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}}}}}}}}'),
('97aa8269586c794f4bdd21fc137c975f', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:72.0) Gecko/20100101 Firefox/72.0', 1580843142, ''),
('c7f4f09d5932d0872ae4060e19f8ff4c', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:72.0) Gecko/20100101 Firefox/72.0', 1580844483, ''),
('ed7b8cf1369e820f771e01a5522be032', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:72.0) Gecko/20100101 Firefox/72.0', 1580845437, 'a:3:{s:9:\"user_data\";s:0:\"\";s:6:\"logged\";b:1;s:6:\"result\";a:4:{s:7:\"usuario\";a:8:{s:6:\"usu_id\";s:1:\"1\";s:10:\"usu_gru_id\";s:1:\"1\";s:8:\"usu_nome\";s:7:\"Adriano\";s:9:\"usu_email\";s:24:\"adriano.savoir@gmail.com\";s:9:\"usu_senha\";s:40:\"8c4706aae7c89352d61a0bb4ff7ed6bd059c0917\";s:11:\"usu_created\";s:19:\"2013-12-07 23:17:06\";s:10:\"usu_delete\";s:1:\"1\";s:15:\"usu_data_expira\";s:10:\"0000-00-00\";}s:5:\"grupo\";a:4:{s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}s:7:\"modulos\";a:2:{i:0;a:8:{s:6:\"mod_id\";s:1:\"2\";s:8:\"mod_nome\";s:7:\"Modulos\";s:9:\"mod_alias\";s:12:\"admin/modulo\";s:9:\"mod_ordem\";s:1:\"1\";s:11:\"mod_visible\";s:1:\"1\";s:10:\"gfp_per_id\";s:1:\"1\";s:10:\"gfp_gru_id\";s:1:\"1\";s:15:\"funcionalidades\";a:4:{i:0;a:6:{s:6:\"fun_id\";s:1:\"2\";s:10:\"fun_mod_id\";s:1:\"2\";s:8:\"fun_nome\";s:8:\"Cadastro\";s:9:\"fun_alias\";s:12:\"admin/modulo\";s:9:\"fun_ordem\";s:1:\"1\";s:11:\"fun_visible\";s:1:\"1\";}i:1;a:6:{s:6:\"fun_id\";s:2:\"10\";s:10:\"fun_mod_id\";s:1:\"2\";s:8:\"fun_nome\";s:15:\"Funcionalidades\";s:9:\"fun_alias\";s:20:\"admin/funcionalidade\";s:9:\"fun_ordem\";s:1:\"2\";s:11:\"fun_visible\";s:1:\"1\";}i:2;a:6:{s:6:\"fun_id\";s:2:\"12\";s:10:\"fun_mod_id\";s:1:\"2\";s:8:\"fun_nome\";s:16:\"Outra Controller\";s:9:\"fun_alias\";s:21:\"admin/outracontroller\";s:9:\"fun_ordem\";s:1:\"3\";s:11:\"fun_visible\";s:1:\"1\";}i:3;a:6:{s:6:\"fun_id\";s:2:\"11\";s:10:\"fun_mod_id\";s:1:\"2\";s:8:\"fun_nome\";s:18:\"Outra Controller 2\";s:9:\"fun_alias\";s:22:\"admin/outracontroller2\";s:9:\"fun_ordem\";s:1:\"4\";s:11:\"fun_visible\";s:1:\"1\";}}}i:1;a:8:{s:6:\"mod_id\";s:1:\"1\";s:8:\"mod_nome\";s:15:\"Configurações\";s:9:\"mod_alias\";s:18:\"admin/configuracao\";s:9:\"mod_ordem\";s:1:\"2\";s:11:\"mod_visible\";s:1:\"1\";s:10:\"gfp_per_id\";s:1:\"1\";s:10:\"gfp_gru_id\";s:1:\"1\";s:15:\"funcionalidades\";a:3:{i:0;a:6:{s:6:\"fun_id\";s:1:\"3\";s:10:\"fun_mod_id\";s:1:\"1\";s:8:\"fun_nome\";s:6:\"Grupos\";s:9:\"fun_alias\";s:11:\"admin/grupo\";s:9:\"fun_ordem\";s:1:\"1\";s:11:\"fun_visible\";s:1:\"1\";}i:1;a:6:{s:6:\"fun_id\";s:1:\"1\";s:10:\"fun_mod_id\";s:1:\"1\";s:8:\"fun_nome\";s:9:\"Usuários\";s:9:\"fun_alias\";s:13:\"admin/usuario\";s:9:\"fun_ordem\";s:1:\"2\";s:11:\"fun_visible\";s:1:\"1\";}i:2;a:6:{s:6:\"fun_id\";s:1:\"7\";s:10:\"fun_mod_id\";s:1:\"1\";s:8:\"fun_nome\";s:11:\"Permissões\";s:9:\"fun_alias\";s:15:\"admin/permissao\";s:9:\"fun_ordem\";s:1:\"3\";s:11:\"fun_visible\";s:1:\"1\";}}}}s:21:\"modAndFunAndPerAndGru\";a:2:{i:0;a:6:{s:6:\"mod_id\";s:1:\"2\";s:8:\"mod_nome\";s:7:\"Modulos\";s:9:\"mod_alias\";s:12:\"admin/modulo\";s:9:\"mod_ordem\";s:1:\"1\";s:11:\"mod_visible\";s:1:\"1\";s:15:\"funcionalidades\";a:4:{i:0;a:7:{s:6:\"fun_id\";s:1:\"2\";s:10:\"fun_mod_id\";s:1:\"2\";s:8:\"fun_nome\";s:8:\"Cadastro\";s:9:\"fun_alias\";s:12:\"admin/modulo\";s:9:\"fun_ordem\";s:1:\"1\";s:11:\"fun_visible\";s:1:\"1\";s:10:\"permissoes\";a:4:{i:0;a:6:{s:6:\"per_id\";s:1:\"1\";s:8:\"per_nome\";s:6:\"listar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:1;a:6:{s:6:\"per_id\";s:1:\"2\";s:8:\"per_nome\";s:6:\"editar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:2;a:6:{s:6:\"per_id\";s:1:\"3\";s:8:\"per_nome\";s:7:\"remover\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:3;a:6:{s:6:\"per_id\";s:1:\"4\";s:8:\"per_nome\";s:5:\"criar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}}}i:1;a:7:{s:6:\"fun_id\";s:2:\"10\";s:10:\"fun_mod_id\";s:1:\"2\";s:8:\"fun_nome\";s:15:\"Funcionalidades\";s:9:\"fun_alias\";s:20:\"admin/funcionalidade\";s:9:\"fun_ordem\";s:1:\"2\";s:11:\"fun_visible\";s:1:\"1\";s:10:\"permissoes\";a:4:{i:0;a:6:{s:6:\"per_id\";s:1:\"2\";s:8:\"per_nome\";s:6:\"editar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:1;a:6:{s:6:\"per_id\";s:1:\"4\";s:8:\"per_nome\";s:5:\"criar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:2;a:6:{s:6:\"per_id\";s:1:\"3\";s:8:\"per_nome\";s:7:\"remover\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:3;a:6:{s:6:\"per_id\";s:1:\"1\";s:8:\"per_nome\";s:6:\"listar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}}}i:2;a:7:{s:6:\"fun_id\";s:2:\"12\";s:10:\"fun_mod_id\";s:1:\"2\";s:8:\"fun_nome\";s:16:\"Outra Controller\";s:9:\"fun_alias\";s:21:\"admin/outracontroller\";s:9:\"fun_ordem\";s:1:\"3\";s:11:\"fun_visible\";s:1:\"1\";s:10:\"permissoes\";a:5:{i:0;a:6:{s:6:\"per_id\";s:1:\"4\";s:8:\"per_nome\";s:5:\"criar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:1;a:6:{s:6:\"per_id\";s:1:\"2\";s:8:\"per_nome\";s:6:\"editar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:2;a:6:{s:6:\"per_id\";s:1:\"1\";s:8:\"per_nome\";s:6:\"listar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:3;a:6:{s:6:\"per_id\";s:1:\"3\";s:8:\"per_nome\";s:7:\"remover\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:4;a:6:{s:6:\"per_id\";s:1:\"1\";s:8:\"per_nome\";s:6:\"listar\";s:6:\"gru_id\";s:1:\"2\";s:8:\"gru_nome\";s:11:\"Colaborador\";s:11:\"gru_created\";s:19:\"2013-08-06 17:29:36\";s:10:\"gru_delete\";s:1:\"1\";}}}i:3;a:7:{s:6:\"fun_id\";s:2:\"11\";s:10:\"fun_mod_id\";s:1:\"2\";s:8:\"fun_nome\";s:18:\"Outra Controller 2\";s:9:\"fun_alias\";s:22:\"admin/outracontroller2\";s:9:\"fun_ordem\";s:1:\"4\";s:11:\"fun_visible\";s:1:\"1\";s:10:\"permissoes\";a:4:{i:0;a:6:{s:6:\"per_id\";s:1:\"4\";s:8:\"per_nome\";s:5:\"criar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:1;a:6:{s:6:\"per_id\";s:1:\"2\";s:8:\"per_nome\";s:6:\"editar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:2;a:6:{s:6:\"per_id\";s:1:\"1\";s:8:\"per_nome\";s:6:\"listar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:3;a:6:{s:6:\"per_id\";s:1:\"3\";s:8:\"per_nome\";s:7:\"remover\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}}}}}i:1;a:6:{s:6:\"mod_id\";s:1:\"1\";s:8:\"mod_nome\";s:15:\"Configurações\";s:9:\"mod_alias\";s:18:\"admin/configuracao\";s:9:\"mod_ordem\";s:1:\"2\";s:11:\"mod_visible\";s:1:\"1\";s:15:\"funcionalidades\";a:3:{i:0;a:7:{s:6:\"fun_id\";s:1:\"3\";s:10:\"fun_mod_id\";s:1:\"1\";s:8:\"fun_nome\";s:6:\"Grupos\";s:9:\"fun_alias\";s:11:\"admin/grupo\";s:9:\"fun_ordem\";s:1:\"1\";s:11:\"fun_visible\";s:1:\"1\";s:10:\"permissoes\";a:4:{i:0;a:6:{s:6:\"per_id\";s:1:\"2\";s:8:\"per_nome\";s:6:\"editar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:1;a:6:{s:6:\"per_id\";s:1:\"4\";s:8:\"per_nome\";s:5:\"criar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:2;a:6:{s:6:\"per_id\";s:1:\"3\";s:8:\"per_nome\";s:7:\"remover\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:3;a:6:{s:6:\"per_id\";s:1:\"1\";s:8:\"per_nome\";s:6:\"listar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}}}i:1;a:7:{s:6:\"fun_id\";s:1:\"1\";s:10:\"fun_mod_id\";s:1:\"1\";s:8:\"fun_nome\";s:9:\"Usuários\";s:9:\"fun_alias\";s:13:\"admin/usuario\";s:9:\"fun_ordem\";s:1:\"2\";s:11:\"fun_visible\";s:1:\"1\";s:10:\"permissoes\";a:5:{i:0;a:6:{s:6:\"per_id\";s:1:\"2\";s:8:\"per_nome\";s:6:\"editar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:1;a:6:{s:6:\"per_id\";s:1:\"4\";s:8:\"per_nome\";s:5:\"criar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:2;a:6:{s:6:\"per_id\";s:1:\"3\";s:8:\"per_nome\";s:7:\"remover\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:3;a:6:{s:6:\"per_id\";s:1:\"1\";s:8:\"per_nome\";s:6:\"listar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:4;a:6:{s:6:\"per_id\";s:1:\"1\";s:8:\"per_nome\";s:6:\"listar\";s:6:\"gru_id\";s:1:\"2\";s:8:\"gru_nome\";s:11:\"Colaborador\";s:11:\"gru_created\";s:19:\"2013-08-06 17:29:36\";s:10:\"gru_delete\";s:1:\"1\";}}}i:2;a:7:{s:6:\"fun_id\";s:1:\"7\";s:10:\"fun_mod_id\";s:1:\"1\";s:8:\"fun_nome\";s:11:\"Permissões\";s:9:\"fun_alias\";s:15:\"admin/permissao\";s:9:\"fun_ordem\";s:1:\"3\";s:11:\"fun_visible\";s:1:\"1\";s:10:\"permissoes\";a:4:{i:0;a:6:{s:6:\"per_id\";s:1:\"2\";s:8:\"per_nome\";s:6:\"editar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:1;a:6:{s:6:\"per_id\";s:1:\"4\";s:8:\"per_nome\";s:5:\"criar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:2;a:6:{s:6:\"per_id\";s:1:\"3\";s:8:\"per_nome\";s:7:\"remover\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:3;a:6:{s:6:\"per_id\";s:1:\"1\";s:8:\"per_nome\";s:6:\"listar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}}}}}}}}'),
('fe4d7736634eaf4d81d5e26e3b72c8bd', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:72.0) Gecko/20100101 Firefox/72.0', 1580844480, 'a:3:{s:9:\"user_data\";s:0:\"\";s:6:\"logged\";b:1;s:6:\"result\";a:4:{s:7:\"usuario\";a:8:{s:6:\"usu_id\";s:1:\"1\";s:10:\"usu_gru_id\";s:1:\"1\";s:8:\"usu_nome\";s:7:\"Adriano\";s:9:\"usu_email\";s:24:\"adriano.savoir@gmail.com\";s:9:\"usu_senha\";s:40:\"8c4706aae7c89352d61a0bb4ff7ed6bd059c0917\";s:11:\"usu_created\";s:19:\"2013-12-07 23:17:06\";s:10:\"usu_delete\";s:1:\"1\";s:15:\"usu_data_expira\";s:10:\"0000-00-00\";}s:5:\"grupo\";a:4:{s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}s:7:\"modulos\";a:2:{i:0;a:8:{s:6:\"mod_id\";s:1:\"2\";s:8:\"mod_nome\";s:7:\"Modulos\";s:9:\"mod_alias\";s:12:\"admin/modulo\";s:9:\"mod_ordem\";s:1:\"1\";s:11:\"mod_visible\";s:1:\"1\";s:10:\"gfp_per_id\";s:1:\"1\";s:10:\"gfp_gru_id\";s:1:\"1\";s:15:\"funcionalidades\";a:4:{i:0;a:6:{s:6:\"fun_id\";s:1:\"2\";s:10:\"fun_mod_id\";s:1:\"2\";s:8:\"fun_nome\";s:8:\"Cadastro\";s:9:\"fun_alias\";s:12:\"admin/modulo\";s:9:\"fun_ordem\";s:1:\"1\";s:11:\"fun_visible\";s:1:\"1\";}i:1;a:6:{s:6:\"fun_id\";s:2:\"10\";s:10:\"fun_mod_id\";s:1:\"2\";s:8:\"fun_nome\";s:15:\"Funcionalidades\";s:9:\"fun_alias\";s:20:\"admin/funcionalidade\";s:9:\"fun_ordem\";s:1:\"2\";s:11:\"fun_visible\";s:1:\"1\";}i:2;a:6:{s:6:\"fun_id\";s:2:\"12\";s:10:\"fun_mod_id\";s:1:\"2\";s:8:\"fun_nome\";s:16:\"Outra Controller\";s:9:\"fun_alias\";s:21:\"admin/outracontroller\";s:9:\"fun_ordem\";s:1:\"3\";s:11:\"fun_visible\";s:1:\"1\";}i:3;a:6:{s:6:\"fun_id\";s:2:\"11\";s:10:\"fun_mod_id\";s:1:\"2\";s:8:\"fun_nome\";s:18:\"Outra Controller 2\";s:9:\"fun_alias\";s:22:\"admin/outracontroller2\";s:9:\"fun_ordem\";s:1:\"4\";s:11:\"fun_visible\";s:1:\"1\";}}}i:1;a:8:{s:6:\"mod_id\";s:1:\"1\";s:8:\"mod_nome\";s:15:\"Configurações\";s:9:\"mod_alias\";s:18:\"admin/configuracao\";s:9:\"mod_ordem\";s:1:\"2\";s:11:\"mod_visible\";s:1:\"1\";s:10:\"gfp_per_id\";s:1:\"1\";s:10:\"gfp_gru_id\";s:1:\"1\";s:15:\"funcionalidades\";a:3:{i:0;a:6:{s:6:\"fun_id\";s:1:\"3\";s:10:\"fun_mod_id\";s:1:\"1\";s:8:\"fun_nome\";s:6:\"Grupos\";s:9:\"fun_alias\";s:11:\"admin/grupo\";s:9:\"fun_ordem\";s:1:\"1\";s:11:\"fun_visible\";s:1:\"1\";}i:1;a:6:{s:6:\"fun_id\";s:1:\"1\";s:10:\"fun_mod_id\";s:1:\"1\";s:8:\"fun_nome\";s:9:\"Usuários\";s:9:\"fun_alias\";s:13:\"admin/usuario\";s:9:\"fun_ordem\";s:1:\"2\";s:11:\"fun_visible\";s:1:\"1\";}i:2;a:6:{s:6:\"fun_id\";s:1:\"7\";s:10:\"fun_mod_id\";s:1:\"1\";s:8:\"fun_nome\";s:11:\"Permissões\";s:9:\"fun_alias\";s:15:\"admin/permissao\";s:9:\"fun_ordem\";s:1:\"3\";s:11:\"fun_visible\";s:1:\"1\";}}}}s:21:\"modAndFunAndPerAndGru\";a:2:{i:0;a:6:{s:6:\"mod_id\";s:1:\"2\";s:8:\"mod_nome\";s:7:\"Modulos\";s:9:\"mod_alias\";s:12:\"admin/modulo\";s:9:\"mod_ordem\";s:1:\"1\";s:11:\"mod_visible\";s:1:\"1\";s:15:\"funcionalidades\";a:4:{i:0;a:7:{s:6:\"fun_id\";s:1:\"2\";s:10:\"fun_mod_id\";s:1:\"2\";s:8:\"fun_nome\";s:8:\"Cadastro\";s:9:\"fun_alias\";s:12:\"admin/modulo\";s:9:\"fun_ordem\";s:1:\"1\";s:11:\"fun_visible\";s:1:\"1\";s:10:\"permissoes\";a:4:{i:0;a:6:{s:6:\"per_id\";s:1:\"1\";s:8:\"per_nome\";s:6:\"listar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:1;a:6:{s:6:\"per_id\";s:1:\"2\";s:8:\"per_nome\";s:6:\"editar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:2;a:6:{s:6:\"per_id\";s:1:\"3\";s:8:\"per_nome\";s:7:\"remover\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:3;a:6:{s:6:\"per_id\";s:1:\"4\";s:8:\"per_nome\";s:5:\"criar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}}}i:1;a:7:{s:6:\"fun_id\";s:2:\"10\";s:10:\"fun_mod_id\";s:1:\"2\";s:8:\"fun_nome\";s:15:\"Funcionalidades\";s:9:\"fun_alias\";s:20:\"admin/funcionalidade\";s:9:\"fun_ordem\";s:1:\"2\";s:11:\"fun_visible\";s:1:\"1\";s:10:\"permissoes\";a:4:{i:0;a:6:{s:6:\"per_id\";s:1:\"2\";s:8:\"per_nome\";s:6:\"editar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:1;a:6:{s:6:\"per_id\";s:1:\"4\";s:8:\"per_nome\";s:5:\"criar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:2;a:6:{s:6:\"per_id\";s:1:\"3\";s:8:\"per_nome\";s:7:\"remover\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:3;a:6:{s:6:\"per_id\";s:1:\"1\";s:8:\"per_nome\";s:6:\"listar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}}}i:2;a:7:{s:6:\"fun_id\";s:2:\"12\";s:10:\"fun_mod_id\";s:1:\"2\";s:8:\"fun_nome\";s:16:\"Outra Controller\";s:9:\"fun_alias\";s:21:\"admin/outracontroller\";s:9:\"fun_ordem\";s:1:\"3\";s:11:\"fun_visible\";s:1:\"1\";s:10:\"permissoes\";a:5:{i:0;a:6:{s:6:\"per_id\";s:1:\"4\";s:8:\"per_nome\";s:5:\"criar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:1;a:6:{s:6:\"per_id\";s:1:\"2\";s:8:\"per_nome\";s:6:\"editar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:2;a:6:{s:6:\"per_id\";s:1:\"1\";s:8:\"per_nome\";s:6:\"listar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:3;a:6:{s:6:\"per_id\";s:1:\"3\";s:8:\"per_nome\";s:7:\"remover\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:4;a:6:{s:6:\"per_id\";s:1:\"1\";s:8:\"per_nome\";s:6:\"listar\";s:6:\"gru_id\";s:1:\"2\";s:8:\"gru_nome\";s:11:\"Colaborador\";s:11:\"gru_created\";s:19:\"2013-08-06 17:29:36\";s:10:\"gru_delete\";s:1:\"1\";}}}i:3;a:7:{s:6:\"fun_id\";s:2:\"11\";s:10:\"fun_mod_id\";s:1:\"2\";s:8:\"fun_nome\";s:18:\"Outra Controller 2\";s:9:\"fun_alias\";s:22:\"admin/outracontroller2\";s:9:\"fun_ordem\";s:1:\"4\";s:11:\"fun_visible\";s:1:\"1\";s:10:\"permissoes\";a:4:{i:0;a:6:{s:6:\"per_id\";s:1:\"4\";s:8:\"per_nome\";s:5:\"criar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:1;a:6:{s:6:\"per_id\";s:1:\"2\";s:8:\"per_nome\";s:6:\"editar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:2;a:6:{s:6:\"per_id\";s:1:\"1\";s:8:\"per_nome\";s:6:\"listar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:3;a:6:{s:6:\"per_id\";s:1:\"3\";s:8:\"per_nome\";s:7:\"remover\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}}}}}i:1;a:6:{s:6:\"mod_id\";s:1:\"1\";s:8:\"mod_nome\";s:15:\"Configurações\";s:9:\"mod_alias\";s:18:\"admin/configuracao\";s:9:\"mod_ordem\";s:1:\"2\";s:11:\"mod_visible\";s:1:\"1\";s:15:\"funcionalidades\";a:3:{i:0;a:7:{s:6:\"fun_id\";s:1:\"3\";s:10:\"fun_mod_id\";s:1:\"1\";s:8:\"fun_nome\";s:6:\"Grupos\";s:9:\"fun_alias\";s:11:\"admin/grupo\";s:9:\"fun_ordem\";s:1:\"1\";s:11:\"fun_visible\";s:1:\"1\";s:10:\"permissoes\";a:4:{i:0;a:6:{s:6:\"per_id\";s:1:\"2\";s:8:\"per_nome\";s:6:\"editar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:1;a:6:{s:6:\"per_id\";s:1:\"4\";s:8:\"per_nome\";s:5:\"criar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:2;a:6:{s:6:\"per_id\";s:1:\"3\";s:8:\"per_nome\";s:7:\"remover\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:3;a:6:{s:6:\"per_id\";s:1:\"1\";s:8:\"per_nome\";s:6:\"listar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}}}i:1;a:7:{s:6:\"fun_id\";s:1:\"1\";s:10:\"fun_mod_id\";s:1:\"1\";s:8:\"fun_nome\";s:9:\"Usuários\";s:9:\"fun_alias\";s:13:\"admin/usuario\";s:9:\"fun_ordem\";s:1:\"2\";s:11:\"fun_visible\";s:1:\"1\";s:10:\"permissoes\";a:5:{i:0;a:6:{s:6:\"per_id\";s:1:\"2\";s:8:\"per_nome\";s:6:\"editar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:1;a:6:{s:6:\"per_id\";s:1:\"4\";s:8:\"per_nome\";s:5:\"criar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:2;a:6:{s:6:\"per_id\";s:1:\"3\";s:8:\"per_nome\";s:7:\"remover\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:3;a:6:{s:6:\"per_id\";s:1:\"1\";s:8:\"per_nome\";s:6:\"listar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:4;a:6:{s:6:\"per_id\";s:1:\"1\";s:8:\"per_nome\";s:6:\"listar\";s:6:\"gru_id\";s:1:\"2\";s:8:\"gru_nome\";s:11:\"Colaborador\";s:11:\"gru_created\";s:19:\"2013-08-06 17:29:36\";s:10:\"gru_delete\";s:1:\"1\";}}}i:2;a:7:{s:6:\"fun_id\";s:1:\"7\";s:10:\"fun_mod_id\";s:1:\"1\";s:8:\"fun_nome\";s:11:\"Permissões\";s:9:\"fun_alias\";s:15:\"admin/permissao\";s:9:\"fun_ordem\";s:1:\"3\";s:11:\"fun_visible\";s:1:\"1\";s:10:\"permissoes\";a:4:{i:0;a:6:{s:6:\"per_id\";s:1:\"2\";s:8:\"per_nome\";s:6:\"editar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:1;a:6:{s:6:\"per_id\";s:1:\"4\";s:8:\"per_nome\";s:5:\"criar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:2;a:6:{s:6:\"per_id\";s:1:\"3\";s:8:\"per_nome\";s:7:\"remover\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}i:3;a:6:{s:6:\"per_id\";s:1:\"1\";s:8:\"per_nome\";s:6:\"listar\";s:6:\"gru_id\";s:1:\"1\";s:8:\"gru_nome\";s:5:\"Admin\";s:11:\"gru_created\";s:19:\"2013-12-07 12:59:04\";s:10:\"gru_delete\";s:1:\"1\";}}}}}}}}');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_area`
--

CREATE TABLE `tbl_area` (
  `id` int UNSIGNED NOT NULL,
  `imagem` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `titulo` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `questao_fk` int UNSIGNED NOT NULL,
  `area_saida_fk` bigint DEFAULT NULL,
  `area_entrada_fk` bigint DEFAULT NULL,
  `descricao` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tbl_area`
--

INSERT INTO `tbl_area` (`id`, `imagem`, `titulo`, `questao_fk`, `area_saida_fk`, `area_entrada_fk`, `descricao`) VALUES
(1, NULL, 'Justificativas', 1, 2, NULL, NULL),
(2, NULL, 'Objetivos SMART', 1, 3, 1, NULL),
(3, NULL, 'Benef&iacute;cios', 1, 4, 2, NULL),
(4, NULL, 'Produto', 2, 5, 3, NULL),
(5, NULL, 'Requisitos', 2, 6, 4, NULL),
(6, NULL, 'Stakeholders', 3, 7, 5, NULL),
(7, NULL, 'Equipe', 3, 8, 6, NULL),
(8, NULL, 'Premissas', 4, 9, 7, NULL),
(9, NULL, 'Grupos de Entregas', 4, 10, 8, NULL),
(10, NULL, 'Restri&ccedil;&otilde;es', 4, 11, 9, NULL),
(11, NULL, 'Riscos', 5, 12, 10, NULL),
(12, NULL, 'Linha do Tempo', 5, 13, 11, NULL),
(13, NULL, 'Custos', 5, NULL, 12, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_card`
--

CREATE TABLE `tbl_card` (
  `id` bigint UNSIGNED NOT NULL,
  `area_fk` int UNSIGNED NOT NULL,
  `post` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `autor` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `descricao` text COLLATE utf8_unicode_ci,
  `url` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cor` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `projeto_fk` bigint UNSIGNED DEFAULT NULL,
  `deletado` smallint DEFAULT '0',
  `ordem` smallint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tbl_card`
--

INSERT INTO `tbl_card` (`id`, `area_fk`, `post`, `autor`, `descricao`, `url`, `cor`, `projeto_fk`, `deletado`, `ordem`) VALUES
(1, 6, 'Portal Agregador de Campanhas para Institui&ccedil;&otilde;es Sociais', 'Adriano Vieira', NULL, NULL, '#0000FF', 1, 0, 1),
(2, 9, 'Aplicação Web', 'Adriano', '', '', '#ec971f', 1, 0, 1),
(3, 5, 'Testar se está logado na requisição AJAX', 'Adriano', 'Quando realizar um requisição ajax conferir se está logado e promover um redirect caso não esteja', '', '#ec971f', 1, 0, 1),
(4, 6, 'Testar novamente p2', 'Adriano', '', '', '#31b0d5', 2, 0, 1),
(5, 5, 'Fixar cards na área atual', 'Adriano', 'Cards que estiverem na área requisitos e forem aprovados não poderão mais mudar de área. O mesmo ocorre com todas as áreas, porém somente card da área requisitos podem receber comentários.', '', '#c9302c', 2, 0, 2),
(6, 5, 'Listar cards aprovados ao programador', 'Adriano', 'Quando o card tem aprovação do cliente e do gerente, então o card pode ser listado para o programador desenvolvê-lo.', '', '#c9302c', 2, 0, 3),
(7, 5, 'Encerrar comentários', 'Adriano', 'Todos os comentários precisam ser encerrados e nesse momento isso pode resultar em uma ação. Exemplo: Alterar o status de um card para aguardando revisão para aprovação.', '', '#c9302c', 2, 0, 5),
(8, 5, 'Requisito alterado pelo cliente', 'Adriano', 'Quando o cliente altera um requisito, uma cópia do card é guardado. O card passa para o status aguardando a provação do gerente.\nSomente quando o gerente aprovar é que poderá ser desenvolvido. (Receber horas de desenvolvimento).', '', '#c9302c', 2, 0, 1),
(9, 5, 'Requisito alterado pelo gerente', 'Adriano', 'Quando o gerente altera um requisito o card passa para o status de aguardando aprovação do cliente.\nSomente quando o cliente aprovar é que poderá ser desenvolvido. (Receber horas de desenvolvimento).', '', '#c9302c', 2, 0, 6),
(10, 5, 'Cadastro de status possíveis para cards de requisitos', 'Adriano', 'Cadastrar status que os cards de requisitos podem receber de acordo com o workflow.', '', '#ec971f', 2, 0, 8),
(11, 5, 'workflow que um card pode assumir em seu ciclo', 'Adriano', 'Novo > Apovado; Aprovado > Em revisão; Em revisão > Aprovado; Aprovado > Homologação; Homologação > Não conforme; Não conforme > Homologação; Homologação > Subir produção; Subir produção > Em Produção; Em Produção > Aprovado', '', '#ec971f', 2, 0, 7),
(12, 5, 'Cadastro de horas de desenvolvimento', 'Adriano', 'Quando o card é da área requisitos E está aprovado pode receber horas de desenvolvimento pelo desenvolvedor/programador.', '', '#ec971f', 2, 0, 4),
(13, 5, 'Cadastro de Tipo de Requisito', 'Adriano', 'Se o card é um requisito ele deve informar um tipo:\nEX\nMelhoria\nCorreção de bug\nNova funcionalidade\n', '', '#31b0d5', 2, 0, 9),
(14, 9, 'Sprint 1', 'Adriano', '', '', '#00FF00', 2, 0, 1),
(15, 1, 'opa', 'Adriano', '', '', '#31b0d5', 2, 0, 1),
(16, 1, 'opa 2 erer', 'Adriano', '', '', '#31b0d5', 2, 0, 2),
(17, 9, 'opa', 'Adriano', '', '', '#00FF00', 2, 0, 2),
(18, 4, 'ioioio', 'Adriano', '', '', '#31b0d5', 2, 0, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_custo`
--

CREATE TABLE `tbl_custo` (
  `id` bigint UNSIGNED NOT NULL,
  `valor` double DEFAULT NULL,
  `entrega_fk` bigint UNSIGNED NOT NULL,
  `tipo_custo_fk` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_documento`
--

CREATE TABLE `tbl_documento` (
  `id` bigint UNSIGNED NOT NULL,
  `caminho` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `nome` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `descricao` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_documento_card`
--

CREATE TABLE `tbl_documento_card` (
  `id` bigint UNSIGNED NOT NULL,
  `documento_fk` bigint UNSIGNED NOT NULL,
  `card_fk` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_entrega`
--

CREATE TABLE `tbl_entrega` (
  `id` bigint UNSIGNED NOT NULL,
  `nome` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `relevancia` smallint DEFAULT NULL,
  `card_fk` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_funcionalidade`
--

CREATE TABLE `tbl_funcionalidade` (
  `fun_id` int UNSIGNED NOT NULL,
  `fun_mod_id` int UNSIGNED NOT NULL,
  `fun_nome` char(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fun_alias` char(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fun_ordem` tinyint UNSIGNED NOT NULL,
  `fun_visible` tinyint UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tbl_funcionalidade`
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
-- Estrutura para tabela `tbl_grupo`
--

CREATE TABLE `tbl_grupo` (
  `gru_id` int UNSIGNED NOT NULL,
  `gru_nome` char(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gru_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gru_delete` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tbl_grupo`
--

INSERT INTO `tbl_grupo` (`gru_id`, `gru_nome`, `gru_created`, `gru_delete`) VALUES
(1, 'Admin', '2013-12-07 14:59:04', 1),
(2, 'Colaborador', '2013-08-06 20:29:36', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_grupo_funcionalidade_permissao`
--

CREATE TABLE `tbl_grupo_funcionalidade_permissao` (
  `gfp_gru_id` int UNSIGNED NOT NULL,
  `gfp_fun_id` int UNSIGNED NOT NULL,
  `gfp_per_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tbl_grupo_funcionalidade_permissao`
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
-- Estrutura para tabela `tbl_link`
--

CREATE TABLE `tbl_link` (
  `id` bigint UNSIGNED NOT NULL,
  `card_de` bigint UNSIGNED NOT NULL,
  `card_para` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tbl_link`
--

INSERT INTO `tbl_link` (`id`, `card_de`, `card_para`) VALUES
(1, 3, 1),
(2, 3, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_modulo`
--

CREATE TABLE `tbl_modulo` (
  `mod_id` int UNSIGNED NOT NULL,
  `mod_nome` char(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mod_alias` char(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mod_ordem` tinyint UNSIGNED NOT NULL,
  `mod_visible` tinyint UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tbl_modulo`
--

INSERT INTO `tbl_modulo` (`mod_id`, `mod_nome`, `mod_alias`, `mod_ordem`, `mod_visible`) VALUES
(1, 'Configurações', 'admin/configuracao', 2, 1),
(2, 'Modulos', 'admin/modulo', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_permissao`
--

CREATE TABLE `tbl_permissao` (
  `per_id` int UNSIGNED NOT NULL,
  `per_nome` char(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tbl_permissao`
--

INSERT INTO `tbl_permissao` (`per_id`, `per_nome`) VALUES
(1, 'listar'),
(2, 'editar'),
(3, 'remover'),
(4, 'criar');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_prazo`
--

CREATE TABLE `tbl_prazo` (
  `id` bigint UNSIGNED NOT NULL,
  `entrega_fk` bigint UNSIGNED NOT NULL,
  `data_inicio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `data_fim` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_projeto`
--

CREATE TABLE `tbl_projeto` (
  `id` bigint UNSIGNED NOT NULL,
  `nome` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `picth` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `link_publico` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ativo` smallint DEFAULT '1',
  `usuario_fk` int UNSIGNED NOT NULL,
  `pitch` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tbl_projeto`
--

INSERT INTO `tbl_projeto` (`id`, `nome`, `picth`, `link_publico`, `ativo`, `usuario_fk`, `pitch`) VALUES
(1, 'Framework PMCanvas', 'opa', NULL, 1, 1, NULL),
(2, 'Projeto PMCanvas + Scrum', 'opa', NULL, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_questao`
--

CREATE TABLE `tbl_questao` (
  `id` int UNSIGNED NOT NULL,
  `descricao` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `nome` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tbl_questao`
--

INSERT INTO `tbl_questao` (`id`, `descricao`, `nome`) VALUES
(1, NULL, 'Por Que?'),
(2, NULL, 'O Que?'),
(3, NULL, 'Quem?'),
(4, NULL, 'Como?'),
(5, NULL, 'Quando e Quanto?');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_tipo_custo`
--

CREATE TABLE `tbl_tipo_custo` (
  `id` int UNSIGNED NOT NULL,
  `nome` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tbl_tipo_custo`
--

INSERT INTO `tbl_tipo_custo` (`id`, `nome`) VALUES
(1, 'Equipamentos'),
(2, 'Consultoria'),
(3, 'Aloca&ccedil&atilde;o');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `usu_id` int UNSIGNED NOT NULL,
  `usu_gru_id` int UNSIGNED NOT NULL,
  `usu_nome` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `usu_email` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `usu_senha` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `usu_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usu_delete` tinyint(1) NOT NULL DEFAULT '1',
  `usu_data_expira` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`usu_id`, `usu_gru_id`, `usu_nome`, `usu_email`, `usu_senha`, `usu_created`, `usu_delete`, `usu_data_expira`) VALUES
(1, 1, 'Adriano', 'adriano.savoir@gmail.com', '8c4706aae7c89352d61a0bb4ff7ed6bd059c0917', '2013-12-08 01:17:06', 1, '0000-00-00'),
(2, 2, 'Usuário Operador', 'adrianomotos@ymail.com', '8c4706aae7c89352d61a0bb4ff7ed6bd059c0917', '2013-12-12 17:27:49', 1, '2014-12-12'),
(6, 4, 'Teste 30maio', 'teste30maio@ciadearte.com', '29a2ec116ff3dbdcf11deec84ac6deaebc3cd595', '2014-05-31 05:29:15', 0, '2014-12-12');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Índices de tabela `tbl_area`
--
ALTER TABLE `tbl_area`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questao_fk` (`questao_fk`);

--
-- Índices de tabela `tbl_card`
--
ALTER TABLE `tbl_card`
  ADD PRIMARY KEY (`id`),
  ADD KEY `area_fk` (`area_fk`);

--
-- Índices de tabela `tbl_custo`
--
ALTER TABLE `tbl_custo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entrega_fk` (`entrega_fk`),
  ADD KEY `tipo_custo_fk` (`tipo_custo_fk`);

--
-- Índices de tabela `tbl_documento`
--
ALTER TABLE `tbl_documento`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_documento_card`
--
ALTER TABLE `tbl_documento_card`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documento_fk` (`documento_fk`),
  ADD KEY `card_fk` (`card_fk`);

--
-- Índices de tabela `tbl_entrega`
--
ALTER TABLE `tbl_entrega`
  ADD PRIMARY KEY (`id`),
  ADD KEY `card_fk` (`card_fk`);

--
-- Índices de tabela `tbl_funcionalidade`
--
ALTER TABLE `tbl_funcionalidade`
  ADD PRIMARY KEY (`fun_id`);

--
-- Índices de tabela `tbl_grupo`
--
ALTER TABLE `tbl_grupo`
  ADD PRIMARY KEY (`gru_id`);

--
-- Índices de tabela `tbl_link`
--
ALTER TABLE `tbl_link`
  ADD PRIMARY KEY (`id`),
  ADD KEY `card_de` (`card_de`),
  ADD KEY `card_para` (`card_para`);

--
-- Índices de tabela `tbl_modulo`
--
ALTER TABLE `tbl_modulo`
  ADD PRIMARY KEY (`mod_id`);

--
-- Índices de tabela `tbl_permissao`
--
ALTER TABLE `tbl_permissao`
  ADD PRIMARY KEY (`per_id`);

--
-- Índices de tabela `tbl_prazo`
--
ALTER TABLE `tbl_prazo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entrega_fk` (`entrega_fk`);

--
-- Índices de tabela `tbl_projeto`
--
ALTER TABLE `tbl_projeto`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_questao`
--
ALTER TABLE `tbl_questao`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_tipo_custo`
--
ALTER TABLE `tbl_tipo_custo`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`usu_id`),
  ADD UNIQUE KEY `usu_email` (`usu_email`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `tbl_area`
--
ALTER TABLE `tbl_area`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `tbl_card`
--
ALTER TABLE `tbl_card`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `tbl_custo`
--
ALTER TABLE `tbl_custo`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_documento`
--
ALTER TABLE `tbl_documento`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_documento_card`
--
ALTER TABLE `tbl_documento_card`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_entrega`
--
ALTER TABLE `tbl_entrega`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_funcionalidade`
--
ALTER TABLE `tbl_funcionalidade`
  MODIFY `fun_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tbl_grupo`
--
ALTER TABLE `tbl_grupo`
  MODIFY `gru_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbl_link`
--
ALTER TABLE `tbl_link`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tbl_modulo`
--
ALTER TABLE `tbl_modulo`
  MODIFY `mod_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbl_permissao`
--
ALTER TABLE `tbl_permissao`
  MODIFY `per_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tbl_prazo`
--
ALTER TABLE `tbl_prazo`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_projeto`
--
ALTER TABLE `tbl_projeto`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbl_questao`
--
ALTER TABLE `tbl_questao`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbl_tipo_custo`
--
ALTER TABLE `tbl_tipo_custo`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `usu_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `tbl_area`
--
ALTER TABLE `tbl_area`
  ADD CONSTRAINT `tbl_area_ibfk_1` FOREIGN KEY (`questao_fk`) REFERENCES `tbl_questao` (`id`);

--
-- Restrições para tabelas `tbl_card`
--
ALTER TABLE `tbl_card`
  ADD CONSTRAINT `tbl_card_ibfk_1` FOREIGN KEY (`area_fk`) REFERENCES `tbl_area` (`id`);

--
-- Restrições para tabelas `tbl_custo`
--
ALTER TABLE `tbl_custo`
  ADD CONSTRAINT `tbl_custo_ibfk_1` FOREIGN KEY (`entrega_fk`) REFERENCES `tbl_entrega` (`id`),
  ADD CONSTRAINT `tbl_custo_ibfk_2` FOREIGN KEY (`tipo_custo_fk`) REFERENCES `tbl_tipo_custo` (`id`);

--
-- Restrições para tabelas `tbl_documento_card`
--
ALTER TABLE `tbl_documento_card`
  ADD CONSTRAINT `tbl_documento_card_ibfk_1` FOREIGN KEY (`documento_fk`) REFERENCES `tbl_documento` (`id`),
  ADD CONSTRAINT `tbl_documento_card_ibfk_2` FOREIGN KEY (`card_fk`) REFERENCES `tbl_card` (`id`);

--
-- Restrições para tabelas `tbl_entrega`
--
ALTER TABLE `tbl_entrega`
  ADD CONSTRAINT `tbl_entrega_ibfk_1` FOREIGN KEY (`card_fk`) REFERENCES `tbl_card` (`id`);

--
-- Restrições para tabelas `tbl_link`
--
ALTER TABLE `tbl_link`
  ADD CONSTRAINT `tbl_link_ibfk_1` FOREIGN KEY (`card_de`) REFERENCES `tbl_card` (`id`),
  ADD CONSTRAINT `tbl_link_ibfk_2` FOREIGN KEY (`card_para`) REFERENCES `tbl_card` (`id`);

--
-- Restrições para tabelas `tbl_prazo`
--
ALTER TABLE `tbl_prazo`
  ADD CONSTRAINT `tbl_prazo_ibfk_1` FOREIGN KEY (`entrega_fk`) REFERENCES `tbl_entrega` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
