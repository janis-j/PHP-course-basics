<?php

namespace RacingApp;

class RacingTrack
{
    private int $length;
    private int $rows;

    public function __construct(int $length, int $rows)
    {
        $this->length = $length;
        $this->rows = $rows;
    }

    public function getTrack(): array
    {
        $tempArray = [];
        for($i = 0; $i < $this->rows; $i++)
        {   $tempArray[] = [];
            for($j = 0; $j < $this->length; $j++)
            {
                $tempArray[$i][] = '⬜';
            }
        }
        return $tempArray;
    }

    public function getLength():int
    {
        return $this->length;
    }
}