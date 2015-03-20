<?php
/**
* @package			DigiCom Joomla Extension
 * @author			themexpert.com
 * @version			$Revision: 341 $
 * @lastmodified	$LastChangedDate: 2013-10-10 14:28:28 +0200 (Thu, 10 Oct 2013) $
 * @copyright		Copyright (C) 2013 themexpert.com. All rights reserved.
* @license			GNU/GPLv3
*/

defined ('_JEXEC') or die ("Go away.");


class DigiComViewDownloads extends JViewLegacy {

	function display($tpl = null)
	{
		
		$customer = new DigiComSiteHelperSession();
		$app = JFactory::getApplication();
		$input = $app->input;
		$Itemid = $input->get("Itemid", 0);
		if($customer->_user->id < 1)
		{
			$app->Redirect(JRoute::_('index.php?option=com_digicom&view=login&returnpage=downloads&Itemid='.$Itemid, false));
			return true;
		}

		$mainframe=JFactory::getApplication();
		$Itemid = JRequest::getInt("Itemid", 0);
		$products = $this->get('listDownloads');
		
		$this->assign("products", $products);

		$template = new DigiComSiteHelperTemplate($this);
		$template->rander('downloads');
		
		parent::display($tpl);
	}

	
}
