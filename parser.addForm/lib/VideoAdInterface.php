<?php

namespace Parser\Int;

interface VideoAdInterface
{

    public function getServiceName();

    public function getTitle();

    public function getDescription();

    public function getVideoID();

    public function getRawUrl();

    public function getViewCount();

}

?>