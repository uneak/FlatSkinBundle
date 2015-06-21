<?php

namespace Uneak\FlatSkinBundle\Block\Component;

use Uneak\AdminBundle\Assets\ExternalJs;
use Uneak\AdminBundle\Assets\ScriptFileTemplateJs;
use Uneak\AdminBundle\Block\Component;

class GoogleMap extends Component
{
    protected $locationData;

    public function __construct($title = "", $locationData = array())
    {
        parent::__construct();
        $this->metas->_init($locationData);

        $this->template = 'UneakFlatSkinBundle:Block:Component/component_googlemap.html.twig';

    }

    public function _registerExternalFile()
    {
        $script = array();
        $script["google_map_js"] = new ExternalJs("http://maps.google.com/maps/api/js?sensor=false&libraries=places");
        return $script;
    }

    public function _registerScript()
    {
        $script = array();
        $script["script_google_map"] = new ScriptFileTemplateJs("UneakFlatSkinBundle:Block:GoogleMap/googlemap_script.html.twig", null, array('item' => $this));
        return $script;
    }

    /**
     * @return mixed
     */
    public function getLocationData()
    {
        return $this->locationData;
    }

    /**
     * @param mixed $locationData
     */
    public function setLocationData($locationData)
    {
        $this->locationData = $locationData;
        return $this;
    }


}
