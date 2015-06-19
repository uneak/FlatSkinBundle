<?php

	namespace Uneak\FlatSkinBundle\Controller;

	use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Symfony\Component\HttpFoundation\JsonResponse;
	use Uneak\FlatSkinBundle\Service\UploadHandler;

	class FilePickerController extends Controller {
		/**
		 * @Route("/_file-picker-upload", name="file_picker_upload")
		 */
		public function uploadAction() {


//			$cacheFileSystem = $this->get('cache_filesystem');
//			ld($cacheFileSystem->listContents());
//
//			$tempFileSystem = $this->get('temp_filesystem');
//			ld($tempFileSystem->listContents());
//
//			$uploadsFileSystem = $this->get('uploads_filesystem');
//			ldd($uploadsFileSystem->listContents());



			$options = array(
				'upload_dir' => dirname($_SERVER['SCRIPT_FILENAME']) . '/uploads/',
				'param_name' => "userbundle_user_imageFile"
			);

			$uploadHandler = new UploadHandler($options);

			return new JsonResponse($uploadHandler->get_response());

		}
	}
