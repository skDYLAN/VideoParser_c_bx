<?php

namespace Parser\Abstr;

use Parser\Int\VideoAdInterface;
use parser\lib\YouTube\YouTubeServiceAd;

require($_SERVER['DOCUMENT_ROOT']."/local/components/skDYLAN/parser.addForm/lib/VideoAdInterface.php");

abstract class AbstractServiceAdapter implements VideoAdInterface
{
    /**
     * @var string
     */
    protected $rawUrl;
    /**
     * @var string
     */
    public $videoId;
    /**
     * @var string
     */
    public $pattern;
    /**
     * @var string
     */
    public $title;


    /**
     * AbstractVideoAdapter constructor.
     *
     * @param string $url
     * @param string $pattern
     * @param EmbedRendererInterface $renderer
     */
    public function __construct()
    {
        //$this->rawUrl = $url;
    }


    /**
     * Returns the input URL.
     *
     * @return string
     */
    public function getRawUrl()
    {
        return $this->rawUrl;
    }
    /**
     * @param string $rawUrl
     */

    public function getTitle()
    {
        return $this->title;
    }

    public function setRawUrl($rawUrl)
    {
        $this->rawUrl = $rawUrl;
    }
    /**
     * @return string
     */
    public function getVideoId()
    {
        return $this->videoId;
    }
    /**
     * @param string $videoId
     */
    public function setVideoId($videoId)
    {
        $this->videoId = $videoId;
    }

    public static function getServiceAd($params){
        $videoHosts = array(
            "YouTube"   => array("youtube.com","youtu.be"),
            "Rutube"    => array("rutube.ru"),
        );
        $result = "";

        $host = parse_url($params->url, PHP_URL_HOST);

        foreach ($videoHosts as $hosting => $items)
        {
            foreach ($items as $item) {

                if (strripos($host, $item) !== false)
                {
                    $result = $hosting;

                }
            }
        }

        $serviceAd = null;
        if($result === "YouTube")
            $serviceAd = new YouTubeServiceAd($params->url, $params->ApiKey_YouTube);


        return $serviceAd;
    }

}

class stdParams{
    public $ApiKey_YouTube;
    public $url;
}


?>