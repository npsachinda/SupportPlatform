-- MySQL dump 10.13  Distrib 5.7.30, for Linux (x86_64)
--
-- Host: localhost    Database: supportPlatform
-- ------------------------------------------------------
-- Server version	5.7.30-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (7,'2014_10_12_000000_create_users_table',1),(8,'2019_08_19_000000_create_failed_jobs_table',1),(9,'2020_07_02_112038_create_tickets_table',1),(10,'2014_10_12_100000_create_password_resets_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
INSERT INTO `tickets` VALUES (1,'Nipun Liyanage','A4471GXKK4','Prodcut','vtvgtbtgb','npsachinda@gmail.com','0773607118','Closed','Test agent comment edited cheers fifth',NULL,NULL,'2020-07-02 10:04:05','2020-07-02 14:08:26'),(2,'Saman Perera','NAXWRIGPL2','Service','Phone not answering','npsachinda@gmail.com','0773607118','Closed',NULL,NULL,NULL,'2020-07-02 14:33:47','2020-07-02 14:34:29'),(3,'Tharindu kodikara','VQ8PY7WTFK','Prodcut','Not working','nipunsachindaliyanage@yahoo.com','0773607118','Open',NULL,NULL,NULL,'2020-07-02 14:42:33','2020-07-02 14:46:28'),(4,'Sahan Liyanage','Y1X7SVLHPF','Service','Interrupting','nipunsachindaliyanage@yahoo.com','0773607118','Create',NULL,NULL,NULL,'2020-07-02 14:43:05','2020-07-02 14:43:05'),(5,'Manisha Gamage','WX5PR0HMFJ','Prodcut','Not working','nipunsachindaliyanage@yahoo.com','0773607118','Create',NULL,NULL,NULL,'2020-07-02 14:43:37','2020-07-02 14:43:37'),(6,'Athula kumarasiri','G3401Y6M4X','Service','Destroyed','nipunsachindaliyanage@yahoo.com','0773607118','Create',NULL,NULL,NULL,'2020-07-02 14:44:21','2020-07-02 14:44:21');
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Nipun','npsachinda@gmail.com',NULL,'$2y$10$bsrQ36Ol6/9tbFx447NaD.AmnvXhaJar5cLeYRK4Frp.lmxBw8qgO',0,'doFw5YfQBRoTg3LlTxecpgoWZViyu8EMAvHlMJwS0Bk9Gfk5W7k4OMSRUJMu',NULL,'2020-07-02 12:31:53');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-07-03  2:53:16
