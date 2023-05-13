SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `applications` (
  `id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `email_address` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `employee_ID` int(6) NOT NULL,
  `department` varchar(100) NOT NULL,
  `request_type` varchar(100) NOT NULL,
  `feedback_description` text DEFAULT NULL,
  `feedback_documents_or_images` text DEFAULT NULL,
  `software_hardware_description` text DEFAULT NULL,
  `software_hardware_screenshot` varchar(150) DEFAULT NULL,
  `requisition_approved_form` text DEFAULT NULL,
  `software_hardware_accessories` text DEFAULT NULL,
  `requirement_date` date DEFAULT NULL,
  `is_existing_vendor_or_is_web_link_of_the_item` varchar(10) DEFAULT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Pending',
  `action_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `applications`
  MODIFY `id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
COMMIT;
