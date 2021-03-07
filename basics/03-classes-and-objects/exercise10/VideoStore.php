<?php

class VideoStore
{
    private array $inventory;

    private function addVideo(Video $video): void
    {
        $this->inventory[] = $video;
    }

    public function addFewVideos(array $videos): void
    {
        foreach($videos as $video)
        {
            $this->addVideo($video);
        }
    }

    public function listInventory():array
    {
        return $this->inventory;
    }

    public function getVideoByKey(int $number): Video
    {
        $tempArr = [];
        foreach($this->inventory as $key => $video){
            if($key === $number){
                $tempArr = $video;
            }
        }
        return $tempArr;
    }
}
