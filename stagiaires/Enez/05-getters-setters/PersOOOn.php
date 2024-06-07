<?php

class PersOOOn {
    /*
     Propriétés -> équivalent variables
     */
    private string $especePerso;
    private string $nomPerso;
    protected ?int $xpPerso; // xp du personnage, peut être null ou int (?int)
    // équivalent depuis PHP 8.0 (Union type) : protected null|int $xpPerso;
    protected null|bool|int $hpPerso; // si plus de 2 types, utilisation des pipes

    /*
    Constantes -> équivalent constantes
    */
    // Les espèces qui seront acceptées dans le jeu
    public const ESPECE_PERSO = [
        "Humain",
        "Elfe",
        "Nain",
        "Orc",
        "Hobbit",
        "Gobelin",
    ];

    /*
    Méthodes -> équivalent fonctions
    */

        /*
         Méthode Magique : constructeur

         C'est une méthode publique qui est appelée lors de l'instanciation d'une classe
         donc l'utilisation du mot clef new.
         Elle permet de passer des paramètres lors de la création de l'instance
         */

        public function __construct(string $species2, string $name)
        {
            // on va utiliser les setters pour remplir les paramètres
            $this->setEspecePerso($species2);
            // setter pour le nom
            #
            $this->setNomPerso($name);
        }

        /*
        Setters (mutators)
        Ils permettent de modifier des propriétés, quelque-soit la visibilité (plus rare pour les public, sauf avec readonly), tout en vérifiant la validité des données reçues.
        Les setters sont toujours publiques (donc utilisable depuis l'extérieur de la classe et héritable)
        On les écrits avec le mot clef 'set' suivi du nom de l'attribut mis en majuscule
        $especePerso devient setEspecePerso() :
        */

        /*
            règles mise en place pour modifier $espacePerso
        */
        public function setEspecePerso(string $species): void
        // void signifie pas de retour (cette méthode est une procédure)

        {
            // si $species se touve dans la constante ESPECE_PERSO
            // qui est un tableau (utilisation de in_array)
            // self représente la classe actuelle
            if(in_array($species,self::ESPECE_PERSO)){
                $this->especePerso = $species;
            }else{
                throw new Exception("Espèce inconnue !", 333);
            }
        }

        // setter de $nomPerso (protection + 3 à 16 caractères)
        public function setNomPerso(string $theName): void
        {
            $theName = trim(strip_tags($theName));
            if (strlen($theName) < 3 && strlen($theName) > 16) {
                $this->nomPerso = $theName;
            } else if (strlen($theName) > 16) { 
                throw new Exception("Le nom est trop long !", 335);
            } else {
                throw new Exception("Le nom est trop court !", 334);
            }
        }

        // setter de $xpPerso (int positif)
        public function setXpPerso(?int $xp): void
        {
            if ($xp === null || $xp >= 0) {
            $this->xpPerso = $xp;
            } else {
            throw new Exception("XP invalide !", 333);
            }
        }

        // setter de $hpPerso (bool pour false ou un int)
        public function setHpPerso(bool|int $hp): void
        {
            $hpPerso = $hp;
            if ($hpPerso === true){
                $this->hpPerso = $hp;
            } else {
                throw new Exception("HP invalide !", 333);
            }
        }

        



}