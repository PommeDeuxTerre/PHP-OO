<?php

class PersoClasse2 extends PersoClasse2Abstract {
  public function __construct(string $name, string $espece){
    parent::__construct($name, $espece);
  }

  protected function lanceDes(int $dice=self::SMALL_DICE, int $number=1):int {
    if ($number < 0)return -$this->lanceDes($dice, -$number);

    $total = 0;
    for ($i=0;$i<$number;$i++){
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

  private function throwAbilityDices(string $espece, string $caracteristic):int{
    $dices = self::ESPECE_PERSO[$espece][$caracteristic];
    return array_sum(
      array_map(
        fn(array $dice):int => $this->lanceDes($dice[0], $dice[1]),
        $dices
      )
    );
  }

  protected function initHP(string $espece):self{
    $this->persoHP += $this->throwAbilityDices($espece, "hp");
    return $this;
  }

  protected function initAbility(string $espece):self{
    $this->persoAbility += $this->throwAbilityDices($espece, "ability");
    return $this;
  }

  protected function initStrength(string $espece):self{
    $this->persoSrength += $this->throwAbilityDices($espece, "strength");
    return $this;
  }

  protected function initSpeed(string $espece):self{
    $this->persoSpeed += $this->throwAbilityDices($espece, "speed");
    return $this;
  }
}
