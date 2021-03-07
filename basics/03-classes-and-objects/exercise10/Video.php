<?php

class Video
{
    private string $title;
    private bool $checked;
    private array $averageRating;

    public function __construct(string $title, bool $checked = false, array $averageRating = [])
    {
        $this->title = $title;
        $this->checked = $checked;
        $this->averageRating = $averageRating;
    }

    private function getTitle(): string
    {
        return $this->title;
    }

    public function getIfChecked(): bool
    {
        return $this->checked;
    }

    public function setIfChecked(bool $bool): void
    {
        $this->checked = $bool;
    }

    private function getRating(): float
    {
        if ($this->averageRating === []) {
            return 0;
        } else {
            $length = count($this->averageRating);
            $sum = array_sum($this->averageRating);
            return round($sum / $length, 1);
        }
    }

    public function setRating(int $rating): void
    {
        $this->averageRating[] = $rating;
    }

    public function getVideo(): string
    {
        $tempString = '';
        if (!$this->getIfChecked()) {
            $tempString = 'available';
        } else {
            $tempString = 'not available';
        }
        return $this->getTitle() . ', ' . $tempString . ', rating: ' . $this->getRating();
    }
}