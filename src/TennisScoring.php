<?php

namespace Acme;

class TennisScoring
{
    protected $player1;
    protected $player2;

    protected $lookup = [
        0 => 'Love',
        1 => 'Fifteen',
        2 => 'Thirty',
        3 => 'Fourty',
    ];

    public function __construct(Player $player1, Player $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    public function score()
    {
        if ($this->hasAWinner()) {
            return 'Win for ' . $this->winner()->name;
        }

        if ($this->hasTheAdvantage()) {
            return 'Advantage ' . $this->winner()->name;
        }

        if ($this->inDeuce()) {
            return 'Deuce';
        }

        $score = $this->lookup[$this->player1->points] . '-';
        $score .= $this->tied() ? 'All' : $this->lookup[$this->player2->points];

        return $score;
    }

    protected function hasAWinner()
    {
        return $this->hasEnoughPointsToBeWon() && $this->isLeadingByTwo();
    }

    protected function hasTheAdvantage()
    {
        return $this->hasEnoughPointsToBeWon() && abs($this->player1->points - $this->player2->points) >= 1;
    }

    protected function inDeuce()
    {
        return $this->player1->points + $this->player2->points >= 6 && $this->tied();
    }

    protected function winner()
    {
        return $this->player1->points > $this->player2->points ? $this->player1 : $this->player2;
    }

    protected function hasEnoughPointsToBeWon()
    {
        return max($this->player1->points, $this->player2->points) >= 4;
    }

    protected function isLeadingByTwo()
    {
        return abs($this->player1->points - $this->player2->points) >= 2;
    }

    protected function tied()
    {
        return $this->player1->points === $this->player2->points;
    }
}
