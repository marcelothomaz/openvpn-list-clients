#!/bin/bash
CONNECTED=$(echo -e "status\r\n" | nc -U /var/etc/openvpn/server2.sock | sed -ne '/CLIENT LIST/,/ROUTING TABLE/p' | wc -l)

echo $(expr $CONNECTED - 4)
