<?php

	namespace Uneak\FlatSkinBundle\Controller;

	use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Symfony\Component\HttpFoundation\JsonResponse;
	use Symfony\Component\HttpFoundation\Request;
	use Symfony\Component\HttpFoundation\Response;
	use Uneak\FlatSkinBundle\Service\UploadHandler;

	class FilePickerController extends Controller {
		/**
		 * @Route("/_file-picker-upload", name="file_picker_upload")
		 */
		public function uploadAction(Request $request) {

//			$files = $request->files->all();


//			foreach ($files as $key => $file) {
//				var_dump($key, $file);
//			}

//			$request->files->get('userbundle_user_imageFile');


//			return new Response();
			

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
