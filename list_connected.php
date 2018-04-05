<html>
<head>
   <title>Number of connected clients</title>
</head>
<body>

<?php

$count = shell_exec('./count_connected.sh');

echo "Connected clients: ".$count
?>
</body>
</html>
