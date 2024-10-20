#!/bin/sh
MainMenu()
{
	while [ "$CHOICE" != "START" ]
	do
		clear
	echo "================================================================="
	echo "| Oracle All Inclusive Tool |"
	echo "| Main Menu - Select Desired Operation(s):|"
	echo "================================================================="
		echo "  1) Drop Tables"
		echo "  2) Create Tables"
		echo "  3) Populate Tables"
		echo "  4) Query Tables"
		echo " "
		echo "  X) Force/Stop/Kill Oracle DB"
		echo " "
		echo "  E) End/Exit"
		echo "Choose: "

		read CHOICE
		if [ "$CHOICE" = "0" ]
		then
			echo "Nothing Here"
			read X
		elif [ "$CHOICE" = "1" ]
		then
			bash drop_tables.sh
			read X	
		elif [ "$CHOICE" = "2" ]
		then
			bash create_tables.sh
			read X	
		elif [ "$CHOICE" = "3" ]
		then
			bash populate_tables.sh
			Pause
			read X
		elif [ "$CHOICE" = "4" ]
		then
			bash queries.sh
			read X
		elif [ "$CHOICE" = "E" ]
		then
			clear
			exit 0
		fi
	done
}
# Main Program
ProgramStart()
{
	while true 
	do
		MainMenu
	done
}
ProgramStart
