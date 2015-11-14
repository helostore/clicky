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

function fn_clicky_uninstall()
{
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