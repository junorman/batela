<?php 



if(jours.lenght != "" && semaines.lenght == '' && mois.lenght == '' 
&& trimestres.lenght == '' && annees.lenght == '' )
{
    window.location.href='./traitements/g6.php?jours='+jours;
}


else if(jours.lenght == '' && semaines.lenght != '' && mois.lenght == '' 
&& trimestres.lenght == '' && annees.lenght == '' )
{   
    window.location.href='./traitements/g6.php?semaines='+semaines;
}

else if(jours.lenght == '' && semaines.lenght == '' && mois.lenght != '' 
&& trimestres.lenght == '' && annees.lenght == '' )
{   
    window.location.href='./traitements/g6.php?mois='+mois;
}

else if(jours.lenght == '' && semaines.lenght == '' && mois.lenght == '' 
&& trimestres.lenght != '' && annees.lenght == '' )
{   
    window.location.href='./traitements/g6.php?trimestres='+trimestres;

}

else if(jours.lenght == '' && semaines.lenght == '' && mois.lenght == '' 
&& trimestres.lenght == '' && annees.lenght != '' )
{   
    window.location.href='./traitements/g6.php?annees='+annees;
}




else if(jours.lenght != "" && semaines.lenght != '' && mois.lenght == '' 
&& trimestres.lenght == '' && annees.lenght == '' )
{
    window.location.href='./traitements/g8.php?jours='+jours+'&semaines='+semaines;
}

else if(jours.lenght != "" && semaines.lenght == '' && mois.lenght != '' 
&& trimestres.lenght == '' && annees.lenght == '' )
{
    window.location.href='./traitements/g6.php?jours='+jours+'&mois='+mois;
}

else if(jours.lenght != "" && semaines.lenght == '' && mois.lenght == '' 
&& trimestres.lenght == '' && annees.lenght != '' )
{
   window.location.href='./traitements/g6.php?jours='+jours+'&annees='+annees;
}

else if(jours.lenght != "" && semaines.lenght == '' && mois.lenght == '' 
&& trimestres.lenght != '' && annees.lenght == '' )
{
    window.location.href='./traitements/g6.php?jours='+jours+'&trimestres='+trimestres;
}


else if(jours.lenght != "" && semaines.lenght != '' && mois.lenght != '' 
&& trimestres.lenght == '' && annees.lenght == '' )
{
    window.location.href='./traitements/g6.php?jours='+jours+'&semaines='+semaines+'&mois='+mois;
}

else if(jours.lenght != "" && semaines.lenght != '' && mois.lenght == '' 
&& trimestres.lenght != '' && annees.lenght == '' )
{
    window.location.href='./traitements/g6.php?jours='+jours+'&semaines='+semaines+'&trimestres='+trimestres;
}

else if(jours.lenght != "" && semaines.lenght != '' && mois.lenght == '' 
&& trimestres.lenght == '' && annees.lenght != '' )
{
    window.location.href='./traitements/g6.php?jours='+jours+'&semaines='+semaines+'&annees='+annees;
}

else if(jours.lenght != "" && semaines.lenght == '' && mois.lenght != '' 
&& trimestres.lenght == '' && annees.lenght != '' )
{
    window.location.href='./traitements/g6.php?jours='+jours+'&mois='+mois+'&annees='+annees;
}

else if(jours.lenght != "" && semaines.lenght == '' && mois.lenght != '' 
&& trimestres.lenght != '' && annees.lenght == '' )
{
    window.location.href='./traitements/g6.php?jours='+jours+'&mois='+mois+'&trimestres='+trimestres;
}

else if(jours.lenght != "" && semaines.lenght == '' && mois.lenght == '' 
&& trimestres.lenght != '' && annees.lenght != '' )
{
    window.location.href='./traitements/g6.php?jours='+jours+'&trimestres='+trimestres+'&annees='+annees;
}

