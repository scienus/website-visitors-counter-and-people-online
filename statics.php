<?php   
require_once('inc/config.php'); 
/* statics script - Techsdl Inc */ 
class statics { 
	var $maxtime = 600;
	var $count = 0;
	var $error; 
	var $gtable; 
    var $mtable;  

 function statics() {    
	$this->timestamp = time(); 
	$this->gtable = 'statics';
	$this->mtable = 'members';  
	$this->unique = $this->whois(); 
	$this->addUser();
	$this->deleteUser();
	$this->Guest(); 
    $this->Members();
	}

 function initdb($val1,$val2) { 
        $this->gtable = $val1; 
        $this->mtable = $val2; 
          } 

 function getError() { 
    if(empty($this->error)) { return ''; } 
	else { return $this->error(); } 
	}
	
 function Handler($error) {  
     $this->errors = $error; 
	 }
 
 function connection() { 
      $conn =  mysql_connect('localhost','root','') or die ("My-SQL connection error!"); 
	  mysql_select_db('techsdl_statics',$conn);
         }  

 function whois() { 
		if (getenv('HTTP_CLIENT_IP')) {
			$browserip = getenv('HTTP_CLIENT_IP');
		}
		elseif (getenv('HTTP_X_FORWARDED_FOR')) {
			$browserip = getenv('HTTP_X_FORWARDED_FOR');
		}
		elseif (getenv('HTTP_X_FORWARDED')) {
			$browserip = getenv('HTTP_X_FORWARDED');
		}
		elseif (getenv('HTTP_FORWARDED_FOR')) {
			$browserip = getenv('HTTP_FORWARDED_FOR');
		}
		elseif (getenv('HTTP_FORWARDED')) {
			$browserip = getenv('HTTP_FORWARDED');
		}
		else {
			$browserip = $_SERVER['REMOTE_ADDR'];
		}
		return $browserip;
	}
	
 function addUser() { 
		$insert = mysql_query ("INSERT INTO $this->gtable (browserip,timestamp) VALUES ('$this->unique','$this->timestamp')");
		if (!$insert) { $this->Handler("statics new insertion erors");	}
	}
	
 function deleteUser() {
		$delete = mysql_query ("DELETE FROM $this->gtable WHERE timestamp < ($this->timestamp - $this->maxtime)");
		if (!$delete) {  $this->Handler("Unable to delete visitors"); }
	}
	
 function Guest() {
	if (count($this->error) == 0) {
	$count = @mysql_num_rows ( mysql_query("SELECT DISTINCT browserip FROM $this->gtable"));
	return $count;
		}
	}
       
 function Members() { 
        if (count($this->error) == 0) { 
        $count = @mysql_num_rows ( mysql_query("SELECT DISTINCT * FROM $this->mtable")); 
        return $count;
                  } 
        }

 }
?>
