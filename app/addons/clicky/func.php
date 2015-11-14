<?php
/**
 * HELOstore
 *
 * This source file is part of a commercial software. Only users who have purchased a valid license through
 * https://helostore.com/ and accepted to the terms of the License Agreement can install this product.
 *
 * @category   Add-ons
 * @package    HELOstore
 * @copyright  Copyright (c) 2015-2016 HELOstore. (https://helostore.com/)
 * @license    https://helostore.com/legal/license-agreement/   License Agreement
 * @version    $Id$
 */

use Tygh\Registry;
use Tygh\Storage;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

/**
 * @param $status
 *
 * @return bool
 */
function fn_clicky_hint($status)
{
    $status = strtolower($status);
    $titleKey = 'auto_image_hint_title_' . $status;
    $messageKey = 'auto_image_hint_message_' . $status;

    $redirectUrl = urldecode('addons.manage');
    $message = __($messageKey);
    $message = str_replace('[link]', fn_url('storage.clear_thumbnails?redirect_url=' . $redirectUrl), $message);
    fn_set_notification('N', __($titleKey), $message, 'K');

	return true;
}
function fn_clicky_uninstall()
{
	fn_clicky_hint('D');
	if (class_exists('\HeloStore\ADLS\LicenseClient', true)) {
		\HeloStore\ADLS\LicenseClient::process(\HeloStore\ADLS\LicenseClient::CONTEXT_UNINSTALL);
	}
}
function fn_clicky_install()
{
	if (class_exists('\HeloStore\ADLS\LicenseClient', true)) {
		\HeloStore\ADLS\LicenseClient::process(\HeloStore\ADLS\LicenseClient::CONTEXT_INSTALL);
	}
}