<?php
	function auth($login, $passwd) {
		if (!$login || !$passwd)
			return false;
		$account = unserialize(file_get_contents('../private/passwd'));
		if ($account) {
			foreach ($account as $acc => $value) {
				if ($value['login'] === $login && $value['passwd'] === hash('whirlpool', $passwd))
					return true;
			}
		}
		return false;
	}
?>