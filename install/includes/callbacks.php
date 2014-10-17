<?php

/**
* Callbacks class
*/
class Callbacks extends Callbacks_Core
{
	function install($params = array())
	{
		$dbconf = array(
			'db_host' => $_SESSION['params']['db_hostname'],
			'db_user' => $_SESSION['params']['db_username'],
			'db_pass' => $_SESSION['params']['db_password'],
			'db_name' => $_SESSION['params']['db_name'],
			'db_encoding' => 'utf8',
		);
		if ( !$this->db_init($dbconf) ) {
			return false;
		}

		$replace = array(
			'{:db_prefix}' => 'my_',
			'{:db_engine}' => in_array('innodb', $this->db_engines) ? 'InnoDB' : 'MyISAM',
			'{:db_charset}' => $this->db_version >= '4.1' ? 'DEFAULT CHARSET=utf8' : '',
			'{:website}' => $_SESSION['params']['virtual_path']
		);
		
		

		$config_file = '<?php'."\n";;
		$config_file .= '// ------------------------------------------------------'."\n";
		$config_file .= '// DO NOT ALTER THIS FILE UNLESS YOU HAVE A REASON TO'."\n";
		$config_file .= '// ------------------------------------------------------'."\n";
		$config_file .= '$patch = \'' . $_SESSION['params']['virtual_path'] . '\';'."\n";
		$config_file .= '$config[\'db.host\'] = \'' . addslashes($_SESSION['params']['db_hostname']) . '\';'."\n";
		$config_file .= '$config[\'db.username\'] = \'' . addslashes($_SESSION['params']['db_username']) . '\';'."\n";
		$config_file .= '$config[\'db.password\'] = \'' . addslashes($_SESSION['params']['db_password']) . '\';'."\n";
		$config_file .= '$config[\'db.name\'] = \'' . addslashes($_SESSION['params']['db_name']) . '\';'."\n";
		$config_file .= 'mysql_connect($config[\'db.host\'],$config[\'db.username\'],$config[\'db.password\'])or die(\'There was an error connecting to the database, Please verify login informaiton.\');'."\n";
		$config_file .= 'mysql_select_db($config[\'db.name\'])or die(\'There was an error selecting the database.\');'."\n";
		$config_file .= '?>';

		file_put_contents(rtrim($_SESSION['params']['system_path'], '/').'/system/config.php', $config_file);
		$this->db_import_file(BASE_PATH.'sql/step2.sql');
		$this->db_import_file(BASE_PATH.'sql/step3.sql');
		$this->db_import_file(BASE_PATH.'sql/step4.sql');
		if ( $this->db_import_file(BASE_PATH.'sql/database.sql') ) {
			return true;
			$this->db_close();
		}else{
			return false;
			$this->db_close();
		}
	}

	function setup_admin($params = array())
	{
		$dbconf = array(
			'db_host' => $_SESSION['params']['db_hostname'],
			'db_user' => $_SESSION['params']['db_username'],
			'db_pass' => $_SESSION['params']['db_password'],
			'db_name' => $_SESSION['params']['db_name'],
			'db_encoding' => 'utf8',
		);
		if ( !($db = $this->db_init($dbconf)) ) {
			return false;
		}
		$this->db_query("INSERT INTO `users` (`usrid`, `username`, `password`, `email`, `last_login`, `last_login_ip`, `role`, `license_expiration_date`, `status`) VALUES (1, '".$this->db_escape($_SESSION['params']['username'])."', '".md5($this->db_escape($_SESSION['params']['user_password']))."', '".$this->db_escape($_SESSION['params']['user_email'])."', '2014-03-16', '127.0.0.1', 5, '2014-03-23', 1)");
		$this->db_close();
		return true;
	}
}
