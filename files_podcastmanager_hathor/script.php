<?php
/**
 * Podcast Manager for Joomla!
 *
 * @package     PodcastManager
 * @subpackage  files_podcastmanager_hathor
 *
 * @copyright   Copyright (C) 2011-2013 Michael Babker. All rights reserved.
 * @license     GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 *
 * Podcast Manager is based upon the ideas found in Podcast Suite created by Joe LeBlanc
 * Original copyright (c) 2005 - 2008 Joseph L. LeBlanc and released under the GPLv2 license
 */

/**
 * Installation class to perform additional changes during install/uninstall/update
 *
 * @package     PodcastManager
 * @subpackage  files_podcastmanager_hathor
 * @since       1.8
 */
class Files_PodcastManager_HathorInstallerScript
{
	/**
	 * Function to act prior to installation process begins
	 *
	 * @param   string          $type    The action being performed
	 * @param   JInstallerFile  $parent  The class calling this method
	 *
	 * @return  mixed  Boolean false on failure, void otherwise
	 *
	 * @since   1.8
	 */
	public function preflight($type, $parent)
	{
		// Check if the Hathor template is installed
		if (!is_dir(JPATH_BASE . '/templates/hathor'))
		{
			JError::raiseNotice(null, JText::_('FILES_PODCASTMANAGER_HATHOR_ERROR_TEMPLATE'));
			return false;
		}

		// Check if Podcast Manager is installed
		if (!is_dir(JPATH_BASE . '/components/com_podcastmanager'))
		{
			JError::raiseNotice(null, JText::_('FILES_PODCASTMANAGER_HATHOR_ERROR_COMPONENT'));
			return false;
		}

		return true;
	}
}
