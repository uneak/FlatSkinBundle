<?php

namespace Uneak\FlatSkinBundle\Block\NotificationIcon;

use Uneak\BlocksManagerBundle\Blocks\Block;

class NotificationIcons extends Block {

    public function __construct() {
        parent::__construct();
        $this->template = "UneakFlatSkinBundle:Block:NotificationIcon/block_notification_icons.html.twig";
    }

}
