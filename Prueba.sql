-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 24-09-2015 a las 17:26:32
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `epicorTest905`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Customer`
--

CREATE TABLE IF NOT EXISTS `Customer` (
  `CustNum` int(11) NOT NULL,
  `CustID` int(11) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Address1` varchar(30) NOT NULL,
  `Address2` varchar(30) NOT NULL,
  `Address3` varchar(30) NOT NULL,
  `Phone` int(12) NOT NULL,
  `Fax` int(20) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `fiscalNum` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `JobHead`
--

CREATE TABLE IF NOT EXISTS `JobHead` (
  `JobNum` int(11) NOT NULL,
  `OrderNum` int(11) NOT NULL,
  `OrderLine` int(11) NOT NULL,
  `PromisseDate` date NOT NULL,
  `OrderComplete` varchar(25) NOT NULL,
  `StartDate` date NOT NULL,
  `CloseDate` date NOT NULL,
  `ResourseID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `OrderDtl`
--

CREATE TABLE IF NOT EXISTS `OrderDtl` (
  `OrderNum` int(11) NOT NULL,
  `OrderLine` int(11) NOT NULL,
  `PartNum` int(11) NOT NULL,
  `PartDesc` varchar(40) NOT NULL,
  `UnitPrice` int(11) NOT NULL,
  `OurQty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `OrderHed`
--

CREATE TABLE IF NOT EXISTS `OrderHed` (
  `OrderNum` int(11) NOT NULL,
  `CustNum` int(11) NOT NULL,
  `OrderDate` date NOT NULL,
  `NeedByDate` date NOT NULL,
  `ShiptoNum` int(11) NOT NULL,
  `SalesPerson` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shipto`
--

CREATE TABLE IF NOT EXISTS `shipto` (
  `shiptoNum` int(11) NOT NULL,
  `CustNum` int(11) NOT NULL,
  `Address1` int(11) NOT NULL,
  `Address2` int(11) NOT NULL,
  `Address3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