else if(jours.lenght != "" && semaines.lenght != '' && mois.lenght != '' 
&& trimestres.lenght != '' && annees.lenght == '' )
{
    window.location.href='./traitements/g6.php?jours='+jours+'&semaines='+semaines+'&mois='+mois+'&trimestres='+trimestres;
}

else if(jours.lenght != "" && semaines.lenght == '' && mois.lenght != '' 
&& trimestres.lenght != '' && annees.lenght != '' )
{
    window.location.href='./traitements/g6.php?jours='+jours+'&mois='+mois+'&trimestres='+trimestres+'&annees='+annees;
}

else if(jours.lenght != "" && semaines.lenght != '' && mois.lenght != '' 
&& trimestres.lenght != '' && annees.lenght != '' )
{
    window.location.href='./traitements/g6.php?jours='+jours+'&semaines='+semaines+'&mois='+mois+'&trimestres='+trimestres+'&annees='+annees;
}

else if(semaines.lenght != '' && mois.lenght != '' && jours.lenght == '' 
&& trimestres.lenght == '' && annees.lenght == '' )
{
    window.location.href='./traitements/g6.php?semaines='+semaines+'&mois='+mois;
}

else if(jours.lenght == '' && semaines.lenght != '' && mois.lenght == '' 
&& trimestres.lenght != '' && annees.lenght == '' )
{
    window.location.href='./traitements/g6.php?semaines='+semaines+'&trimestres='+trimestres;
}

else if(jours.lenght == '' && semaines.lenght != '' && mois.lenght == '' 
&& trimestres.lenght == '' && annees.lenght != '' )
{
    window.location.href='./traitements/g6.php?semaines='+semaines+'&annees='+annees;
}

else if(jours.lenght == '' && semaines.lenght != '' && mois.lenght != '' 
&& trimestres.lenght != '' && annees.lenght == '' )
{
    window.location.href='./traitements/g6.php?semaines='+semaines+'&mois='+mois+'&trimestres='+trimestres;
}


else if(jours.lenght == '' && semaines.lenght != '' && mois.lenght != '' 
&& trimestres.lenght == '' && annees.lenght != '' )
{
    window.location.href='./traitements/g6.php?semaines='+semaines+'&mois='+mois+'&annees='+annees;
    
}


else if(jours.lenght == '' && semaines.lenght != '' && mois.lenght == '' 
&& trimestres.lenght != '' && annees.lenght != '' )
{
    window.location.href='./traitements/g6.php?semaines='+semaines+'&trimestres='+trimestres+'&annees='+annees;
}

else if(jours.lenght == '' && semaines.lenght != '' && mois.lenght != '' 
&& trimestres.lenght != '' && annees.lenght != '' )
{
   window.location.href='./traitements/g6.php?semaines='+semaines+'&mois='+mois+'&trimestres='+trimestres+'&annees='+annees;

}

else if(jours.lenght == '' && semaines.lenght == '' && mois.lenght != '' 
&& trimestres.lenght != '' && annees.lenght == '' )
{
   window.location.href='./traitements/g6.php?mois='+mois+'&trimestres='+trimestres;
}


else if(jours.lenght == '' && semaines.lenght == '' && mois.lenght != '' 
&& trimestres.lenght == '' && annees.lenght != '' )
{
   window.location.href='./traitements/g6.php?mois='+mois+'&annees='+annees;
}

else if(jours.lenght == '' && semaines.lenght == '' && mois.lenght != '' 
&& trimestres.lenght != '' && annees.lenght != '' )
{
   window.location.href='./traitements/g6.php?mois='+mois+'&trimestres='+trimestres+'&annees='+annees;
}

else if(jours.lenght == '' && semaines.lenght == '' && mois.lenght == '' 
&& trimestres.lenght != '' && annees.lenght != '' )
{
    window.location.href='./traitements/g6.php?trimestres='+trimestres+'&annees='+annees;
}


?>

