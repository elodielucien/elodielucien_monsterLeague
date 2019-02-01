

<!DOCTYPE html>
<html lang="fr">
<head>
       <title>Formulaires</title>
       <meta charset="UTF-8">

</head>

 <body>
    <form method="post" action="functions.php"> <!-- Les données du formulaire seront envoyées au fichier functions.php -->
 
        <p>
          Please enter the characteristics of the new monster.
        </p>
        Name : <bf/>
        <input type="text" name="Name" /> <br/>
        Strength :
        <input type="text" name="Strength"  />  <br/>
        Life :
        <input type="text" name="Life"  />  <br/>
        Type :
        <select name="Type" >
             <option value="water">Water</option>
             <option value="air">Air</option>
             <option value="earth">Earth</option>
             <option value="fire">Fire</option>
        </select>
        <br/>
        
        <input type="submit" value="Valider" />

    </form>

 </body>

</html>