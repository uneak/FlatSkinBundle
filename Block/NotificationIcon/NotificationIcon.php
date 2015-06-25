<?php

namespace Uneak\FlatSkinBundle\Block\NotificationIcon;

use Uneak\BlocksManagerBundle\Blocks\BlockInterface;
use Uneak\FlatSkinBundle\Block\Info\Info;

class NotificationIcon extends Info {

    protected $badge;

    public function __construct() {
        parent::__construct();
        $this->template = 'UneakFlatSkinBundle:Block:NotificationIcon/block_notification_icon.html.twig';
    }

    public function getBadge() {
        return $this->badge;
    }

    public function setBadge($badge) {
        $this->badge = $badge;
        return $this;
    }

}
