<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

class Parser extends CBitrixComponent{

    protected $arDefaultUrlTemplates404 = array(
        "list" => "",
        "search" => "search/",
        "rss" => "rss/",
        "rss_section" => "#SECTION_ID#/rss/",
        "detail" => "#ELEMENT_ID#/",
        "section" => "",
    );

    protected $arComponentVariables = array("IBLOCK_ID", "ELEMENT_ID");

    public function handlerArParams(){


    }

    public function setarResult(){


    }

    public function executeComponent()
    {
        if($this->arParams["SEF_MODE"] == "Y")
        {
            $arVariables = array();
            $arUrlTemplates = CComponentEngine::makeComponentUrlTemplates($this->arDefaultUrlTemplates404, $this->arParams["SEF_URL_TEMPLATES"]);
            $arVariableAliases = CComponentEngine::makeComponentVariableAliases($this->arDefaultVariableAliases404, $this->arParams["VARIABLE_ALIASES"]);

            $componentPage = CComponentEngine::ParseComponentPath($this->arParams["SEF_FOLDER"], $arUrlTemplates, $arVariableAliases);
            if(strlen($componentPage) <= 0)
                $componentPage = "list";

            CComponentEngine::InitComponentVariables($componentPage, $this->arComponentVariables, $arVariableAliases, $arVariables);

            $SEF_FOLDER = $this->arParams["SEF_FOLDER"];
            $this->arResult = array(
                "FOLDER" => $SEF_FOLDER,
                "URL_TEMPLATES" => $arUrlTemplates,
                "VARIABLES" => $arVariables,
                "ALIASES" => $arVariableAliases
            );


            $this->includeComponentTemplate($componentPage);
        }



    }
}

?>