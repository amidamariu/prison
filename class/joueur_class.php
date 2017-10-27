<?php

include_once "class/connexion_class.php";

class joueur
{
  private $_id;
  Private $_Pseudo;
  public function __construct($id) 
  {
 

  $bdd = Connexion::bdd();

	
  $sql = 'SELECT * FROM listejoueurs WHERE id='.$id.' ';
$rep = $bdd->query($sql);
$donnee = $rep->fetch();
  $this->_id = $id;
  $this->_Pseudo = $donnee["Pseudo"];

  if ($donnee == null)
  {
	  echo "erreur";
  }

  
  
  }
  
  public static function joueur_by_mail($email)
  {
$bdd = Connexion::bdd();
$req = $bdd->prepare('SELECT * FROM `listejoueurs` WHERE `Email` = ?');
$req->execute(array($email)) or die(print_r($req->errorInfo()));
$donnees= $req->fetch();

$req -> closeCursor();
//echo "<br>-mail--".$email."---<br>";
//echo "<br> -pass--".$donnees['Motdepasse']."--- <br>";
if(isset($donnees['Id']))
{
	return new joueur($donnees['Id']);
}
else
{
	return null;
}
	  
  }
  
  
  public static function connected()
  {
  	return isset($_SESSION['SessionID']);
  	
  }
  
  public static function disconnect()
  {
  	unset($_SESSION['SessionID']);
  	
  }
  
  
    public static function joueur_by_Pseudo($Pseudo)
  {
$bdd = Connexion::bdd();
$req = $bdd->prepare('SELECT * FROM `listejoueurs` WHERE `Pseudo` = ?');
$req->execute(array($Pseudo)) or die(print_r($req->errorInfo()));
$donnees= $req->fetch();

$req -> closeCursor();
if(isset($donnees['Id']))
{
	return new joueur($donnees['Id']);
}
else
{
	return null;
}
	  
  }
  
  
  
  public static function joueur_by_eprelID($eprelID)
  {
  	$bdd = Connexion::bdd();
  	$req = $bdd->prepare('SELECT * FROM `listejoueurs` WHERE `eprelid` = ?');
  	$req->execute(array($eprelID)) or die(print_r($req->errorInfo()));
  	$donnees= $req->fetch();
  	
  	$req -> closeCursor();
  	if(isset($donnees['Id']))
  	{
  		return new joueur($donnees['Id']);
  	}
  	else
  	{
  		return null;
  	}
  	
  }
  
  
  
  public static function joueur_by_code($code)
  {
  	$bdd = Connexion::bdd();
  	$req = $bdd->prepare('SELECT * FROM `listejoueurs` WHERE `Codeoublimdp` = ?');
  	$req->execute(array($code)) or die(print_r($req->errorInfo()));
  	$donnees= $req->fetch();
  	
  	$req -> closeCursor();
  	
  	if(isset($donnees['Id']))
  	{
  	return new joueur($donnees['Id']);
  	}
  	else
  	{
  		return null;
  	}
  }
  
  
  public static function session_for_eprel($login)
  {

  	$jou = joueur::joueur_by_eprelID($login);

  	if( $jou != null)
  	{
  		return $jou->Get_Sessionid();
  	}
  	else
  	{
  		joueur::ajouter(NULL,$login,"rezrezrze",$login);
  		$jou = joueur::joueur_by_Pseudo($login);
  		return $jou->Get_Sessionid();
  	}
  }
  
  
  
  public function ChangeMdp($mdpchange)
  {
  	
  	$bdd = Connexion::bdd();
  	
  	$mdpchange = password_hash($mdpchange,PASSWORD_BCRYPT,['cost' => 13]);
  	
  	$req = $bdd->prepare('UPDATE `listejoueurs` SET `Motdepasse` = :mdpchange WHERE `Id` = :id');
  	$req->execute(array('mdpchange' => $mdpchange, 'id' => $this->get_id())) or die(print_r($req->errorInfo()));
  	
  	$req -> closeCursor();
  	
  }
  
  
      public static function joueur_by_session()
  {
  
  		$bdd = Connexion::bdd();
  		$req = $bdd->prepare('SELECT * FROM `listejoueurs` WHERE `SessionID` = ?');
  		$req->execute(array($_SESSION['SessionID'])) or die(print_r($req->errorInfo()));
  		$donnees= $req->fetch();
  		
  		$req -> closeCursor();
  		
  		if(isset($donnees['Id']))
  		{
  			return new joueur($donnees['Id']);
  		}
  		else
  		{
  			return null;
  		}
  	

	  
  }
  
  
  public static function get_nb_attente()
  {
  	
  	$bdd = Connexion::bdd();
  	$req = $bdd->query('SELECT COUNT(*) AS Nb FROM attente WHERE 1');
  	$reponse = $req->fetch();
  	return  $reponse["Nb"];
  	
  }
  
  
  
  
  
  
  
  
  
