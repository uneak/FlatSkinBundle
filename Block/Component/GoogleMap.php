<?php

namespace Uneak\FlatSkinBundle\Block\Component;

use Uneak\AssetsManagerBundle\Assets\Js\AssetExternalJs;
use Uneak\AssetsManagerBundle\Assets\Js\AssetInternalJs;
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


	public function buildAsset(AssetBuilder $builder, $parameters) {

		$builder
			->add("google_map_js", new AssetExternalJs(), array(
				"src" => "http://maps.google.com/maps/api/js?sensor=false&libraries=places"
			))
			->add("script_google_map", new AssetInternalJs(), array(
				"src" => "UneakFlatSkinBundle:Block:GoogleMap/googlemap_script.html.twig",
				"parameters" => array('item' => $parameters)
			));

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
