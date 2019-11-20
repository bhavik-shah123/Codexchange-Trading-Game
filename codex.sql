-- MySQL dump 10.13  Distrib 8.0.12, for Win64 (x86_64)
--
-- Host: localhost    Database: codexchange
-- ------------------------------------------------------
-- Server version	8.0.12

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `balance`
--

DROP TABLE IF EXISTS `balance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `balance` (
  `team_name` varchar(45) NOT NULL,
  `bal_at_start_of_round` int(11) DEFAULT NULL,
  `current_bal` int(11) DEFAULT NULL,
  `bal_at_end_of_round` int(11) DEFAULT NULL,
  `diff_in_bal` int(11) DEFAULT NULL,
  PRIMARY KEY (`team_name`),
  CONSTRAINT `team_name` FOREIGN KEY (`team_name`) REFERENCES `details` (`team_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `balance`
--

LOCK TABLES `balance` WRITE;
/*!40000 ALTER TABLE `balance` DISABLE KEYS */;
INSERT INTO `balance` VALUES ('bhavik',NULL,NULL,NULL,NULL),('samarth',NULL,NULL,NULL,NULL),('shubh',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `balance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `current_data`
--

DROP TABLE IF EXISTS `current_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `current_data` (
  `team_name` varchar(45) NOT NULL,
  `current_price` int(11) DEFAULT NULL,
  `availabe_shares` int(11) DEFAULT NULL,
  PRIMARY KEY (`team_name`),
  CONSTRAINT `team_participated` FOREIGN KEY (`team_name`) REFERENCES `balance` (`team_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `current_data`
--

LOCK TABLES `current_data` WRITE;
/*!40000 ALTER TABLE `current_data` DISABLE KEYS */;
INSERT INTO `current_data` VALUES ('bhavik',NULL,NULL),('samarth',NULL,NULL),('shubh',1000,40);
/*!40000 ALTER TABLE `current_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `details`
--

DROP TABLE IF EXISTS `details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `details` (
  `team_name` varchar(45) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `member1` varchar(45) DEFAULT NULL,
  `member2` varchar(45) DEFAULT NULL,
  `member3` varchar(45) DEFAULT NULL,
  `member4` varchar(45) DEFAULT NULL,
  `member5` varchar(45) DEFAULT NULL,
  `member6` varchar(45) DEFAULT NULL,
  `attendance` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`team_name`),
  UNIQUE KEY `team_name_UNIQUE` (`team_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `details`
--

LOCK TABLES `details` WRITE;
/*!40000 ALTER TABLE `details` DISABLE KEYS */;
INSERT INTO `details` VALUES ('bhavik','111','b','h','a','v','i','k','P'),('samarth','222','s','a','m','a','r','t','P'),('shreyans','333','s','h','r','e','y','a','A'),('shubh','s','h','u','b','h','a','g','P');
/*!40000 ALTER TABLE `details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table1`
--

DROP TABLE IF EXISTS `table1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `table1` (
  `team_name` varchar(45) DEFAULT NULL,
  `quantity_bought` int(11) DEFAULT NULL,
  `price_at_which_bought` int(11) DEFAULT NULL,
  `price_at_end_of_round` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table1`
--

LOCK TABLES `table1` WRITE;
/*!40000 ALTER TABLE `table1` DISABLE KEYS */;
INSERT INTO `table1` VALUES ('shubh',10,100,NULL),('shubh',10,100,NULL),('shubh',10,100,NULL),('shubh',10,100,NULL),('shubh',10,100,NULL),('shubh',10,100,NULL),('shubh',10,100,NULL),('shubh',10,100,NULL),('shubh',10,100,NULL),('shubh',10,100,NULL),('shubh',10,100,NULL),('shubh',10,100,NULL);
/*!40000 ALTER TABLE `table1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table2`
--

DROP TABLE IF EXISTS `table2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `table2` (
  `team_name` varchar(45) DEFAULT NULL,
  `quantity_bought` int(11) DEFAULT NULL,
  `price_at_which_bought` int(11) DEFAULT NULL,
  `price_at_end_of_round` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table2`
--

LOCK TABLES `table2` WRITE;
/*!40000 ALTER TABLE `table2` DISABLE KEYS */;
/*!40000 ALTER TABLE `table2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table3`
--

DROP TABLE IF EXISTS `table3`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `table3` (
  `team_name` varchar(45) DEFAULT NULL,
  `quantity_bought` int(11) DEFAULT NULL,
  `price_at_which_bought` int(11) DEFAULT NULL,
  `price_at_end_of_round` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table3`
--

LOCK TABLES `table3` WRITE;
/*!40000 ALTER TABLE `table3` DISABLE KEYS */;
/*!40000 ALTER TABLE `table3` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'codexchange'
--
/*!50003 DROP PROCEDURE IF EXISTS `createTableProcTest` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `createTableProcTest`()
BEGIN
    DECLARE count INT Default 0;
      simple_loop: LOOP
         SET @a := count + 1;
         SET @statement = CONCAT('Create table Table',@a,' (team_name varchar(45),quantity_bought INT,price_at_which_bought INT,price_at_end_of_round INT);');
         PREPARE stmt FROM @statement;
                 EXECUTE stmt;
                 DEALLOCATE PREPARE stmt;
                 SET count = count + 1;
         IF count=(select count(team_name) FROM balance) THEN
            LEAVE simple_loop;
         END IF;
END LOOP simple_loop;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `status` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `status`(IN st boolean, OUT st1 boolean)
BEGIN
 SET st1=st;
 SELECT st1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `test` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `test`(current_data varchar(30),In team varchar(30),OUT ac int)
BEGIN
 select availabe_shares into ac from current_data where team_name=team;
 END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updateSh` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateSh`(IN team_num int(10))
BEGIN
IF (team_num=1) then
	CALL updateShares1('current_data','table1',"shubh",10,100,1);
ELSEIF (team_num=2) then
	CALL updateShares2('current_data','table2',"shubh",10,100,1);
ELSEIF (team_num=3) then
	CALL updateShares3('current_data','table3',"shubh",10,100,1);
END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updateShares1` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateShares1`(current_data varchar(30),table1 varchar(30),
	IN team varchar(10),
    IN shares int(10),
    IN price int(10)
)
BEGIN
	declare ac int;
    select availabe_shares into ac from current_data where team_name=team;
	Start TRANSACTION; 
		Insert into table1 values(team,shares,price,null); 
		IF(ac >= shares)Then
			Update current_data set availabe_shares = availabe_shares-shares where team_name=team; 
		END IF;
        commit;
        DO SLEEP(5);
        CALL status(false,@success);
        IF(@success) then
        Commit;
        else
        update current_data set availabe_shares=availabe_shares+shares where team_name=team;
        commit;
        END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updateShares2` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateShares2`(current_data varchar(30),table2 varchar(30),
	IN team varchar(10),
    IN shares int(10),
    IN price int(10)
)
BEGIN
	declare ac int;
    select availabe_shares into ac from current_data where team_name=team;
	Start TRANSACTION; 
		Insert into table2 values(team,shares,price,null); 
		IF(ac >= shares)Then
			Update current_data set availabe_shares = availabe_shares-shares where team_name=team; 
		END IF;
        commit;
        DO SLEEP(5);
        CALL status(false,@success);
        IF(@success) then
        Commit;
        else
        update current_data set availabe_shares=availabe_shares+shares where team_name=team;
        commit;
        END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updateShares3` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateShares3`(current_data varchar(30),table3 varchar(30),
	IN team varchar(10),
    IN shares int(10),
    IN price int(10)
)
BEGIN
	declare ac int;
    select availabe_shares into ac from current_data where team_name=team;
	Start TRANSACTION; 
		Insert into table3 values(team,shares,price,null); 
		IF(ac >= shares)Then
			Update current_data set availabe_shares = availabe_shares-shares where team_name=team; 
		END IF;
        commit;
        DO SLEEP(5);
        CALL status(false,@success);
        IF(@success) then
        Commit;
        else
        update current_data set availabe_shares=availabe_shares+shares where team_name=team;
        commit;
        END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-04 21:52:35
