#!/bin/sh
# launcher.sh

sudo touch /srv/bx/usv.db3
sudo touch /srv/bx/ram/currentD.db3
sudo touch /srv/bx/ram/currentC.db3
sudo chmod 777 /srv/bx/usv.db3
sudo chmod 777 /srv/bx/usv.db3-journal
sudo chmod 777 /srv/bx/ram/currentD.db3
sudo chmod 777 /srv/bx/ram/currentD.db3-journal
sudo chmod 777 /srv/bx/ram/currentC.db3
sudo chmod 777 /srv/bx/ram/currentC.db3-journal

if ! pgrep -x "BatterX" > /dev/null
then
	gpio -g mode 17 out
	gpio -g mode 27 out
	gpio -g write 17 0
	gpio -g write 27 0
	cd /
	cd home/pi
	sudo ./BatterX
	cd /
fi

if ! pgrep -x "CloudStream" > /dev/null
then
	gpio -g mode 24 out
	gpio -g write 24 0
	cd /
	cd home/pi
	sudo ./CloudStream
	cd /
fi
