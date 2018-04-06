<html>
<head>
   <title>Number of connected clients</title>
</head>
<body>

<?php

$fp = fsockopen("127.0.0.1", "7505", $errno, $errstr, 30);
if (!$fp) {
	echo "$errstr ($errno)<br />\n";
} else {
	fwrite($fp,"status\n");

	while (true) {
		$out = fgets($fp);
		if (preg_match('/ROUTING TABLE/',$out)) {
			break;
		}
		$count++;
	}
	fclose($fp);
}

$count -= 4;

echo "Connected users: $count";

?>
</body>
</html>
