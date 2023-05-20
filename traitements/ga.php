<?php 



if(jours.lenght != "" && semaines.lenght == '' && mois.lenght == '' 
&& trimestres.lenght == '' && annees.lenght == '' && id_user.lenght != ''  )
{
    window.location.href='./traitements/g6.php?jours='+jours+'&id_user='+id_user;
}


else if(jours.lenght == '' && semaines.lenght != '' && mois.lenght == '' 
&& trimestres.lenght == '' && annees.lenght == '' && id_user.lenght != '')
{   
    window.location.href='./traitements/g6.php?semaines='+semaines+'&id_user='+id_user;
}

else if(jours.lenght == '' && semaines.lenght == '' && mois.lenght != '' 
&& trimestres.lenght == '' && annees.lenght == '' && id_user.lenght != '')
{   
    window.location.href='./traitements/g6.php?mois='+mois+'&id_user='+id_user;
}

else if(jours.lenght == '' && semaines.lenght == '' && mois.lenght == '' 
&& trimestres.lenght != '' && annees.lenght == '' && id_user.lenght != '')
{   
    window.location.href='./traitements/g6.php?trimestres='+trimestres+'&id_user='+id_user;

}

else if(jours.lenght == '' && semaines.lenght == '' && mois.lenght == '' 
&& trimestres.lenght == '' && annees.lenght != '' && id_user.lenght != '')
{   
    window.location.href='./traitements/g6.php?annees='+annees+'&id_user='+id_user;
}




else if(jours.lenght != "" && semaines.lenght != '' && mois.lenght == '' 
&& trimestres.lenght == '' && annees.lenght == '' && id_user.lenght != '')
{
    window.location.href='./traitements/g8.php?jours='+jours+'&semaines='+semaines+'&id_user='+id_user;
}

else if(jours.lenght != "" && semaines.lenght == '' && mois.lenght != '' 
&& trimestres.lenght == '' && annees.lenght == '' && id_user.lenght != '')
{
    window.location.href='./traitements/g6.php?jours='+jours+'&mois='+mois+'&id_user='+id_user;
}

else if(jours.lenght != "" && semaines.lenght == '' && mois.lenght == '' 
&& trimestres.lenght == '' && annees.lenght != '' && id_user.lenght != '')
{
   window.location.href='./traitements/g6.php?jours='+jours+'&annees='+annees+'&id_user='+id_user;
}

else if(jours.lenght != "" && semaines.lenght == '' && mois.lenght == '' 
&& trimestres.lenght != '' && annees.lenght == '' && id_user.lenght != '')
{
    window.location.href='./traitements/g6.php?jours='+jours+'&trimestres='+trimestres+'&id_user='+id_user;
}


else if(jours.lenght != "" && semaines.lenght != '' && mois.lenght != '' 
&& trimestres.lenght == '' && annees.lenght == '' && id_user.lenght != '')
{
    window.location.href='./traitements/g6.php?jours='+jours+'&semaines='+semaines+'&mois='+mois+'&id_user='+id_user;
}

else if(jours.lenght != "" && semaines.lenght != '' && mois.lenght == '' 
&& trimestres.lenght != '' && annees.lenght == '' && id_user.lenght != '')
{
    window.location.href='./traitements/g6.php?jours='+jours+'&semaines='+semaines+'&trimestres='+trimestres+'&id_user='+id_user;
}

else if(jours.lenght != "" && semaines.lenght != '' && mois.lenght == '' 
&& trimestres.lenght == '' && annees.lenght != '' && id_user.lenght != '')
{
    window.location.href='./traitements/g6.php?jours='+jours+'&semaines='+semaines+'&annees='+annees+'&id_user='+id_user;
}

else if(jours.lenght != "" && semaines.lenght == '' && mois.lenght != '' 
&& trimestres.lenght == '' && annees.lenght != '' && id_user.lenght != '')
{
    window.location.href='./traitements/g6.php?jours='+jours+'&mois='+mois+'&annees='+annees+'&id_user='+id_user;
}

else if(jours.lenght != "" && semaines.lenght == '' && mois.lenght != '' 
&& trimestres.lenght != '' && annees.lenght == '' && id_user.lenght != '')
{
    window.location.href='./traitements/g6.php?jours='+jours+'&mois='+mois+'&trimestres='+trimestres+'&id_user='+id_user;
}

else if(jours.lenght != "" && semaines.lenght == '' && mois.lenght == '' 
&& trimestres.lenght != '' && annees.lenght != '' && id_user.lenght != '')
{
    window.location.href='./traitements/g6.php?jours='+jours+'&trimestres='+trimestres+'&annees='+annees+'&id_user='+id_user;
}

