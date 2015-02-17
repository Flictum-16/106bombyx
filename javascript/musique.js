var nbmusic, day, x, y, z, midi, midi_title;

nbmusic = 2; // mettez ici le nombre de musiques de votre liste de lecture
day = new Date();
z = day.getTime();
y = (z - (parseInt(z/1000,10) * 1000))/10;
x = parseInt(y/100*nbmusic,10) + 1; // ici on tire une musique au sort

// insérez en dessous chacune des musiques avec leur titre :
if (x == (1))
{
	midi="./musique/DJ_Sona.mp3";
	midi_title="Concussive - DJ Sona !";
}

if (x == (2))
{
	midi="./musique/Winter_Snowdown.mp3";
	midi_title="Snowdown Music";
}

document.write('<embed type="audio/x-mpeg3" src= ' + midi + ' autostart="true" loop="true" ')
document.write('volume="100" align="center" width="70" height="25">')
document.write('<p style="text-align:center;">Titre :  ' + midi_title + ' </p> ')
