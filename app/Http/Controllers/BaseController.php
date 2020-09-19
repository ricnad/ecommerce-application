<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\FlashMessages;

class BaseController extends Controller
{
    use FlashMessages;
    protected $data = null;

	/**
	 * @param $title
	 * @param $subTitle
	 */
	protected function setPageTitle($title, $subTitle)
	{
	    view()->share(['pageTitle' => $title, 'subTitle' => $subTitle]);
	}

	/**
	 * @param int $errorCode
	 * @param null $message
	 * @return \Illuminate\Http\Response
	 */
	protected function showErrorPage($errorCode = 404, $message = null)
	{
	    $data['message'] = $message;
	    return response()->view('errors.'.$errorCode, $data, $errorCode);
	}
}