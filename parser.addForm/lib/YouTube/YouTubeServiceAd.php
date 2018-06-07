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

    public function __construct($ApiKey, $url)
    {
        $this->RawUrl = $url;
        $this->apikey = $ApiKey;

        $this->getData();
        //$json = file_get_contents();

    }

    function getData(){
        $data = file_get_contents("https://www.googleapis.com/youtube/v3/videos?key=AIzaSyC9PKVMftl0xNdEVN6qqRqLwenOaEHZgAs&part=snippet&id=L397TWLwrUU");
        $json = json_decode($data,true);

        $this->Title = $json["items"][0]["snippet"]["title"];
        $this->Description = $json["items"][0]["snippet"]["description"];

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

    function setId($url){

    }

}