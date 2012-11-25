<?php
/*
 * Call class.
 *
 * Nothing serious here. Class just lists calls from the db.
 *
 * @author Opeyemi Obembe (@kehers) / ray@digitalcraftstudios.com
 * @version 0.1
 */
 
// Db
require 'db.php';

class calls {

	protected $options;

	function __construct() {
	}
	
	function missed($options = null) {
		$this->options = array(
			// Stalker! (uncomment below)
			//'caller' => '+2348181019104',
			// Date range (uncomment next two lines)
			//'date_from' => '2012-11-20'
			//'date_to' => '2012-11-25'
			// Calls missed today only
			'today' => 'true'
		);
		
        if ($options)
            $this->options = array_replace_recursive($this->options, $options);
		
		$q = "select * from logs";
		if (count($this->options)) {
			if ($this->options['caller'])
				$where[] = "frm='{$this->options['caller']}'";
			if ($this->options['today'])
				$where[] = "left(date, 10)='".date('Y-m-d')."'";
			if ($this->options['date_from'] && $this->options['date_to'])
				$where[] = "date between {$this->options['date_from']} and {$this->options['date_to']}";
				
			// print_r($where); #debug
			$q .= " where ".implode(" and ", $where);
			// echo $q; #debug
			$r = mysql_query($q);
			$calls = array();
			while(list(, $caller, $date) = mysql_fetch_array($r)) {
				$calls[] = array(
							'caller' => $caller,
							'date' => self::relativeTime($date)
						);
			}
			
			return $calls;
		}
	}
	
	function relativeTime($date) {
		$time = strtotime($date);
		$datestr = (time() - $time) / 3600;
		if ($datestr < 24) {
			if ($datestr < 1) {
				if ($datestr * 60 < 1)
					$time = 'now';
				else
					$time = floor($datestr * 60) . 'm ago';
			}
			else
				$time = floor($datestr) . 'h ago';
		}
		else
			return date('M d, Y G:ia', $time);

		return $time;
	}
}
?>