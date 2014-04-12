<?php

/*
 * MODX Files
 */

// backups first
exec('zip -r backup_'.strftime('%Y_%m_%d_%H%M',time()).'_files.zip modx');
echo 'File backup created: backup_files_'.strftime('%Y_%m_%d_%H%M',time()).'.zip'.PHP_EOL;



/*
 * MySQL
 */
 
include_once('modx/core/config/config.inc.php');

// truncate session table
echo 'Truncating MODX session table'.PHP_EOL;
$session_table = $table_prefix.'session';
exec("mysql -u $database_user -p'$database_password' $dbase --execute=\"TRUNCATE TABLE $session_table\"");

// create mysql dump
$sql_file = 'backup_'.strftime('%Y_%m_%d_%H%M',time()).'_database.sql';

exec("mysqldump -u $database_user -p'$database_password' --allow-keywords --add-drop-table --complete-insert --quote-names $dbase > $sql_file"); 
exec("gzip $sql_file");
echo 'MySQL backup created: '.$sql_file.PHP_EOL;

echo 'Backup script done.'.PHP_EOL;
?>