<?php

namespace Uneak\FlatSkinBundle\Block\Search;

use Uneak\AdminBundle\Block\Block;

class Search extends Block {

    protected $title = "Search";

    public function __construct() {
        $this->template = 'UneakFlatSkinBundle:Block:Search/block_search.html.twig';
    }


}
