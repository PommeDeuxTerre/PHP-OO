<?php

abstract class PersoClasse2Abstract {

  /*
   * Propriétés
   */

  // Propriétés héritables
  protected ?string $persoName;
  protected ?string $persoEspece;
  protected ?string $infoPerso;
  protected int $persoXP = 0;
  protected int $persoHP = 1000;
  protected int $persoAbility = 100;
  protected int $persoSrength = 100;
  protected int $persoSpeed = 100;


  /*
   * Constantes
   */
  public const ESPECE_PERSO = [
    "Humain"=>[
      "hp"=>[
        [self::BIG_DICE, 2]
      ],
      "ability"=>[
        [self::BIG_DICE, 1],
        [self::SMALL_DICE, 2]
      ],
      "strength"=>[
        [self::BIG_DICE, 1],
        [self::SMALL_DICE, 1]
      ],
      "speed"=>[
        [self::SMALL_DICE, 2],
        [self::SMALL_DICE, -2]
      ]
    ],
    "Elfe"=>[
      "hp"=>[
        [self::SMALL_DICE, 3]
      ],
      "ability"=>[
        [self::BIG_DICE, -2],
        [self::BIG_DICE, 4]
      ],
      "strength"=>[
        [self::BIG_DICE, 1],
        [self::SMALL_DICE, 1]
      ],
      "speed"=>[
        [self::SMALL_DICE, 2],
        [self::SMALL_DICE, -2]
      ]
    ],
    "Nain"=>[
      "hp"=>[
        [self::SMALL_DICE, 3]
      ],
      "ability"=>[
        [self::BIG_DICE, -2],
        [self::BIG_DICE, 4]
      ],
      "strength"=>[
        [self::BIG_DICE, 1],
        [self::SMALL_DICE, 1]
      ],
      "speed"=>[
        [self::SMALL_DICE, 2],
        [self::SMALL_DICE, -2]
      ]
    ],
  ];

  public const SMALL_DICE = 6;
  public const BIG_DICE = 20;

  /*
   * Méthodes
   */

  // Constructeur, devra être hérité
  /**
   * @throws Exception
   */
  public function __construct(string $name, string $espece)
  {
    $this->setPersoName($name);
    $this->setPersoEspece($espece);
  }


  // Méthodes à déclarer dans les enfants
  abstract protected function lanceDes(int $dice, int $number):int;
  abstract protected function initPerso(string $espece):self;
  abstract protected function initHP(string $espece):self;
  abstract protected function initAbility(string $espece):self;
  abstract protected function initStrength(string $espece):self;
  abstract protected function initSpeed(string $espece):self;

  // GETTERS et SETTERS hérités

  public function getPersoName(): ?string
  {
    return $this->persoName;
  }

  /**
   * @throws Exception
   */
  public function setPersoName(?string $persoName): void
  {
    // on retire les tags puis les espaces avant et arrière
    $theName = trim(strip_tags($persoName));
    // si $theName est plus petit que 3 caractères
    $nameLength = strlen($theName); // prise de longueur
    if($nameLength<3){
      throw new Exception("Le nom est trop court !", 333);
    }elseif($nameLength>16){
      throw new Exception("Le nom est trop long !",334);
    }
    $this->persoName = $persoName;
  }

  public function getPersoEspece(): ?string
  {
    return $this->persoEspece;
  }

  /**
   * @throws Exception
   */
  public function setPersoEspece(?string $persoEspece): void {
    if(array_key_exists($persoEspece, self::ESPECE_PERSO)){
      $this->persoEspece = $persoEspece;
    }else{
      throw new Exception("Espèce inconnue !", 335);
    }

  }

  // infos perse
  public function getInfoPerso(): ?string
  {
    return $this->infoPerso;
  }

  public function setInfoPerso(?string $infoPerso): void
  {
    $this->infoPerso = $infoPerso;
  }

  // xp
  public function getPersoXP(): int
  {
    return $this->persoXP;
  }

  public function setPersoXP(int $persoXP): void
  {
    $this->persoXP = $persoXP;
  }

  // hp
  public function getPersoHP(): int
  {
    return $this->persoHP;
  }

  public function setPersoHP(int $persoHP): void
  {
    $this->persoHP = $persoHP;
  }

  // ability
  public function getPersoAbility(): int
  {
    return $this->persoAbility;
  }

  public function setPersoAbility(int $persoAbility): void
  {
    $this->persoAbility = $persoAbility;
  }

  // strength
  public function getPersoStrength(): int
  {
    return $this->persoStrength;
  }

  public function setPersoStrength(int $persoStrength): void
  {
    $this->persoStrength = $persoStrength;
  }

  // speed
  public function getPersoSpeed(): int
  {
    return $this->persoSpeed;
  }

  public function setPersoSpeed(int $persoSpeed): void
  {
    $this->persoSpeed = $persoSpeed;
  }
}
