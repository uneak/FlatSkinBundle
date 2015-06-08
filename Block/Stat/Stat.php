<?php

namespace Uneak\FlatSkinBundle\Block\Stat;

use Uneak\AdminBundle\Block\Block;

class Stat extends Block {

    protected $complete;
    protected $context;
    protected $color;
    protected $backgroundColor;

    public function __construct() {
        $this->template = 'UneakFlatSkinBundle:Block:Stat/block_stat_bar.html.twig';
    }


    public function getComplete() {
        return $this->complete;
    }

	public function setComplete($complete) {
		$this->complete = $complete;
		return $this;
	}

	public function getBackgroundColor() {
		return $this->backgroundColor;
	}

	public function setBackgroundColor($color) {
		$this->backgroundColor = $color;
		return $this;
	}

	public function getColor() {
		return $this->color;
	}

	public function setColor($color) {
		$this->color = $color;
		return $this;
	}


    public function getContext() {
        return $this->context;
    }

    public function setContext($context) {
        $this->context = $context;
        return $this;
    }

}