else if(jours.lenght != "" && semaines.lenght != '' && mois.lenght != '' 
&& trimestres.lenght != '' && annees.lenght == '' && id_user.lenght != '')
{
    window.location.href='./traitements/g6.php?jours='+jours+'&semaines='+semaines+'&mois='+mois+'&trimestres='+trimestres+'&id_user='+id_user;
}

else if(jours.lenght != "" && semaines.lenght == '' && mois.lenght != '' 
&& trimestres.lenght != '' && annees.lenght != '' && id_user.lenght != '')
{
    window.location.href='./traitements/g6.php?jours='+jours+'&mois='+mois+'&trimestres='+trimestres+'&annees='+annees+'&id_user='+id_user;
}

else if(jours.lenght != "" && semaines.lenght != '' && mois.lenght != '' 
&& trimestres.lenght != '' && annees.lenght != '' && id_user.lenght != '')
{
    window.location.href='./traitements/g6.php?jours='+jours+'&semaines='+semaines+'&mois='+mois+'&trimestres='+trimestres+'&annees='+annees+'&id_user='+id_user;
}

else if(semaines.lenght != '' && mois.lenght != '' && jours.lenght == '' 
&& trimestres.lenght == '' && annees.lenght == '' && id_user.lenght != '')
{
    window.location.href='./traitements/g6.php?semaines='+semaines+'&mois='+mois+'&id_user='+id_user;
}

else if(jours.lenght == '' && semaines.lenght != '' && mois.lenght == '' 
&& trimestres.lenght != '' && annees.lenght == '' && id_user.lenght != '')
{
    window.location.href='./traitements/g6.php?semaines='+semaines+'&trimestres='+trimestres+'&id_user='+id_user;
}

else if(jours.lenght == '' && semaines.lenght != '' && mois.lenght == '' 
&& trimestres.lenght == '' && annees.lenght != '' && id_user.lenght != '')
{
    window.location.href='./traitements/g6.php?semaines='+semaines+'&annees='+annees+'&id_user='+id_user;
}

else if(jours.lenght == '' && semaines.lenght != '' && mois.lenght != '' 
&& trimestres.lenght != '' && annees.lenght == '' && id_user.lenght != '')
{
    window.location.href='./traitements/g6.php?semaines='+semaines+'&mois='+mois+'&trimestres='+trimestres+'&id_user='+id_user;
}


else if(jours.lenght == '' && semaines.lenght != '' && mois.lenght != '' 
&& trimestres.lenght == '' && annees.lenght != '' && id_user.lenght != '')
{
    window.location.href='./traitements/g6.php?semaines='+semaines+'&mois='+mois+'&annees='+annees+'&id_user='+id_user;
    
}


else if(jours.lenght == '' && semaines.lenght != '' && mois.lenght == '' 
&& trimestres.lenght != '' && annees.lenght != '' && id_user.lenght != '')
{
    window.location.href='./traitements/g6.php?semaines='+semaines+'&trimestres='+trimestres+'&annees='+annees+'&id_user='+id_user;
}

else if(jours.lenght == '' && semaines.lenght != '' && mois.lenght != '' 
&& trimestres.lenght != '' && annees.lenght != '' && id_user.lenght != '')
{
   window.location.href='./traitements/g6.php?semaines='+semaines+'&mois='+mois+'&trimestres='+trimestres+'&annees='+annees+'&id_user='+id_user;

}

else if(jours.lenght == '' && semaines.lenght == '' && mois.lenght != '' 
&& trimestres.lenght != '' && annees.lenght == '' && id_user.lenght != '')
{
   window.location.href='./traitements/g6.php?mois='+mois+'&trimestres='+trimestres+'&id_user='+id_user;
}


else if(jours.lenght == '' && semaines.lenght == '' && mois.lenght != '' 
&& trimestres.lenght == '' && annees.lenght != '' && id_user.lenght != '')
{
   window.location.href='./traitements/g6.php?mois='+mois+'&annees='+annees+'&id_user='+id_user;
}

else if(jours.lenght == '' && semaines.lenght == '' && mois.lenght != '' 
&& trimestres.lenght != '' && annees.lenght != '' && id_user.lenght != '')
{
   window.location.href='./traitements/g6.php?mois='+mois+'&trimestres='+trimestres+'&annees='+annees+'&id_user='+id_user;
}

else if(jours.lenght == '' && semaines.lenght == '' && mois.lenght == '' 
&& trimestres.lenght != '' && annees.lenght != '' && id_user.lenght != '')
{
    window.location.href='./traitements/g6.php?trimestres='+trimestres+'&annees='+annees+'&id_user='+id_user;
}


?>

