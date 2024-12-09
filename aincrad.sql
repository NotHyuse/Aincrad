-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2024 at 12:36 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aincrad`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_types`
--

CREATE TABLE `account_types` (
  `Account_Type_ID` int(1) NOT NULL,
  `Account_Type_Name` char(255) DEFAULT NULL,
  `Account_Type_Access` char(255) DEFAULT NULL,
  `Account_Type_Description` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `boot_servers`
--

CREATE TABLE `boot_servers` (
  `Boot_Server_ID_PK` int(1) NOT NULL,
  `Server_IP` char(15) DEFAULT NULL,
  `Server_Name` char(15) DEFAULT NULL,
  `Boot_File_Path` varchar(4096) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `business_datajt`
--

CREATE TABLE `business_datajt` (
  `Business_Report_ID_FK` int(1) DEFAULT NULL,
  `Business_Expenses_ID_FK` int(2) DEFAULT NULL,
  `Permit_ID_FK` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `business_permit`
--

CREATE TABLE `business_permit` (
  `Permit_ID_PK` int(2) NOT NULL,
  `Permit_Name` char(255) DEFAULT NULL,
  `Issued_By` char(255) DEFAULT NULL,
  `Expiration_Date` date DEFAULT NULL,
  `Cost_Of_Permit` float(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `business_report_per_month`
--

CREATE TABLE `business_report_per_month` (
  `Business_Report_ID_PK` int(1) NOT NULL,
  `Employee_ID_FK` int(2) DEFAULT NULL,
  `Transaction_Total` float(10,2) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Profit` float(10,2) DEFAULT NULL,
  `Losses` float(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_ID_PK` int(10) NOT NULL,
  `Customer_Fullname` char(255) DEFAULT NULL,
  `Customer_Username` char(255) DEFAULT NULL,
  `Customer_Address` varchar(512) DEFAULT NULL,
  `Customer_Birthday` date DEFAULT NULL,
  `Customer_Balance` float(10,2) DEFAULT NULL,
  `Customer_Password` varchar(512) DEFAULT NULL,
  `Account_Type_ID_FK` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_ID_PK`, `Customer_Fullname`, `Customer_Username`, `Customer_Address`, `Customer_Birthday`, `Customer_Balance`, `Customer_Password`, `Account_Type_ID_FK`) VALUES
(4, 'CJ Legaspi', 'Hyuse', NULL, NULL, NULL, '25d55ad283aa400af464c76d713c07ad', NULL),
(5, 'Keissha', 'Luna', NULL, NULL, NULL, '25d55ad283aa400af464c76d713c07ad', NULL),
(6, 'Josh', 'Zentexesus', NULL, NULL, NULL, '25d55ad283aa400af464c76d713c07ad', NULL),
(7, 'Vince', 'bins0y', NULL, NULL, NULL, '25d55ad283aa400af464c76d713c07ad', NULL),
(8, 'testsession1', 'SGB_Password', NULL, NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dhcp_settings`
--

CREATE TABLE `dhcp_settings` (
  `DHCP_ID_PK` int(2) NOT NULL,
  `Server_IP` char(15) DEFAULT NULL,
  `IP_RANGE_START` char(15) DEFAULT NULL,
  `IP_RANGE_END` char(15) DEFAULT NULL,
  `GATEWAY_IP` char(15) DEFAULT NULL,
  `DNS_IP` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Employee_ID_PK` int(2) NOT NULL,
  `Employee_Name` char(255) DEFAULT NULL,
  `Employee_Address` varchar(512) DEFAULT NULL,
  `Employee_TypeFK` int(1) DEFAULT NULL,
  `Employee_Password` varchar(512) DEFAULT NULL,
  `Account_Type_ID_FK` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_types`
--

CREATE TABLE `employee_types` (
  `Employee_Type_ID_PK` int(1) NOT NULL,
  `Employee_Type_Name` char(255) DEFAULT NULL,
  `Employee_Type_Description` char(255) DEFAULT NULL,
  `Employee_Type_Salary` float(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses_per_month`
--

CREATE TABLE `expenses_per_month` (
  `Business_Expenses_ID_PK` int(2) NOT NULL,
  `Water_Bill` float(10,2) DEFAULT NULL,
  `Water_Service_Provider` char(255) DEFAULT NULL,
  `Internet_Bill` float(10,2) DEFAULT NULL,
  `Internet_Service_Provider` char(255) DEFAULT NULL,
  `Electrictiy_Bill` float(10,2) DEFAULT NULL,
  `Electricity_Provider` char(255) DEFAULT NULL,
  `Employees_Salary_Total` float(10,2) DEFAULT NULL,
  `All_Maintenance_Expenses` float(10,2) DEFAULT NULL,
  `Month_and_Year_of_Bills` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `food_cart_jt`
--

CREATE TABLE `food_cart_jt` (
  `Food_Cart_Entry_ID_PK` int(10) NOT NULL,
  `Transaction_Cart_ID_FK` int(10) DEFAULT NULL,
  `Food_Item_ID_FK` int(2) DEFAULT NULL,
  `Food_Item_Order_Quantity` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `food_items`
--

CREATE TABLE `food_items` (
  `Food_Item_ID_PK` int(2) NOT NULL,
  `Food_Name` char(255) DEFAULT NULL,
  `Food_Type_ID_FK` int(1) DEFAULT NULL,
  `Food_Price` float(10,2) DEFAULT NULL,
  `Food_Original_Price` float(10,2) DEFAULT NULL,
  `Food_Quantity_per_Piece` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `food_type`
--

CREATE TABLE `food_type` (
  `Food_Type_ID_PK` int(1) NOT NULL,
  `Food_Type_Name` char(255) DEFAULT NULL,
  `Food_Type_Description` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Payment_ID_PK` int(5) NOT NULL,
  `Payment_Amount` float(10,2) DEFAULT NULL,
  `Payment_Date` date DEFAULT NULL,
  `Payment_Method_FK` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `Payment_Method_ID_PK` int(1) NOT NULL,
  `Payment_Method_Name` char(255) DEFAULT NULL,
  `Payment_Method_Description` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pc`
--

CREATE TABLE `pc` (
  `PC_ID_PK` int(2) NOT NULL,
  `PC_Assigned_Number` int(2) DEFAULT NULL,
  `PC_Type_ID_FK` int(1) DEFAULT NULL,
  `MAC_Address` char(17) DEFAULT NULL,
  `DHCP_Config_ID_FK` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pc_configurations`
--

CREATE TABLE `pc_configurations` (
  `Config_ID_PK` int(1) NOT NULL,
  `Config_Name` char(255) DEFAULT NULL,
  `NFS_MOUNT_PATH` varchar(255) DEFAULT NULL,
  `Config_settings` varchar(255) DEFAULT NULL,
  `DHCP_Lease_Time` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pc_specs`
--

CREATE TABLE `pc_specs` (
  `PC_SPECS_ID_PK` int(1) NOT NULL,
  `PC_SPECS_NAME` char(255) DEFAULT NULL,
  `PC_SPECS_DESCRIPTION` char(255) DEFAULT NULL,
  `PC_SPECS_ORIGINAL_PRICE` float(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pc_types`
--

CREATE TABLE `pc_types` (
  `PC_TYPE_ID_PK` int(1) NOT NULL,
  `PC_Type_Name` char(255) DEFAULT NULL,
  `PC_SPECS_ID_FK` int(1) DEFAULT NULL,
  `PC_PRICE_PER_HR_PHP` float(10,2) DEFAULT NULL,
  `BOOT_SERVER_ID_FK` int(1) DEFAULT NULL,
  `CONFIG_ID_FK` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pc_usage_jt`
--

CREATE TABLE `pc_usage_jt` (
  `PC_ID_FK` int(2) DEFAULT NULL,
  `Customer_ID_FK` int(10) DEFAULT NULL,
  `Hours_Used` time DEFAULT NULL,
  `Balance_Consumed` float(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE `product_list` (
  `Product_ID_PK` int(2) NOT NULL,
  `Product_Price` float(10,2) DEFAULT NULL,
  `Credits_Bought` float(10,2) DEFAULT NULL,
  `Description` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `Transaction_ID_PK` int(10) NOT NULL,
  `Transaction_Date` date DEFAULT NULL,
  `Transaction_Total` float(10,2) DEFAULT NULL,
  `Employee_ID_FK` int(2) DEFAULT NULL,
  `Payment_ID_FK` int(5) DEFAULT NULL,
  `Transaction_Cart_ID_FK` int(10) DEFAULT NULL,
  `Customer_ID_FK` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_cart`
--

CREATE TABLE `transaction_cart` (
  `Transaction_Cart_ID_PK` int(10) NOT NULL,
  `Product_ID_FK` int(2) DEFAULT NULL,
  `Product_Quantity` int(2) DEFAULT NULL,
  `Total_Amount_Paid` float(10,2) DEFAULT NULL,
  `Total_Change` float(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_types`
--
ALTER TABLE `account_types`
  ADD PRIMARY KEY (`Account_Type_ID`);

--
-- Indexes for table `boot_servers`
--
ALTER TABLE `boot_servers`
  ADD PRIMARY KEY (`Boot_Server_ID_PK`);

--
-- Indexes for table `business_datajt`
--
ALTER TABLE `business_datajt`
  ADD KEY `BUSINESS_REPORT_ID_FK` (`Business_Report_ID_FK`),
  ADD KEY `BUSINESS_EXPENSES_ID_FK` (`Business_Expenses_ID_FK`),
  ADD KEY `PERMIT_ID_FK` (`Permit_ID_FK`);

--
-- Indexes for table `business_permit`
--
ALTER TABLE `business_permit`
  ADD PRIMARY KEY (`Permit_ID_PK`);

--
-- Indexes for table `business_report_per_month`
--
ALTER TABLE `business_report_per_month`
  ADD PRIMARY KEY (`Business_Report_ID_PK`),
  ADD KEY `EMPLOYEE_ID_FK` (`Employee_ID_FK`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_ID_PK`),
  ADD KEY `Account_Type_ID_FK` (`Account_Type_ID_FK`);

--
-- Indexes for table `dhcp_settings`
--
ALTER TABLE `dhcp_settings`
  ADD PRIMARY KEY (`DHCP_ID_PK`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Employee_ID_PK`),
  ADD KEY `EMPLOYEE_TYPEFK` (`Employee_TypeFK`),
  ADD KEY `Account_Type_ID_FK` (`Account_Type_ID_FK`);

--
-- Indexes for table `employee_types`
--
ALTER TABLE `employee_types`
  ADD PRIMARY KEY (`Employee_Type_ID_PK`);

--
-- Indexes for table `expenses_per_month`
--
ALTER TABLE `expenses_per_month`
  ADD PRIMARY KEY (`Business_Expenses_ID_PK`);

--
-- Indexes for table `food_cart_jt`
--
ALTER TABLE `food_cart_jt`
  ADD PRIMARY KEY (`Food_Cart_Entry_ID_PK`),
  ADD KEY `TRANSACTION_CART_ID_FK` (`Transaction_Cart_ID_FK`),
  ADD KEY `FOOD_ITEM_ID_FK` (`Food_Item_ID_FK`);

--
-- Indexes for table `food_items`
--
ALTER TABLE `food_items`
  ADD PRIMARY KEY (`Food_Item_ID_PK`),
  ADD KEY `FOOD_TYPE_ID_FK` (`Food_Type_ID_FK`);

--
-- Indexes for table `food_type`
--
ALTER TABLE `food_type`
  ADD PRIMARY KEY (`Food_Type_ID_PK`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Payment_ID_PK`),
  ADD KEY `PAYMENT_METHOD_FK` (`Payment_Method_FK`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`Payment_Method_ID_PK`);

--
-- Indexes for table `pc`
--
ALTER TABLE `pc`
  ADD PRIMARY KEY (`PC_ID_PK`),
  ADD KEY `PC_TYPE_ID_FK` (`PC_Type_ID_FK`),
  ADD KEY `DHCP_CONFIG_ID_FK` (`DHCP_Config_ID_FK`);

--
-- Indexes for table `pc_configurations`
--
ALTER TABLE `pc_configurations`
  ADD PRIMARY KEY (`Config_ID_PK`);

--
-- Indexes for table `pc_specs`
--
ALTER TABLE `pc_specs`
  ADD PRIMARY KEY (`PC_SPECS_ID_PK`);

--
-- Indexes for table `pc_types`
--
ALTER TABLE `pc_types`
  ADD PRIMARY KEY (`PC_TYPE_ID_PK`),
  ADD KEY `PC_SPECS_ID_FK` (`PC_SPECS_ID_FK`),
  ADD KEY `BOOT_SERVER_ID_FK` (`BOOT_SERVER_ID_FK`),
  ADD KEY `CONFIG_ID_FK` (`CONFIG_ID_FK`);

--
-- Indexes for table `pc_usage_jt`
--
ALTER TABLE `pc_usage_jt`
  ADD KEY `CUSTOMER_ID_FK` (`Customer_ID_FK`),
  ADD KEY `PC_ID_FK` (`PC_ID_FK`);

--
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`Product_ID_PK`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`Transaction_ID_PK`),
  ADD KEY `Employee_ID_FK` (`Employee_ID_FK`),
  ADD KEY `Transaction_Cart_ID_FK` (`Transaction_Cart_ID_FK`),
  ADD KEY `Customer_ID_FK` (`Customer_ID_FK`),
  ADD KEY `Payment_ID_FK` (`Payment_ID_FK`);

--
-- Indexes for table `transaction_cart`
--
ALTER TABLE `transaction_cart`
  ADD PRIMARY KEY (`Transaction_Cart_ID_PK`),
  ADD KEY `Product_ID_FK` (`Product_ID_FK`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_types`
--
ALTER TABLE `account_types`
  MODIFY `Account_Type_ID` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `boot_servers`
--
ALTER TABLE `boot_servers`
  MODIFY `Boot_Server_ID_PK` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `business_permit`
--
ALTER TABLE `business_permit`
  MODIFY `Permit_ID_PK` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `business_report_per_month`
--
ALTER TABLE `business_report_per_month`
  MODIFY `Business_Report_ID_PK` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Customer_ID_PK` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dhcp_settings`
--
ALTER TABLE `dhcp_settings`
  MODIFY `DHCP_ID_PK` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `Employee_ID_PK` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_types`
--
ALTER TABLE `employee_types`
  MODIFY `Employee_Type_ID_PK` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food_cart_jt`
--
ALTER TABLE `food_cart_jt`
  MODIFY `Food_Cart_Entry_ID_PK` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food_items`
--
ALTER TABLE `food_items`
  MODIFY `Food_Item_ID_PK` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food_type`
--
ALTER TABLE `food_type`
  MODIFY `Food_Type_ID_PK` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `Payment_ID_PK` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `Payment_Method_ID_PK` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pc`
--
ALTER TABLE `pc`
  MODIFY `PC_ID_PK` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pc_configurations`
--
ALTER TABLE `pc_configurations`
  MODIFY `Config_ID_PK` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pc_specs`
--
ALTER TABLE `pc_specs`
  MODIFY `PC_SPECS_ID_PK` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pc_types`
--
ALTER TABLE `pc_types`
  MODIFY `PC_TYPE_ID_PK` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `Product_ID_PK` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `Transaction_ID_PK` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction_cart`
--
ALTER TABLE `transaction_cart`
  MODIFY `Transaction_Cart_ID_PK` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `business_datajt`
--
ALTER TABLE `business_datajt`
  ADD CONSTRAINT `BUSINESS_EXPENSES_ID_FK` FOREIGN KEY (`Business_Expenses_ID_FK`) REFERENCES `expenses_per_month` (`Business_Expenses_ID_PK`),
  ADD CONSTRAINT `BUSINESS_REPORT_ID_FK` FOREIGN KEY (`Business_Report_ID_FK`) REFERENCES `business_report_per_month` (`Business_Report_ID_PK`),
  ADD CONSTRAINT `PERMIT_ID_FK` FOREIGN KEY (`Permit_ID_FK`) REFERENCES `business_permit` (`Permit_ID_PK`);

--
-- Constraints for table `business_report_per_month`
--
ALTER TABLE `business_report_per_month`
  ADD CONSTRAINT `EMPLOYEE_ID_FK` FOREIGN KEY (`Employee_ID_FK`) REFERENCES `employee` (`Employee_ID_PK`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`Account_Type_ID_FK`) REFERENCES `account_types` (`Account_Type_ID`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `EMPLOYEE_TYPEFK` FOREIGN KEY (`Employee_TypeFK`) REFERENCES `employee_types` (`Employee_Type_ID_PK`),
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`Account_Type_ID_FK`) REFERENCES `account_types` (`Account_Type_ID`);

--
-- Constraints for table `food_cart_jt`
--
ALTER TABLE `food_cart_jt`
  ADD CONSTRAINT `FOOD_ITEM_ID_FK` FOREIGN KEY (`Food_Item_ID_FK`) REFERENCES `food_items` (`Food_Item_ID_PK`),
  ADD CONSTRAINT `TRANSACTION_CART_ID_FK` FOREIGN KEY (`Transaction_Cart_ID_FK`) REFERENCES `transaction_cart` (`Transaction_Cart_ID_PK`);

--
-- Constraints for table `food_items`
--
ALTER TABLE `food_items`
  ADD CONSTRAINT `FOOD_TYPE_ID_FK` FOREIGN KEY (`Food_Type_ID_FK`) REFERENCES `food_type` (`Food_Type_ID_PK`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `PAYMENT_METHOD_FK` FOREIGN KEY (`Payment_Method_FK`) REFERENCES `payment_method` (`Payment_Method_ID_PK`);

--
-- Constraints for table `pc`
--
ALTER TABLE `pc`
  ADD CONSTRAINT `DHCP_CONFIG_ID_FK` FOREIGN KEY (`DHCP_Config_ID_FK`) REFERENCES `dhcp_settings` (`DHCP_ID_PK`),
  ADD CONSTRAINT `PC_TYPE_ID_FK` FOREIGN KEY (`PC_Type_ID_FK`) REFERENCES `pc_types` (`PC_TYPE_ID_PK`);

--
-- Constraints for table `pc_types`
--
ALTER TABLE `pc_types`
  ADD CONSTRAINT `BOOT_SERVER_ID_FK` FOREIGN KEY (`BOOT_SERVER_ID_FK`) REFERENCES `boot_servers` (`Boot_Server_ID_PK`),
  ADD CONSTRAINT `PC_SPECS_ID_FK` FOREIGN KEY (`PC_SPECS_ID_FK`) REFERENCES `pc_specs` (`PC_SPECS_ID_PK`),
  ADD CONSTRAINT `pc_types_ibfk_1` FOREIGN KEY (`CONFIG_ID_FK`) REFERENCES `pc_configurations` (`Config_ID_PK`);

--
-- Constraints for table `pc_usage_jt`
--
ALTER TABLE `pc_usage_jt`
  ADD CONSTRAINT `CUSTOMER_ID_FK` FOREIGN KEY (`Customer_ID_FK`) REFERENCES `customer` (`Customer_ID_PK`),
  ADD CONSTRAINT `PC_ID_FK` FOREIGN KEY (`PC_ID_FK`) REFERENCES `pc` (`PC_ID_PK`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`Employee_ID_FK`) REFERENCES `employee` (`Employee_ID_PK`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`Transaction_Cart_ID_FK`) REFERENCES `transaction_cart` (`Transaction_Cart_ID_PK`),
  ADD CONSTRAINT `transaction_ibfk_3` FOREIGN KEY (`Customer_ID_FK`) REFERENCES `customer` (`Customer_ID_PK`),
  ADD CONSTRAINT `transaction_ibfk_4` FOREIGN KEY (`Payment_ID_FK`) REFERENCES `payment` (`Payment_ID_PK`);

--
-- Constraints for table `transaction_cart`
--
ALTER TABLE `transaction_cart`
  ADD CONSTRAINT `transaction_cart_ibfk_1` FOREIGN KEY (`Product_ID_FK`) REFERENCES `product_list` (`Product_ID_PK`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
