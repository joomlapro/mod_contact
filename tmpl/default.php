<?php
/**
 * @package		Contact
 * @subpackage	mod_contact
 * @copyright	Copyright (C) AtomTech, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

// Load the tooltip behavior.
JHtml::_('behavior.formvalidation');
?>
<div class="contact<?php echo $moduleclass_sfx ?>">
	<?php if ($introtext) : ?>
	<p><?php echo $introtext; ?></p>
	<?php endif ?>
	<form action="<?php echo JURI::getInstance()->toString() ?>" id="contact-form" class="form-validate" method="post">
		<input name="name" class="required" type="text" value="<?php echo JText::_('MOD_CONTACT_NAME') ?>" onfocus="if(this.value == '<?php echo JText::_('MOD_CONTACT_NAME') ?>') {this.value = '';}" onblur="if(this.value == '') {this.value = '<?php echo JText::_('MOD_CONTACT_NAME') ?>';}" />
		<input name="email" class="required validate-email" type="text" value="<?php echo JText::_('MOD_CONTACT_EMAIL') ?>" onfocus="if(this.value == '<?php echo JText::_('MOD_CONTACT_EMAIL') ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php echo JText::_('MOD_CONTACT_EMAIL') ?>';}" />
		<input name="subject" class="required" type="text" value="<?php echo JText::_('MOD_CONTACT_SUBJECT') ?>" onfocus="if(this.value == '<?php echo JText::_('MOD_CONTACT_SUBJECT') ?>') {this.value = '';}" onblur="if(this.value == '') {this.value = '<?php echo JText::_('MOD_CONTACT_SUBJECT') ?>';}" />
		<textarea name="message" onfocus="if(this.value == '<?php echo JText::_('MOD_CONTACT_MESSAGE') ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php echo JText::_('MOD_CONTACT_MESSAGE') ?>';}"><?php echo JText::_('MOD_CONTACT_MESSAGE') ?></textarea>
		<input class="button validate" type="submit" value="<?php echo JText::_('MOD_CONTACT_SEND') ?>"/>
		<input type="hidden" name="action" value="send" />
		<?php echo JHtml::_( 'form.token' ); ?>
	</form>
</div>
