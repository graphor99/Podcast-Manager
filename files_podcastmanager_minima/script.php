<?php
/**
* Podcast Manager for Joomla!
*
* @copyright	Copyright (C) 2011 Michael Babker. All rights reserved.
* @license		GNU/GPL - http://www.gnu.org/copyleft/gpl.html
*
* Podcast Manager is based upon the ideas found in Podcast Suite created by Joe LeBlanc
* Original copyright (c) 2005 - 2008 Joseph L. LeBlanc and released under the GPLv2 license
*/

/**
 * Installation class to perform additional changes during install/uninstall/update
 *
 * @since	1.8
 */
class files_PodcastManager_MinimaInstallerScript {

	/**
	 * Function to act prior to installation process begins
	 *
	 * @param	string	$type	The action being performed
	 * @param	string	$parent	The function calling this method
	 *
	 * @return	void
	 * @since	1.8
	 */
	function preflight($type, $parent) {
		// Check if the Minima template is installed
		if (!JFolder::exists(JPATH_BASE.'/templates/minima')) {
			JError::raiseNotice(null, 'You do not have the Minima administrator template installed.  Please install it before installing this override package.');
			return false;
		}

		// Check if Podcast Manager is installed
		if (!JFolder::exists(JPATH_BASE.'/components/com_podcastmanager')) {
			JError::raiseNotice(null, 'You do not have Podcast Manager installed.  Please install it before installing this override package.');
			return false;
		}
	}
}