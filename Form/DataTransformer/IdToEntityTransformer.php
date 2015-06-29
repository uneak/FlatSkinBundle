<?php

	namespace Uneak\FlatSkinBundle\Form\DataTransformer;


	use Symfony\Component\Form\DataTransformerInterface;


	class IdToEntityTransformer implements DataTransformerInterface {


        protected $em;
        protected $class;


        public function __construct($em, $class) {
            $this->em = $em;
            $this->class = $class;
        }

		public function reverseTransform($entity) {
            if($entity == null) {
                return null;
            }

            return $entity->getId();
		}

		public function transform($id) {

            if(!$id) {
                return null;
            }
            $entity = $this->em->getRepository($this->class)->find($id);
            if($entity == null) {
                return null;
            }

            return $entity;
		}
	}