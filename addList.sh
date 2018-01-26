#!/bin/bash

echo X > /var/run/omxctl
cd /home/pi/Music

find . -name "*mp3" | while read file; do
	i=$((i+1))
	mv "$file" musik$i.mp3
	echo a /home/pi/Music/musik$i.mp3 > /var/run/omxctl
done
