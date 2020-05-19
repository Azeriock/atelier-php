<?php include("inc/header.php"); ?>     
    </div>
    </nav>
    <h2>Ajouter une experience</h2>
    <form method="POST" action="">
        <input type="text" name="titre" placeholder="titre" /><br />
        <input type="text" name="sous_titre" placeholder="sous_titre" /><br />
        <input type="date" name="date" placeholder="date" /><br />
        <input type="text" name="description" placeholder="description" /><br />
        <button type="submit" name="submit" value="premier">ok</button>
    </form>
    <br>
<?php
if(isset($_POST['titre']) AND 
isset($_POST['sous_titre']) AND
isset($_POST['date']) AND
isset($_POST['description']))
{
    if(!empty($_POST['titre']) AND
    !empty($_POST['sous_titre']) AND
    !empty($_POST['date']) AND
    !empty($_POST['description']) AND 
    $_POST['submit'] == 'premier')
    {
        $requete = $bdd->prepare("INSERT INTO experience(titre, sous_titre, date, description) VALUES(?, ?, ?, ?)");
        $requete->execute(array($_POST['titre'], 
        $_POST['sous_titre'], 
        $_POST['date'], 
        $_POST['description']));
    }
    $_POST = array();
}
?>
<h2>Modifier une experience</h2>
<form method="POST" action="">
    <input type="text" name="new_id_experience" placeholder="ID a modifier" /><br />
    <input type="text" name="new_titre" placeholder="titre" /><br />
    <input type="text" name="new_sous_titre" placeholder="sous_titre" /><br />
    <input type="date" name="new_date" placeholder="date" /><br />
    <input type="text" name="new_description" placeholder="description" /><br />
    <button type="submit" name="submit" value="deuxieme">ok</button>
</form>
<?php
    if(isset($_POST['new_titre']) AND 
    isset($_POST['new_sous_titre']) AND
    isset($_POST['new_date']) AND
    isset($_POST['new_description']) AND
    isset($_POST['new_id_experience']))
    {
        if(!empty($_POST['new_id_experience']) AND 
        !empty($_POST['new_sous_titre']) AND
        !empty($_POST['new_date']) AND
        !empty($_POST['new_description']) AND
        $_POST['submit'] == 'deuxieme')
        {
            $requete2 = $bdd->prepare("UPDATE experience SET titre = ?, sous_titre = ?, date = ?, description = ? WHERE id_experience = ?");
            $requete2->execute(array($_POST['new_titre'], 
            $_POST['new_sous_titre'], 
            $_POST['new_date'], 
            $_POST['new_description'],
            $_POST['new_id_experience']));
        }
        $_POST = array();
    }
?>
<h2>Supprimer une experience</h2>
<form method="POST" action="">
    <input type="text" name="id_experience" placeholder="ID a supprimer" /><br />
    <button type="submit" name="submit" value="troisieme">ok</button>
</form>
<?php
    if(isset($_POST['id_experience']))
    {
        if($_POST['submit'] == 'troisieme')
        {
            $requete3 = $bdd->prepare("DELETE FROM experience WHERE id_experience = ?");
            $requete3->execute(array($_POST['id_experience']));
        }
        $_POST = array();
    }
?>
<h2>Modifier l'utilisateur</h2>
<form method="POST" action="">
    <input type="text" name="nom" placeholder="nom" /><br />
    <input type="text" name="prenom" placeholder="prenom" /><br />
    <input type="text" name="adresse" placeholder="adresse" /><br />
    <input type="text" name="ville" placeholder="ville" /><br />
    <input type="tel" name="numero" placeholder="numero" /><br />
    <input type="mail" name="adresse_mail" placeholder="email" /><br />
    <input type="text" name="desc" placeholder="description" /><br />
    <button type="submit" name="submit" value="last">ok</button>
</form>
<?php
    if(isset($_POST['nom']) AND 
    isset($_POST['prenom']) AND 
    isset($_POST['adresse']) AND 
    isset($_POST['ville']) AND
    isset($_POST['numero']) AND
    isset($_POST['adresse_mail']) AND
    isset($_POST['desc']))
    {
        if($_POST['submit'] == 'last' AND
        !empty($_POST['nom']) AND
        !empty($_POST['prenom']) AND
        !empty($_POST['adresse']) AND
        !empty($_POST['ville']) AND
        !empty($_POST['numero']) AND
        !empty($_POST['adresse_mail']) AND
        !empty($_POST['desc']))
        {
            $requete4 = $bdd->prepare("UPDATE utilisateur SET nom = ?, prenom = ?, adresse = ?, ville = ?, numero = ?, adresse_mail = ?, description = ? WHERE id_nom = 1");
            $requete4->execute(array($_POST['nom'],
            $_POST['prenom'],
            $_POST['adresse'],
            $_POST['ville'],
            $_POST['numero'],
            $_POST['adresse_mail'],
            $_POST['desc']));
        }
        $_POST = array();
    }
?>
</body>
</html>