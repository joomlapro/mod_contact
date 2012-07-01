<?php
/**
 * @package     Contact
 * @subpackage  mod_contact
 * @copyright   Copyright (C) 2012 AtomTech, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

/**
 * Contact module helper.
 *
 * @package     Contact
 * @subpackage  mod_contact
 * @since       2.5
 */
class ModContactHelper
{
	/**
	 * Send email.
	 *
	 * @param   JRegistry  &$params  The module options.
	 *
	 * @return  void
	 * 
	 * @since   2.5
	 */
	public static function sendEmail(&$params)
	{
		// Initialiase variables.
		$app = &JFactory::getApplication();

		// Check for request forgeries.
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

		$mailfrom	= $app->getCfg('mailfrom');
		$fromname	= $app->getCfg('fromname');
		$sitename	= $app->getCfg('sitename');

		$name    = JRequest::getVar('name', null, 'POST');
		$email   = JRequest::getVar('email', null, 'POST');
		$subject = JRequest::getVar('subject', null, 'POST');
		$body    = JRequest::getVar('message', JText::_('MOD_CONTACT_MESSAGE_NO'), 'POST');

		// Prepare email body
		$prefix = JText::sprintf('MOD_CONTACT_ENQUIRY_TEXT', JURI::base());
		$body	= $prefix . "\n" . $name . ' <' . $email . '>' . "\r\n\r\n" . stripslashes($body);

		$mail = JFactory::getMailer();
		$mail->addRecipient($mailfrom);
		$mail->addReplyTo(array($email, $name));
		$mail->setSender(array($mailfrom, $fromname));
		$mail->setSubject($sitename . ': ' . $subject);
		$mail->setBody($body);
		$sent = $mail->Send();

		return $sent;
	}
}
