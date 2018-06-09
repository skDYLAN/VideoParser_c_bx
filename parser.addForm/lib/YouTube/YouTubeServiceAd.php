<?php

namespace parser\lib\YouTube;

use Parser\Abstr\AbstractServiceAdapter;

require($_SERVER['DOCUMENT_ROOT']."/local/components/skDYLAN/parser.addForm/lib/AbstractServiceAd.php");

class YouTubeServiceAd extends AbstractServiceAdapter
{

    protected $RawUrl;
    protected $ApiKey;
    protected $VideoID;
    protected $Title;
    protected $Description;
    protected $ViewCount;
    public $initFlag = false;

    protected $arRegexp = array(
            '/[http|https]+:\/\/(?:www\.|)youtube\.com\/watch\?(?:.*)?v=([a-zA-Z0-9_\-]+)/i',
            '/[http|https]+:\/\/(?:www\.|)youtube\.com\/embed\/([a-zA-Z0-9_\-]+)/i',
            '/[http|https]+:\/\/(?:www\.|)youtu\.be\/([a-zA-Z0-9_\-]+)/i'
        );

    public function __construct($url, $ApiKey)
    {
        $this->RawUrl = $url;
        $this->ApiKey = $ApiKey;

        $this->setVideoId();
        $this->getData();
        $this->initFlag = true;

    }

    function getData(){

        $dataSnippet = file_get_contents("https://www.googleapis.com/youtube/v3/videos?key=".$this->ApiKey."&part=snippet&id=".$this->VideoID);
        $jsonSnippet = json_decode($dataSnippet,true);

        $dataStatistics = file_get_contents("https://www.googleapis.com/youtube/v3/videos?key=".$this->ApiKey."&part=statistics&id=".$this->VideoID);
        $jsonStatistics = json_decode($dataStatistics,true);

        if($jsonSnippet != false) {
            $this->Title = $jsonSnippet["items"][0]["snippet"]["title"];
            $this->Description = $jsonSnippet["items"][0]["snippet"]["description"];
            $this->ViewCount = $jsonStatistics["items"][0]["statistics"]["viewCount"];
            return true;
        }
        else
            return false;

    }

    function setVideoId(){
        foreach ($this->arRegexp as $regexp)
        {
            preg_match($regexp, $this->RawUrl, $result);
            if($result[1] != null)
            {
                $this->VideoID = $result[1];
                return;
            }
        }
    }

    public function getServiceName()
    {
        return "YouTube";
    }

    public function getTitle()
    {
        return $this->Title;
    }
    public function getDescription()
    {
        return $this->Description;
    }
    public function getVideoId()
    {
        return $this->VideoID;
    }
    public function getRawUrl()
    {
        return $this->rawUrl;
    }
    public function getViewCount(){
        return $this->ViewCount;
    }

    function setId($url){

    }

}