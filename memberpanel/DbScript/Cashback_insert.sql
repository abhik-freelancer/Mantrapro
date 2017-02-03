/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.6.11 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `cash_back_master` (
	`id` int ,
	`member_id` int ,
	`membership_no` varchar ,
	`validity_string` varchar ,
	`branch` varchar ,
	`processing_month` varchar ,
	`process_year` int ,
	`processing_date` datetime ,
	`attendence_rate` Decimal ,
	`attendence_point` int ,
	`purchase_amount` double ,
	`purchase_point` int ,
	`referal_point` int ,
	`total_point` int ,
	`cash_back_amt` int 
); 
insert into `cash_back_master` (`id`, `member_id`, `membership_no`, `validity_string`, `branch`, `processing_month`, `process_year`, `processing_date`, `attendence_rate`, `attendence_point`, `purchase_amount`, `purchase_point`, `referal_point`, `total_point`, `cash_back_amt`) values('344','8126','MHCMGGC00000145','20-05-2015 - 19-05-2016','CM','Apr','2016','2016-04-22 00:00:00','71.39','20','0.00','0','0','20','600');
insert into `cash_back_master` (`id`, `member_id`, `membership_no`, `validity_string`, `branch`, `processing_month`, `process_year`, `processing_date`, `attendence_rate`, `attendence_point`, `purchase_amount`, `purchase_point`, `referal_point`, `total_point`, `cash_back_amt`) values('345','8126','MHCMGGC00000145','20-05-2015 - 19-05-2016','CM','Jun','2016','2016-06-23 00:00:00','60.35','10','0.00','0','0','10','400');
insert into `cash_back_master` (`id`, `member_id`, `membership_no`, `validity_string`, `branch`, `processing_month`, `process_year`, `processing_date`, `attendence_rate`, `attendence_point`, `purchase_amount`, `purchase_point`, `referal_point`, `total_point`, `cash_back_amt`) values('353','8126','MHCMGGC00000145','20-05-2015 - 19-05-2016','CM','Mar','2017','2016-03-31 00:00:00','70.66','20','0.00','0','0','20','600');
insert into `cash_back_master` (`id`, `member_id`, `membership_no`, `validity_string`, `branch`, `processing_month`, `process_year`, `processing_date`, `attendence_rate`, `attendence_point`, `purchase_amount`, `purchase_point`, `referal_point`, `total_point`, `cash_back_amt`) values('619','8126','MHCMGGC00000145','19-05-2016 - 19-05-2017','CM','Jul','2016','2016-07-25 00:00:00','86.76','30','55.00','0','0','30','800');
insert into `cash_back_master` (`id`, `member_id`, `membership_no`, `validity_string`, `branch`, `processing_month`, `process_year`, `processing_date`, `attendence_rate`, `attendence_point`, `purchase_amount`, `purchase_point`, `referal_point`, `total_point`, `cash_back_amt`) values('1202','8126','MHCMGGC00000145','19-05-2016 - 19-05-2017','CM','Sep','2016','2016-09-06 00:00:00','85.59','30','55.00','0','0','30','800');
insert into `cash_back_master` (`id`, `member_id`, `membership_no`, `validity_string`, `branch`, `processing_month`, `process_year`, `processing_date`, `attendence_rate`, `attendence_point`, `purchase_amount`, `purchase_point`, `referal_point`, `total_point`, `cash_back_amt`) values('2001','8126','MHCMGGC00000145','19-05-2016 - 19-05-2017','CM','Aug','2016','2016-08-31 00:00:00','85.71','30','55.00','0','0','30','800');
insert into `cash_back_master` (`id`, `member_id`, `membership_no`, `validity_string`, `branch`, `processing_month`, `process_year`, `processing_date`, `attendence_rate`, `attendence_point`, `purchase_amount`, `purchase_point`, `referal_point`, `total_point`, `cash_back_amt`) values('3798','8126','MHCMGGC00000145','19-05-2016 - 19-05-2017','CM','Oct','2016','2016-10-31 00:00:00','74.10','20','55.00','0','0','20','600');
