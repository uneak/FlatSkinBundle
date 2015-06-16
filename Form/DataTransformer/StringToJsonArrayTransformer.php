<?php

	namespace Uneak\FlatSkinBundle\Form\DataTransformer;


	use Symfony\Component\Form\DataTransformerInterface;
	use Symfony\Component\Serializer\Encoder\JsonEncoder;


	class StringToJsonArrayTransformer implements DataTransformerInterface {


		//transform submitted data into Array
		public function reverseTransform($string) {
			return json_decode($string);
		}

		// transform Array to String
		public function transform($array) {
//			ld("transform");
//			ld(json_encode($array));
			return json_encode($array);
		}
	}