<?php 

	if (CRYPT_SHA512 == 1) {
		echo 'SHA-512 :      ' . crypt('azerty', '$6$rounds=1000$canjohnripdatpwd$') . "\n";
	}
?>