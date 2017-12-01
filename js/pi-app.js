#!/usr/bin/env node

let fs = require('fs');                                         // Requirement for writing files
let db = require('../poll/movies.json');                        // Movie database

let keys = Object.keys(db);                                     // Init an array of all keys in db

let fullDate = new Date();                                      // Get current full date
let currentDate = fullDate.getDate();                           // Get current date of month
fullDate.setDate(currentDate + 7);                              // Set full date to 1 week later
let month = fullDate.getMonth();                                // Get month of new full date

function checkForPlayed() {                                     // Function that resets the "played" counter
    let playedCount = 0;                                        // if all movies are "played"

    for(i=0; i!=keys.length; i++) {
        if(db[keys[i]].played == true) {
            playedCount++;
        }
    }

    if(playedCount == keys.length) {
        for(i=0; i!=keys.length; i++) {
            db[keys[i]].played = false;
        }
    }
}

function getRandomKey() {                                       // Function for getting a random key for db
    checkForPlayed();
    let arrKey = Math.floor(Math.random() * keys.length);
    let dbKey  = keys[arrKey];

    if(month != 9 && month != 11) {
        while(db[dbKey].played == true) {
            arrKey = Math.floor(Math.random() * keys.length);
            dbKey  = keys[arrKey];
        }
    }

    return dbKey;
}

let keyX = getRandomKey();                                      // Get two random movies
db[keyX].played = true;

let keyY = getRandomKey();
db[keyY].played = true;

let keyZ = getRandomKey();
db[keyZ].played = true;

while(keyX == keyY) {                                           // Make sure they aren't the same movie
    keyY = getRandomKey();
}

db[keyY].played = true;

while(keyY == keyZ) {
    keyZ = getRandomKey();
}

db[keyZ].played = true;

if(month == 9) {                                                // Only get movies marked as "horror" for
    while(db[keyX].isHorror == false) {                         // October to celebrate Halloween
        keyX = getRandomKey();
    }

    while(db[keyY].isHorror == false || keyY == keyX) {
        keyY = getRandomKey();
    }

    while(db[keyZ].isHorror == false || keyZ == keyY) {
        keyZ = getRandomKey();
    }
}

if(month == 11) {                                               // Same as previous conditional, but gets
    while(db[keyX].isXmas == false) {                           // Christmas movies for December
        keyX = getRandomKey();
    }

    while(db[keyY].isXmas == false || keyY == keyX) {
        keyY = getRandomKey();
    }

    while(db[keyZ].isXmas == false || keyZ == keyY) {
        keyZ = getRandomKey();
    }
}

let output = db[keyX].tapeName + "|" + db[keyY].tapeName + "|" + db[keyZ].tapeName;       // Formatting the output string

fs.writeFile('../poll/selected.txt', output, function(err) {    // Writing output to the csv file
    if(err) { console.log(err); }
});

db[keyX].played = true;                                         // Setting the chosen movies' "played"
db[keyY].played = true;                                         // property to "true"

let jsonfile = JSON.stringify(db);                              // convert db into a string

fs.writeFile('../poll/movies.json', jsonfile, function(err) {   // save db string to json database
    if(err) { console.log(err); }
});