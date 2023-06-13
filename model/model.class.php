<?php
    class Modele {
        private $unPDO;

        public function __construct (){
            try{
            $this->unPDO = new PDO ("mysql:host=localhost:3307;dbname=rdv_medecin","root","");
            }
            catch (PDOException $exp){
                echo "Erreur Connexion :".$exp->getMessage ();
            }
        }

        /***********  Connexion  ***********/
        public function verifConnexion ($email, $mdp){
            $requete ="SELECT * from user where email=:email and mdp=:mdp ;";
            $donnees=array(":email"=>$email, ":mdp"=>$mdp);
            $select=$this->unPDO->prepare($requete);
            $select->execute ($donnees);
            return $select->fetch ();
        }

        /***********  Patient  ***********/
        public function insertPatient ($tab){
            // écriture de la requete preparée d'insertion d'un patient
            $requete = "INSERT into patient values (null, :nom, :prenom, :email, :adresse, :age, :mdp);";
            /* creation d'un tableau de données de correspondance entre 
               les paramètres PDO et les données reçues en entrée */
            $donnees = array(   ":nom"=>$tab['nom'],
                                ":prenom"=>$tab['prenom'],
                                ":email"=>$tab['email'], 
                                ":adresse"=>$tab['adresse'],
                                ":age"=>$tab['age'],
                                ":mdp"=>$tab['mdp']
                            );

            // préparation de la requete
            $insert = $this->unPDO->prepare ($requete);

            // execution de la requete
            $insert->execute ($donnees);
        }

        // fonction qui récupère tout les patients
        public function selectAllPatients (){
            $requete ="SELECT * FROM patient; ";
            $select = $this->unPDO->prepare($requete);
            $select->execute();
            return $select->fetchAll();
        }

        // fonction qui supprime un patient en fonction de l'id
        public function deletePatient ($idPatient){
            $requete="DELETE FROM patient WHERE idpatient = :idpatient ;";
            $donnees=array(":idpatient"=>$idPatient);
            $delete = $this->unPDO->prepare($requete);
            $delete->execute ($donnees);
        }

        // fonction qui permet de modifier les informations d'un patient
        public function updatePatient ($tab){
            $requete = "UPDATE patient SET nom=:nom, prenom=:prenom, email=:email, adresse=:adresse, age=:age, mdp=:mdp WHERE idpatient=:idpatient ;";
            $donnees = array(   ":nom"=>$tab['nom'],
                                ":prenom"=>$tab['prenom'],
                                ":email"=>$tab['email'], 
                                ":adresse"=>$tab['adresse'],
                                ":age"=>$tab['age'],
                                ":mdp"=>$tab['mdp'],
                                ":idpatient"=>$tab['idpatient']
                            );
            $update = $this->unPDO->prepare($requete);
            $update->execute ($donnees);
            header("Location: index.php?page=1");
        }

        public function selectWherePatient ($idPatient){
            $requete = "select * from patient where idpatient = :idpatient ;";
            $donnees=array(":idpatient"=>$idPatient);
            $select = $this->unPDO->prepare($requete);
            $select->execute($donnees);
            return $select->fetch(); //un seul résultat 
        }

        // fonction qui permet de filtrer la liste des patients
        public function selectLikePatients ($mot){
            $requete ="select * from patient where nom like :mot or prenom like :mot or email like :mot or adresse like :mot or age like :mot;";
            $donnees=array(":mot"=>"%".$mot."%");
            $select = $this->unPDO->prepare($requete);
            $select->execute($donnees);
            return $select->fetchAll();
        }

        /***********  Medecin  ***********/
        public function insertMedecin ($tab){
            //écriture de la requete preparée d'insertion d'une medecin
            $requete = "INSERT into medecin values (null, :nom, :prenom, :email, :mdp, :specialite, :idpatient);";

            /* creation d'un tableau de données de correspondance entre 
               les paramètres PDO et kes données reçues en entrée */
            $donnees =array (   ":nom"=>$tab['nom'],
                                ":prenom"=>$tab['prenom'],
                                ":email"=>$tab['email'],
                                ":mdp"=>$tab['mdp'],
                                ":specialite"=>$tab['specialite'],
                                ":idpatient"=>$tab['idpatient']
                            );
            //préparation de la requete
            $insert = $this->unPDO->prepare ($requete);
            //execution de la requete
            $insert->execute ($donnees);
        }

        // fonction qui liste tout les médecins
        public function selectAllMedecins (){
            $requete ="select * from medecin; ";
            $select = $this->unPDO->prepare($requete);
            $select->execute();
            return $select->fetchAll();
        }

        // fonction qui supprime un médecin en fonction de l'id
        public function deleteMedecin ($idMedecin){
            $requete="DELETE from medecin where idmedecin = :idmedecin ;";
            $donnees=array(":idmedecin"=>$idMedecin);
            $delete = $this->unPDO->prepare($requete);
            $delete->execute ($donnees);
        }

        // fonction qui permet la modification d'un médecin
        public function updateMedecin ($tab){
            $requete ="UPDATE medecin set nom = :nom, prenom = :prenom, email = :email, mdp=:mdp,specialite=:specialite,idpatient=:idpatient  where 
            idmedecin = :idmedecin ;";
            $donnees = array(
                                ":nom"=>$tab['nom'],
                                ":prenom"=>$tab['prenom'],
                                ":email"=>$tab['email'], 
                                ":mdp"=>$tab['mdp'], 
                                ":specialite"=>$tab['specialite'], 
                                ":idpatient"=>$tab['idpatient'], 
                                ":idmedecin"=>$tab['idmedecin']
                            );
            $update = $this->unPDO->prepare($requete);
            $update->execute ($donnees);
            header("Location: index.php?page=2");
        }

        public function selectWhereMedecin ($idMedecin){
            $requete = "select * from medecin where idmedecin = :idmedecin ;";
            $donnees=array(":idmedecin"=>$idMedecin);
            $select = $this->unPDO->prepare($requete);
            $select->execute($donnees);
            return $select->fetch(); //un seul résultat 
        }

        // fonction qui permet de filtrer la liste des médecins
        public function selectLikeMedecins ($mot){
            $requete ="select * from medecin where nom like :mot or prenom like :mot or email like :mot or specialite like :mot or idpatient like :mot ;";
            $donnees=array(":mot"=>"%".$mot."%");
            $select = $this->unPDO->prepare($requete);
            $select->execute($donnees);
            return $select->fetchAll();
        }

        /***********  Rendez-vous  ***********/
        public function insertRendezvous ($tab){
            //écriture de la requete preparée d'insertion d'une rendezvous
            $requete = "INSERT into rendezvous values (null, :daterdv, :heure, :idpatient, :idmedecin);";

            /* creation d'un tableau de données de correspondance entre 
               les paramètres PDO et les données reçues en entrée */
            $donnees =array (":daterdv"=>$tab['daterdv'],
                            ":heure"=>$tab['heure'],
                            ":idpatient"=>$tab['idpatient'],
                             ":idmedecin"=>$tab['idmedecin']);
            //préparation de la requete
            $insert = $this->unPDO->prepare ($requete);
            //execution de la requete
            $insert->execute ($donnees);
        }

        // fonction qui liste tout les rendez-vous
        public function selectAllRendezvous (){
            $requete ="select * from rendezvous; ";
            $select = $this->unPDO->prepare($requete);
            $select->execute();
            return $select->fetchAll();
        }

        // fonction qui supprime un rendez-vous en fonction de l'id
        public function deleteRendezvous ($idRendezvous){
            $requete="DELETE from rendezvous where idrendezvous = :idrendezvous ;";
            $donnees=array(":idrendezvous"=>$idRendezvous);
            $delete = $this->unPDO->prepare($requete);
            $delete->execute ($donnees);
        }

        // fonction qui permet d'éditer un rendez-vous
        public function updateRendezvous ($tab){
            $requete ="UPDATE rendezvous set daterdv = :daterdv, heure = :heure, idpatient = :idpatient, idmedecin = :idmedecin where 
            idrendezvous = :idrendezvous ;";
            $donnees =array (":daterdv"=>$tab['daterdv'],
                            ":heure"=>$tab['heure'],
                            ":idpatient"=>$tab['idpatient'],
                             ":idmedecin"=>$tab['idmedecin'],
                             ":idrendezvous"=>$tab['idrendezvous']
                            );
            $update = $this->unPDO->prepare($requete);
            $update->execute ($donnees);
            header("Location: index.php?page=3");
        }

        public function selectWhereRendezvous ($idRendezvous){
            $requete = "select * from rendezvous where idrendezvous = :idrendezvous ;";
            $donnees=array(":idrendezvous"=>$idRendezvous);
            $select = $this->unPDO->prepare($requete);
            $select->execute($donnees);
            return $select->fetch(); //un seul résultat 
        }

        // fonction qui filtre les rendez-vous
        public function selectLikeRendezvous ($mot){
            $requete ="select * from rendezvous where date like :mot or heure like :mot or idpatient like :mot or idmedecin like :mot ;";
            $donnees=array(":mot"=>"%".$mot."%");
            $select = $this->unPDO->prepare($requete);
            $select->execute($donnees);
            return $select->fetchAll();
        }

        /***********  Prescription  ***********/
        public function insertPrescription ($tab){
            //écriture de la requete preparée d'insertion d'une prescription
            $requete = "INSERT into prescription values (null, :dateprescription, :medicament, :idpatient, :idmedecin);";

            /* creation d'un tableau de données de correspondance entre 
               les paramètres PDO et kes données reçues en entrée */
            $donnees =array (":dateprescription"=>$tab['dateprescription'],
                            ":medicament"=>$tab['medicament'],
                            ":idpatient"=>$tab['idpatient'],
                            ":idmedecin"=>$tab['idmedecin']
                        );
            //préparation de la requete
            $insert = $this->unPDO->prepare ($requete);
            //execution de la requete
            $insert->execute ($donnees);
        }

        // fonction qui liste toutes les prescriptions
        public function selectAllPrescriptions (){
            $requete ="select * from prescription; ";
            $select = $this->unPDO->prepare($requete);
            $select->execute();
            return $select->fetchAll();
        }

        // fonction qui supprime une prescription
        public function deletePrescription ($idPrescription){
            $requete="delete from prescription where idprescription = :idprescription ;";
            $donnees=array(":idprescription"=>$idPrescription);
            $delete = $this->unPDO->prepare($requete);
            $delete->execute ($donnees);
        }

        // fonction pour modifier une prescription
        public function updatePrescription ($tab){
            $requete ="update prescription set dateprescription = :dateprescription, medicament = :medicament, idpatient = :idpatient, idmedecin = :idmedecin where 
            idprescription = :idprescription ;";
            $donnees = array(":dateprescription"=>$tab['dateprescription'],
                            ":medicament"=>$tab['medicament'],
                            ":idpatient"=>$tab['idpatient'],
                            ":idmedecin"=>$tab['idmedecin'],
                            ":idprescription"=>$tab['idprescription']
                            );
            $update = $this->unPDO->prepare($requete);
            $update->execute ($donnees);
        }

        public function selectWherePrescription ($idPrescription){
            $requete = "select * from prescription where idprescription = :idprescription ;";
            $donnees=array(":idprescription"=>$idPrescription);
            $select = $this->unPDO->prepare($requete);
            $select->execute($donnees);
            return $select->fetch(); //un seul résultat 
        }

        // fonction qui filtre la liste des prescriptions
        public function selectLikePrescription ($mot){
            $requete ="select * from prescription where dateprescription like :mot or medicament like :mot or idpatient like :mot or idmedecin like :mot or idprescription like :mot;";
            $donnees=array(":mot"=>"%".$mot."%");
            $select = $this->unPDO->prepare($requete);
            $select->execute($donnees);
            return $select->fetchAll();
        }
    }
