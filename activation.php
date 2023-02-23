<?php



    $db = new database();

    $start_server = date("d-m");
    $dt = date("d-m-Y");

    mysqli_query($db->con,"CREATE TABLE IF NOT EXISTS `users`(
        `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
        `username` VARCHAR(255) NOT NULL,
        `password` VARCHAR(255) NOT NULL,
        `email` VARCHAR(255) NOT NULL,
        `chance_link` INT(11) NOT NULL DEFAULT '80',
        `balance_ref` FLOAT DEFAULT '0',
        `balance` FLOAT DEFAULT '0',
        `balance_today` FLOAT DEFAULT '0',
        `balance_month` FLOAT DEFAULT '0',
        `total_files` INT(11) DEFAULT '0',
        `total_download` INT(11) DEFAULT '0',
        `login_day` VARCHAR(255) NOT NULL,
        `login_day_ip` VARCHAR(255) NOT NULL,
        `reg_ip` VARCHAR(255) NOT NULL,
        `reg_day` VARCHAR(255) NOT NULL,
        `referral` VARCHAR(255) NOT NULL,
        `date` VARCHAR(255) NOT NULL,
        `token_acitve` VARCHAR(255) NULL,
        `active` VARCHAR(255) DEFAULT '0',
        `payment_type` VARCHAR(255) NULL,
        `payment_account` VARCHAR(255) NULL,
        `pending_payment` VARCHAR(255) DEFAULT '0',
        `total_payment` VARCHAR(255) DEFAULT '0',
        `upgrade` INT(11) DEFAULT '0',
        `upgrade_start` VARCHAR(255) NULL,
        `upgrade_finish` VARCHAR(255) NULL,
        `status` VARCHAR(255) DEFAULT 'on')"
    );

    mysqli_query($db->con,"CREATE TABLE IF NOT EXISTS `files`(
        `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
        `username` VARCHAR(255) NOT NULL,
        `alias` VARCHAR(255) NOT NULL,
        `name` VARCHAR(255) NOT NULL,
        `namefile` VARCHAR(255) NOT NULL,
        `link` VARCHAR(255) NOT NULL,
        `size` VARCHAR(255) NOT NULL,
        `download` INT(11) DEFAULT '0',
        `last_download` VARCHAR(255) NOT NULL,
        `uploaded` VARCHAR(255) NOT NULL,
        `earnings_total` FLOAT DEFAULT '0',
        `plan` INT(11) DEFAULT '0',
        `status` VARCHAR(255) DEFAULT 'on')"
    );

    mysqli_query($db->con,"CREATE TABLE IF NOT EXISTS `admin`(
        `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
        `name` VARCHAR(255) NOT NULL,
        `password` VARCHAR(255) NOT NULL,
        `email` VARCHAR(255)  NULL,
        `login_day` VARCHAR(255)  NULL,
        `login_day_ip` VARCHAR(255)  NULL,
        `reg_ip` VARCHAR(255)  NULL,
        `reg_day` VARCHAR(255)  NULL,
        `lvl` VARCHAR(255)  NULL,
        `status` VARCHAR(255) DEFAULT 'on')"
    );

    mysqli_query($db->con,"CREATE TABLE IF NOT EXISTS `reports`(
        `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
        `username` VARCHAR(255)  NULL,
        `date` LONGTEXT  NULL,
        `download` LONGTEXT  NULL,
        `earnings_download` LONGTEXT  NULL,
        `cpm` LONGTEXT  NULL,
        `referrals` LONGTEXT  NULL,
        `total` LONGTEXT  NULL)"
    );

    mysqli_query($db->con,"CREATE TABLE IF NOT EXISTS `reportsday`(
        `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
        `username` VARCHAR(255) NULL,
        `date` VARCHAR(255) NULL,
        `download` INT(11) DEFAULT '0',
        `earnings_download` FLOAT DEFAULT '0',
        `cpm` FLOAT DEFAULT '0',
        `referrals` FLOAT DEFAULT '0',
        `total` FLOAT DEFAULT '0')"
    );
    
    mysqli_query($db->con,"CREATE TABLE IF NOT EXISTS `reportsnonview`(
        `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
        `date` VARCHAR(255) NULL,
        `download` INT(11) DEFAULT '0',
        `earnings_download` FLOAT DEFAULT '0',
        `cpm` FLOAT DEFAULT '0',
        `total` FLOAT DEFAULT '0')"
    );

    mysqli_query($db->con,"CREATE TABLE IF NOT EXISTS `msg`(
        `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
        `username` VARCHAR(255) NULL,
        `type` VARCHAR(255) NULL,
        `subject` VARCHAR(255) NULL,
        `message` TEXT NULL,
        `date` VARCHAR(255) NULL,
        `status` VARCHAR(255) DEFAULT '0')"
    );

    mysqli_query($db->con,"CREATE TABLE IF NOT EXISTS `notification`(
        `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
        `user` VARCHAR(255) NULL,
        `title` VARCHAR(255) NULL,
        `subject` VARCHAR(255) NULL,
        `message` TEXT NULL,
        `date` VARCHAR(255) NULL,
        `icon` VARCHAR(255) NULL,
        `color` VARCHAR(255) NULL,
        `status` VARCHAR(255) DEFAULT '0')"
    );

    mysqli_query($db->con,"CREATE TABLE IF NOT EXISTS `admin_notification`(
        `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
        `admin` VARCHAR(255) NULL,
        `title` VARCHAR(255) NULL,
        `subject` VARCHAR(255) NULL,
        `message` TEXT NULL,
        `date` VARCHAR(255) NULL,
        `icon` VARCHAR(255) NULL,
        `color` VARCHAR(255) NULL,
        `status` VARCHAR(255) DEFAULT '0')"
    );

    mysqli_query($db->con,"CREATE TABLE IF NOT EXISTS `items` (
        `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
        `title` VARCHAR(255) NULL,
        `item1` VARCHAR(255) NULL,
        `item2` VARCHAR(255) NULL,
        `item3` VARCHAR(255) NULL,
        `item4` VARCHAR(255) NULL,
        `item5` VARCHAR(255) NULL,
        `status` VARCHAR(255) DEFAULT 'on')"
    );

    mysqli_query($db->con,"CREATE TABLE IF NOT EXISTS `visitor`(
        `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
        `alias` VARCHAR(255) NULL,
        `source` VARCHAR(255) NULL,
        `ip` VARCHAR(255) NULL,
        `date` VARCHAR(255) NULL,
        `country` VARCHAR(255) NULL
       )"
    );

    mysqli_query($db->con,"CREATE TABLE IF NOT EXISTS `q_country`(
        `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
        `date` VARCHAR(255) NULL,
        `country` VARCHAR(255) NULL,
        `qte` INT(11))"
        
    );

    mysqli_query($db->con,"CREATE TABLE IF NOT EXISTS `referre`(
        `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
        `date` VARCHAR(255) NULL,
        `alias` VARCHAR(255) NULL,
        `source` VARCHAR(255) NULL,
        `country` VARCHAR(255) NULL)"    
    );

    mysqli_query($db->con,"CREATE TABLE IF NOT EXISTS `rates`(
        `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
        `country` VARCHAR(255) NULL,
        `code` VARCHAR(5) NULL,
        `Pub_file` FLOAT NULL,
        `status` VARCHAR(255) DEFAULT 'on')"    
    );

    mysqli_query($db->con,"CREATE TABLE IF NOT EXISTS `withdraw`(
        `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
        `method` VARCHAR(255) NULL,
        `amount` VARCHAR(255) NULL,
        `status` VARCHAR(255) DEFAULT 'on')"   
    );

    mysqli_query($db->con,"CREATE TABLE IF NOT EXISTS `payments`(
        `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
        `username` VARCHAR(255) NULL,
        `date` VARCHAR(255) NULL,
        `method` VARCHAR(255) NULL,
        `account` VARCHAR(255) NULL,
        `balance` VARCHAR(255) NULL,
        `ref_balance` VARCHAR(255) NULL,
        `amount` VARCHAR(255) NULL,
        `status` VARCHAR(255) DEFAULT 'Pending')"   
    );

    mysqli_query($db->con,"CREATE TABLE IF NOT EXISTS `campaigns`(
        `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
        `adsName` VARCHAR(255) NULL,
        `adsType` VARCHAR(255) NULL,
        `Url` VARCHAR(255) NULL,
        `Banner` VARCHAR(255) NULL,
        `HtmlText` LONGTEXT NULL,
        `views` INT(11) DEFAULT 0,
        `status` VARCHAR(255) DEFAULT 'Active')"
    );

    mysqli_query($db->con,"CREATE TABLE IF NOT EXISTS `setting`(
        `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
        `settingName` VARCHAR(255) NULL,
        `settingvalue` VARCHAR(255) NULL,
        `status` VARCHAR(255) DEFAULT 'on')"
    );

    mysqli_query($db->con,"CREATE TABLE IF NOT EXISTS `pages`(
        `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
        `title` VARCHAR(255) NULL,
        `content` LONGTEXT NULL)"
    );

    mysqli_query($db->con,"CREATE TABLE IF NOT EXISTS `transaction_plan`(
        `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
        `custom` VARCHAR(255) NULL,
        `amount` VARCHAR(255) NULL,
        `payments_date` VARCHAR(255) NULL,
        `payments_status` VARCHAR(255) NULL,
        `payer_email` VARCHAR(255) NULL,
        `txn_id` VARCHAR(255) NULL,
        `item_name` VARCHAR(255) NULL,
        `status` VARCHAR(255) DEFAULT 'on')"
    );

    mysqli_query($db->con,"CREATE TABLE IF NOT EXISTS `membership_plan`(
        `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
        `month` VARCHAR(255) NULL,
        `year` VARCHAR(255) NULL,
        `max_size` VARCHAR(255) NULL,
        `cpm` VARCHAR(255) NULL,
        `delete_files` VARCHAR(255) NULL,
        `remove_ads` VARCHAR(255) NULL,
        `download_delay` VARCHAR(255) NULL,
        `captcha` VARCHAR(255) NULL,
        `status` VARCHAR(255) DEFAULT 'on')"
    );

   
        


    ActiveRates($db);
    ActiveSettings($db);
    ActivePages($db);
    AddTestCampaign($db);
    ActiveMemberShip($db);
    ActiveFisrtInsert($db);
    UpdateScript($db,"2.6.0");

   



?>