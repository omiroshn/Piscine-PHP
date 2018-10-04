#!/usr/bin/php
<?php
	if ($argc == 2) {
		date_default_timezone_set("Europe/Paris");

		$date = "([Ll]undi|[Mm]ardi|[Mm]ercredi|[Jj]eudi|[Vv]endredi|[Ss]amedi|[Dd]imanche)";
		$month = "([Jj]anvier|[Ff]\X[eé]vrier|[Mm]ars|[Aa]vril|[Mm]ai|[Jj]uin|[Jj]uillet|[Aa]o\X[uû]t|[Ss]eptembre|[Oo]ctobre|[Nn]ovembre|[Dd]\X[eé]cembre)";

		if (preg_match("/^".$date." ([0-9]{1,2}) ".$month." ([0-9]{4}) ([0-9]{2}):([0-9]{2}):([0-9]{2})$/", $argv[1])) {
			$str = $argv[1];
			$datesFR = array('/[Ll]undi/' => 'Monday', 
							'/[Mm]ardi/' => 'Tuesday',
							'/[Mm]ercredi/' => 'Wednesday',
							'/[Jj]eudi/' => 'Thursday',
							'/[Vv]endredi/' => 'Friday',
							'/[Ss]amedi/' => 'Saturday',
							'/[Dd]imanche/' => 'Sunday');

			$monthFR = array('/[Jj]anvier/' => 'January', 
							'/[Ff]\X[eé]vrier/' => 'February',
							'/[Mm]ars/' => 'March',
							'/[Aa]vril/' => 'April',
							'/[Mm]ai/' => 'May',
							'/[Jj]uin/' => 'June',
							'/[Jj]uillet/' => 'July',
							'/[Aa]o\X[uû]t/' => 'August',
							'/[Ss]eptembre/' => 'September',
							'/[Oo]ctobre/' => 'October',
							'/[Nn]ovembre/' => 'November',
							'/[Dd]\X[eé]cembre/' => 'Desember');

			foreach ($datesFR as $dayFR => $dayENG) {
				$str = preg_replace($dayFR, $dayENG, $str);
			}
			foreach ($monthFR as $mFR => $mENG) {
				$str = preg_replace($mFR, $mENG, $str);
			}
			
			$time = strtotime($str);
			echo $time."\n";
		} else {
			echo "Wrong Format\n";
		}
	}
?>