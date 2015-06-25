<?php

namespace Uneak\FlatSkinBundle\Block\Component;

use Uneak\AssetsManagerBundle\Assets\AssetExternalJs;
use Uneak\AssetsManagerBundle\Assets\AssetInternalJs;
use Uneak\BlocksManagerBundle\Blocks\Component;

class GoogleMap extends Component
{
    protected $locationData;

    public function __construct($title = "", $locationData = array())
    {
        parent::__construct();
        $this->metas->_init($locationData);

        $this->template = 'UneakFlatSkinBundle:Block:Component/component_googlemap.html.twig';

    }

    public function _registerAssets()
    {
        $script = array();
        $script["google_map_js"] = new AssetExternalJs("http://maps.google.com/maps/api/js?sensor=false&libraries=places");

        $script["script_google_map"] = new AssetInternalJs("UneakFlatSkinBundle:Block:GoogleMap/googlemap_script.html.twig", null, array('item' => $this));
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
