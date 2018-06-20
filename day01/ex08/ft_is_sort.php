<?php
	function ft_is_sort($tab) {
		$array = $tab;
		sort($array);
		if (!array_diff_assoc($array, $tab))
			return true;
		return false;
	}
?>
