<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @package   EuF-Overlay
 * @author    Sebastian Buck
 * @license   LGPL
 * @copyright Erdmann & Freunde
 */


/**
 * Namespace
 */
namespace EuF_Overlay;


/**
 * Class ModuleOverlay
 *
 * @copyright  Erdmann & Freunde
 * @author     Sebastian Buck
 * @package    Devtools
 */
class ModuleOverlay extends \Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_overlay';


	/**
	 * Generate the module
	 */
	protected function compile()
	{

		// jQuery einbinden zum einblenden und schließen des Overlays
		switch ($this->overlay_loadingTime) {
			case 'onLeave':
				$GLOBALS['TL_BODY'][] = '<script src="system/modules/euf_overlay/assets/js/overlay_showOnExit.js"></script>';
				break;
			case 'onLoad':
				$GLOBALS['TL_BODY'][] = '<script src="system/modules/euf_overlay/assets/js/overlay_showOnPageLoad.js"></script>"';
				break;
			case 'afterTime':
				$GLOBALS['TL_BODY'][] = '<script src="system/modules/euf_overlay/assets/js/overlay_showAfterTime.js"></script>"';
				$this->Template->data_delay = $this->overlay_delay;
				break;
      case 'afterScroll':
				$GLOBALS['TL_BODY'][] = '<script src="system/modules/euf_overlay/assets/js/overlay_showAfterScroll.js"></script>"';
				$this->Template->data_percent = $this->overlay_percent;
				break;
		}

		$this->Template->data_expires = $this->overlay_cookie_expires;


	}
}
