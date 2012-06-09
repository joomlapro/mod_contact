<?php
/**
 * @package		Contact
 * @subpackage	mod_contact
 * @copyright	Copyright (C) AtomTech, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once dirname(__FILE__).'/helper.php';

$app = &JFactory::getApplication();
$action = JRequest::getVar('action', null, 'POST');

if ($action == 'send') {
    modContactHelper::sendEmail($params);
	$app->redirect(JURI::getInstance()->toString());
}

$introtext = $params->get('introtext');
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_contact', $params->get('layout', 'default'));
