<?php
/**
* Podcast Manager for Joomla!
*
* @version		$Id$
* @copyright	Copyright (C) 2011 Michael Babker. All rights reserved.
* @license		GNU/GPL - http://www.gnu.org/copyleft/gpl.html
* 
*/

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controller');

/**
 * Podcast Media Manager Component Controller
 *
 * @package		Podcast Manager
 * @subpackage	com_podcastmedia
 * @version		1.6
 */
class PodcastMediaController extends JController
{
	/**
	 * Method to display a view.
	 *
	 * @param	boolean			If true, the view output will be cached
	 * @param	array			An array of safe url parameters and their variable types, for valid values see {@link JFilterInput::clean()}.
	 *
	 * @return	JController		This object to support chaining.
	 * @since	1.6
	 */
	public function display($cachable = false, $urlparams = false)
	{
		JPluginHelper::importPlugin('content');
		$vName = JRequest::getCmd('view', 'media');
		switch ($vName)
		{
			case 'audio':
				$vLayout = JRequest::getCmd('layout', 'default');
				$mName = 'manager';

				break;

			case 'audioList':
				$mName = 'list';
				$vLayout = JRequest::getCmd('layout', 'default');

				break;

			case 'mediaList':
				$app	= JFactory::getApplication();
				$mName = 'list';
				$vLayout = $app->getUserStateFromRequest('podcastmedia.list.layout', 'layout', 'thumbs', 'word');

				break;

			case 'media':
			default:
				$vName = 'media';
				$vLayout = JRequest::getCmd('layout', 'default');
				$mName = 'manager';
				break;
		}

		$document = JFactory::getDocument();
		$vType		= $document->getType();

		// Get/Create the view
		$view = $this->getView($vName, $vType);

		// Get/Create the model
		if ($model = $this->getModel($mName)) {
			// Push the model into the view (as default)
			$view->setModel($model, true);
		}

		// Set the layout
		$view->setLayout($vLayout);

		// Display the view
		$view->display();

		return $this;
	}

	function ftpValidate()
	{
		// Set FTP credentials, if given
		jimport('joomla.client.helper');
		JClientHelper::setCredentialsFromRequest('ftp');
	}
}
