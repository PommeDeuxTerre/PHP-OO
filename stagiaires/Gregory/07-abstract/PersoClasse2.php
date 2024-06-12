<?php

class PersoClasse2 extends PersoClasse2Abstract {
  public function __construct(string $name, string $espece){
    parent::__construct($name, $espece);
  }

  protected function lanceDes(int $dice=self::SMALL_DICE, int $number=1):int {
    if ($number < 0)return -$this->lanceDes($dice, -$number);

    $total = 0;
    for ($i=0;$i++;$i<$number){
      $total += rand(1, $dice);
    }
    return $total;
  }

  protected function initPerso($espece):self{
    $this->initHP($espece);
    $this->initAbility($espece);
    $this->initStrength($espece);
    $this->initSpeed($espece);
    return $this;
  }

  protected function initHP(string $espece):self{
    $dices = self::ESPECE_PERSO[$espece]["hp"];
    foreach ($dices as $dice){
      $this->persoHP += $this->lanceDes($dice[0], $dice[1]);
    }
    return $this;
  }

  protected function initAbility(string $espece):self{
    $dices = self::ESPECE_PERSO[$espece]["ability"];
    foreach ($dices as $dice){
      $this->persoAbility += $this->lanceDes($dice[0], $dice[1]);
    }
    return $this;
  }

  protected function initStrength(string $espece):self{
    $dices = self::ESPECE_PERSO[$espece]["strength"];
    foreach ($dices as $dice){
      $this->persoSrength += $this->lanceDes($dice[0], $dice[1]);
    }
    return $this;
  }

  protected function initSpeed(string $espece):self{
    $dices = self::ESPECE_PERSO[$espece]["speed"];
    foreach ($dices as $dice){
      $this->persoSpeed += $this->lanceDes($dice[0], $dice[1]);
    }
    return $this;
  }
}
