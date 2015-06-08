<?php

namespace Uneak\FlatSkinBundle\Block\NotificationIcon;

use Uneak\AdminBundle\Block\BlockContainer;

class NotificationIcons extends BlockContainer {

    public function __construct() {
        parent::__construct();
        $this->template = "UneakFlatSkinBundle:Block:NotificationIcon/block_notification_icons.html.twig";
    }

}
