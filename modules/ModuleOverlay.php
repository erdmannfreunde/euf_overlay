<?php

/**
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
 */
class ModuleOverlay extends \Module
{

  /**
   * Template
   */
  protected $strTemplate = 'mod_overlay';

  /**
   * Display a wildcard in the back end
   */
  public function generate()
  {
    if (TL_MODE == 'BE')
    {
      $objTemplate = new \BackendTemplate('be_wildcard');

      $objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['euf_overlay'][0]) . ' ###';
      $objTemplate->id = $this->id;
      $objTemplate->link = $this->name;
      $objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

      return $objTemplate->parse();
    }

    if(TL_MODE == 'FE')
    {
      $GLOBALS['TL_CSS'][] = 'system/modules/euf_overlay/assets/css/overlay_default.css|static';
    }

    return parent::generate();
  }


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
        $GLOBALS['TL_BODY'][] = '<script src="system/modules/euf_overlay/assets/js/overlay_showOnPageLoad.js"></script>';
        break;
      case 'afterTime':
        $GLOBALS['TL_BODY'][] = '<script src="system/modules/euf_overlay/assets/js/overlay_showAfterTime.js"></script>';
        $this->Template->data_delay = $this->overlay_delay;
        break;
      case 'afterScroll':
        $GLOBALS['TL_BODY'][] = '<script src="system/modules/euf_overlay/assets/js/overlay_showAfterScroll.js"></script>';
        $this->Template->data_percent = $this->overlay_percent;
        break;
    }

    $this->Template->data_expires = $this->overlay_cookie_expires;

  }
}