  public static function ajouter($Email, $Pseudo, $Motdepasse, $eprel = NULL)
  {
  	$bdd = Connexion::bdd();
  	
  	$MDPHache = password_hash($Motdepasse,PASSWORD_BCRYPT,['cost' => 13]);
  	$Datedujour = date("Y-m-d H:i:s");
  	
  	$req = $bdd->prepare('INSERT INTO `listejoueurs` (`Email`, `Pseudo`, `Motdepasse`, `Dateinscription`,`eprelid`)
VALUES(:Email, :Pseudo, :Motdepasse, :Dateinscription,:eprelid)');
  	$req->execute(array(
  			'Email' => $Email,
  			'Pseudo' => $Pseudo,
  			'Motdepasse' => $MDPHache,
  			'Dateinscription' => $Datedujour,
  			'eprelid' => $eprel
  	)) or die(print_r($req->errorInfo()));
  	
  	$req -> closeCursor();
  	
  }
  
  
  
    
  public function get_position()
  {
  	
  	$cat = $this->get_categorie();
	
	if($cat == NULL)
	{
		return NULL;
	}
  	if($cat == 1)
  	{
  		$borneinf = 0;
  		$bornesup = 10;
  	}
  	if($cat == 2)
  	{
  		$borneinf = 10;
  		$bornesup = 100;
  	}
  	if($cat == 3)
  	{
  		$borneinf = 100;
  		$bornesup = 1000;
  	}
  	if($cat == 4)
  	{
  		$borneinf = 1000;
  		$bornesup = 1000000000;
  	}
  	
  	$bdd = Connexion::bdd();
  	$sql = 'SET @rank=0';
  	$rep = $bdd->query($sql);
  	$sql='SELECT * FROM (SELECT @rank:=@rank+1 AS rank, Id, Nbpartiesjouees, score_moyen FROM `listejoueurs` WHERE (Nbpartiesjouees >'.$borneinf.' AND Nbpartiesjouees <= '.$bornesup.') ORDER BY score_moyen DESC) AS test WHERE Id='.$this->_id.' ';
	$rep = $bdd->query($sql);
  	$donnee = $rep->fetch();
  	
  	return $donnee["rank"];
  }
  
  
  public function get_categorie()
  {
  	$nb = $this->get_total();
  	if($nb > 0 && $nb <= 10)
  	{
  		return 1;
  	}
  	if($nb > 10 && $nb <= 100)
  	{
  		return 2;
  	}
  	if($nb > 100 && $nb <= 1000)
  	{
  		return 3;
  	}
  	if($nb > 1000)
  	{
  		return 4;
  	}
  	
  }
  
  
  
  
  
  public function verif_mdp($motdepasse)
  {
  	
  	$bdd = Connexion::bdd();
  	
  	$req = $bdd->prepare('SELECT * FROM `listejoueurs` WHERE `Id` = ?');
  	$req->execute(array($this->get_id())) or die(print_r($req->errorInfo()));
  	$donnees= $req->fetch();
  	
  	if ($donnees)
  	{
  		$mdpbase=$donnees['Motdepasse'];
  	}
  	
  	$req -> closeCursor();
  	
  	$correct = password_verify($motdepasse,$mdpbase);
  	
  	return $correct;
  	
  }
  

  
    public function get_id() 
  {
	 
	return $this->_id;
  }
  
      public function get_Pseudo() 
  {

	return $this->_Pseudo;
  }
  
   public function get_total() 
  {
	 $bdd = Connexion::bdd(); 
	$sql = 'SELECT * FROM listejoueurs WHERE Id='.$this->_id.' ';
$rep = $bdd->query($sql);
$donnee = $rep->fetch();
  return $donnee["Nbpartiesjouees"];
  }
  
  public static function Pseudo_by_id($id)
  {
  	$bdd = Connexion::bdd();
  	$sql = 'SELECT * FROM listejoueurs WHERE Id='.$id.' ';
  	$rep = $bdd->query($sql);
  	$donnee = $rep->fetch();
  	return $donnee["Pseudo"];
  	
  }
  
  
  public function is_strat()
  {		  	
  	$bdd = Connexion::bdd();
  	$sql = 'SELECT * FROM listestrategies WHERE id_joueur='.$this->get_id().' ';
  	$rep = $bdd->query($sql);
return($rep->fetch());
 
  }
  
  
  public function set_attente()
  {
  	$bdd = Connexion::bdd(); 
  	$sql = 'INSERT INTO attente (Id) VALUES('.$this->get_id().')';
  	$rep = $bdd->query($sql);
}






  
  public function unset_attente()
  { 
  	$bdd = Connexion::bdd();
  	$sql = 'DELETE FROM attente WHERE Id='.$this->get_id();
  	$bdd->query($sql);

  }
  
  public function find_adv()
  {
  	$bdd = Connexion::bdd();
  	$sql = "LOCK TABLES `attente`WRITE";
  	$rep = $bdd->query($sql);

      $req = $bdd->query('SELECT * FROM attente WHERE 1 LIMIT 1');
      $reponse = $req->fetch();
      $nb = $reponse["id"];
      
  
      
      if($reponse == null)
      {
      	$sql = "UNLOCK TABLES";
      	$rep = $bdd->query($sql);
      return 0;
      }
      else 
      {
    
      	$req = $bdd->query('DELETE FROM attente WHERE id='.$nb);
          
          $sql = "UNLOCK TABLES";
          $rep = $bdd->query($sql);
          
         return $nb;
        
          
          
      }
  }
  
  
  
  public function Set_connexion()
  {
  	
  	$bdd = Connexion::bdd();
  	  	
  	$sql = 'UPDATE `listejoueurs` SET `Datederconnexion` =NOW() WHERE Id='.$this->_id.' ';
  	$rep = $bdd->query($sql);
  
  }
  
  public function Get_Sessionid()
  {
  	
  	$bdd = Connexion::bdd();
  	$id = uniqid();
  	$sql = 'UPDATE `listejoueurs` SET `SessionID` ="'.$id.'" WHERE Id='.$this->_id.' ';
  	$rep = $bdd->query($sql);
  	return $id;
  }
  
  public function is_eprel()
  {
  	$bdd = Connexion::bdd();
  	$sql = 'SELECT * FROM listejoueurs WHERE Id='.$this->_id.' ';
  	$rep = $bdd->query($sql);
  	$donnee = $rep->fetch();
  	return ($donnee["eprelid"]!=NULL);
  }
  
  
  public function get_mdp()
  {
  	$bdd = Connexion::bdd();
  	$sql = 'SELECT * FROM listejoueurs WHERE Id='.$this->_id.' ';
  	$rep = $bdd->query($sql);
  	$donnee = $rep->fetch();
  	return $donnee["Motdepasse"];
  }
  
  
  public function get_mail()
  {
  	$bdd = Connexion::bdd();
  	$sql = 'SELECT * FROM listejoueurs WHERE Id='.$this->_id.' ';
  	$rep = $bdd->query($sql);
  	$donnee = $rep->fetch();
  	return $donnee["Email"];
  }
  
  
     public function get_score_moyen() 
  {
	 $bdd = Connexion::bdd(); 
	$sql = 'SELECT * FROM listejoueurs WHERE Id='.$this->_id.' ';
$rep = $bdd->query($sql);
$donnee = $rep->fetch();
  return $donnee["score_moyen"];
  }
  
  public function get_last_change()
  {
  	$bdd = Connexion::bdd();
  	$sql = 'SELECT * FROM listejoueurs WHERE Id='.$this->_id.' ';
  	$rep = $bdd->query($sql);
  	$donnee = $rep->fetch();
  	return $donnee["date_changement"];
  }
  
  
  public function change_pseudo($pseudo)
  {
  	
  	$bdd = Connexion::bdd();
  	
  	$req = $bdd->prepare('UPDATE `listejoueurs` SET `Pseudo` = :pseudonyme , date_changement = NOW() WHERE `Id` = :id');
  	$req->execute(array('pseudonyme' => $pseudo, 'id' => $this->get_id())) or die(print_r($req->errorInfo()));
  	
  	$req -> closeCursor();
  	
  }
  
  
  public function inc_auto()
  {
  	
  	$bdd = Connexion::bdd();
  	
  	$sql = 'UPDATE `listejoueurs` SET auto = auto+1 WHERE Id='.$this->_id.' ';
  	$rep = $bdd->query($sql);
  	
  }
  
  
  public function get_auto()
  {
  	
  		$bdd = Connexion::bdd();
  		$sql = 'SELECT * FROM listejoueurs WHERE Id='.$this->_id.' ';
  		$rep = $bdd->query($sql);
  		$donnee = $rep->fetch();
  		return $donnee["auto"];

  }
  

  
  public function get_stat()
  {
  	echo "Parties jouées: " . $this->get_total () . "<br>";
  	echo "Score moyen: " . number_format($this->get_score_moyen (),4). "<br>";
  	echo "Penalités: " . $this->get_auto()."<br>";
  	echo "Nombre coopération face à une défection : " . $this->get_nbcoup ( 1, 0 ) . "<br>";
  	echo "Nombre coopération face à une coopération : " . $this->get_nbcoup ( 1, 1 ) . "<br>";
  	echo "Nombre défection face à une défection : " . $this->get_nbcoup ( 0, 0 ) . "<br>";
  	echo "Nombre défection face à une coopération : " . $this->get_nbcoup ( 0, 1 ) . "<br> <br>";
  }
  

     public function get_nbcoup($coup,$coupadv) 
  {
	  if($coup ==0 AND $coupadv == 0)
	  {
		  $nom = 'Nbdefedefe';
	  }
	    if($coup ==0 AND $coupadv == 1)
	  {
		  $nom = 'Nbdefecoop';
	  }
	    if($coup ==1 AND $coupadv == 1)
	  {
		  $nom = 'Nbcoopcoop';
	  }
	    if($coup ==1 AND $coupadv == 0)
	  {
		  $nom = 'Nbcoopdefe';
	  }
	  
	   $bdd = Connexion::bdd(); 
	$sql = 'SELECT * FROM listejoueurs WHERE Id='.$this->_id.' ';
$rep = $bdd->query($sql);
$donnee = $rep->fetch();
  return $donnee[$nom];
  
  }
  
  
       public function inc_nbcoup($coup,$coupadv) 
  {
	  if($coup ==0 AND $coupadv == 0)
	  {
		  $nom = 'Nbdefedefe';
	  }
	    if($coup ==0 AND $coupadv == 1)
	  {
		  $nom = 'Nbdefecoop';
	  }
	    if($coup ==1 AND $coupadv == 1)
	  {
		  $nom = 'Nbcoopcoop';
	  }
	    if($coup ==1 AND $coupadv == 0)
	  {
		  $nom = 'Nbcoopdefe';
	  }
	  
	   $bdd = Connexion::bdd(); 
	$sql = 'UPDATE listejoueurs SET '.$nom.'='.$nom.'+ 1 WHERE Id='.$this->_id.' ';
$rep = $bdd->query($sql);
	$sql = 'UPDATE listejoueurs SET Nbpartiesjouees = Nbpartiesjouees + 1 WHERE Id='.$this->_id.' ';
$rep = $bdd->query($sql);
	$sql = 'UPDATE listejoueurs SET score = score + '.getGain($coup,$coupadv).' WHERE Id='.$this->_id.' ';
$rep = $bdd->query($sql);
	$sql = 'UPDATE listejoueurs SET score_moyen =score /Nbpartiesjouees WHERE Id='.$this->_id.' ';
$rep = $bdd->query($sql);

  
  }
  
  
  
  
  

}
?>