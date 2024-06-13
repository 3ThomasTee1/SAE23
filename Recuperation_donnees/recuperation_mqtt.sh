#!/bin/bash


#Information needed to connect to the database
SOCKET="/opt/lampp/var/mysql/mysql.sock"
UTILISATEUR="b3t"
MDP="passb3t"
BASE="sae23"


#Function for inserting a measurement into the database
inserer_base(){
	local valeur_luminosite=$1
	local nom_capteur=$2

	local date_recup=$(date +"%Y-%m-%d")
	local horaire=$(date +"%H:%M:%S")
	
	echo "Insertion de la valeur $valeur_luminosite prise par le capteur $nom_capteur le $date_recup à $horaire"
	mysql --socket="$SOCKET" -u "$UTILISATEUR" --password="$MDP" -D "$BASE" -e "INSERT INTO Mesure (date, horaire, valeur, nom_capteur) VALUES ('$date_recup', '$horaire', '$valeur_luminosite', '$nom_capteur');"

	

}


#Function to find out whether the sensor is in the database
est_dans_base(){

	local nom_capteur=$1
	local capteur_base=$(mysql --socket="$SOCKET" -u "$UTILISATEUR" --password="$MDP" -D "$BASE" -e "SELECT COUNT(*) FROM sae23.Capteur WHERE nom_capteur = '$nom_capteur';" | tail -n 1) 
	
	if [ $capteur_base -eq 0 ]; 
	then
		return 1
	else 
		return 0
	fi
}


#Processing function for each message 
traitement_message(){
	
	local message=$1 
	local nom_capteur=$(echo "$message" | jq -r '.[1].deviceName')
	if est_dans_base $nom_capteur;
	then 
		local luminosite=$(echo "$message" | jq -r '.[0].illumination')
		inserer_base $luminosite $nom_capteur
	fi
}


mosquitto_sub -h mqtt.iut-blagnac.fr -t AM107/by-room/# | while read -r message; do

	traitement_message $message	

done



