<?php include("assets/php/topp.php"); ?>

<ul id="turer">
<?php

// Skjuler . og ..
if($_SERVER['QUERY_STRING']=="hidden")
{$hide="";
 $ahref="./";
 $atext="Hide";}
else
{$hide=".";
 $ahref="./?hidden";
 $atext="Show";}

 // Åpner katalog
 $myDirectory=opendir("gpx");

// Henter innhold i katalog
while($entryName=readdir($myDirectory)) {
   $dirArray[]=$entryName;
}

// Lukker katalog
closedir($myDirectory);

// Teller oppføringer i et array
$indexCount=count($dirArray);

// Sorterer i omvendt kronologisk rekkefølge, bruk sort for kronologisk
rsort($dirArray);

// Loops array etter filer
for($index=0; $index < $indexCount; $index++) {

// Skal skjulte filer vises, basert på spørring over?
    if(substr("$dirArray[$index]", 0, 1)!=$hide) {

// Henter filnavn
	$name=$dirArray[$index];
	$namehref=$dirArray[$index];

// Spytter ut
 echo("<li><a href='tur.php?gpx=$namehref'>$name</a></li>\n");
   }
}

?>
</ul>

<?php include("assets/php/bunn.php"); ?>