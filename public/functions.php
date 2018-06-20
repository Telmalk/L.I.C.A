<?php


function getRating(int $win, int $defeat, int $attack, int $defense, int $speed): int
{
    $def = $defeat === 0 ? 1 : $defeat;
	$bonusPalmares = ($win/$def) * $win;
	$divide = $bonusPalmares === 0 ? 3 : 4;

	$rating = ($attack + $defense + $speed + $bonusPalmares) / $divide;

	return $rating;
}

function getPrice(): int
{
    $multiplier = 9;
    $rating = getRating($this->win, $this->defeat, $this->attack, $this->defense, $this->speed);
    $price = floor($rating * $multiplier);

    return $price;
}