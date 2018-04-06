<html>
<head>
   <title>Number of connected clients</title>
</head>
<body>

<?php

$socket_file = "unix:/var/etc/openvpn/server2.sock";

$sock = stream_socket_client($socket_file,$errno,$errstr)

if (!$sock) {
	trigger_error("Error opening socket: ".$errstr)
	return NULL
}

while (TRUE) {
	$res = fgets($sock)
	if (preg_match('/^ROUTING TABLE/',$res)) {
		break;
	} else {
		$count += 1
	}
}

$count -= 4

echo "Connected clients: ".$count
?>
</body>
</html>
