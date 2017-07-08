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



 /*
  * Palettes
  */
 $GLOBALS['TL_DCA']['tl_module']['palettes']['euf_overlay'] = '
    {title_legend},name,headline,type;
    {overlay_richtext_legend},overlay_richtext;
    {overlay_html_legend:hide},overlay_html;
    {overlay_settings_legend},overlay_loadingTime,overlay_cookie_expires;
    {expert_legend:hide},cssID
    ';

  /*
   * Selectors
   */
   $GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'overlay_loadingTime';



  /*
   * Subpalettes
   */
   $GLOBALS['TL_DCA']['tl_module']['subpalettes']['overlay_loadingTime_afterTime'] = 'overlay_delay';

 /*
  * Fields
  */
$GLOBALS['TL_DCA']['tl_module']['fields']['overlay_richtext'] = array (
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['overlay_richtext'],
    'exclude'                 => true,
    'search'                  => true,
    'inputType'               => 'textarea',
    'eval'                    => array('rte'=>'tinyMCE', 'helpwizard'=>true),
    'explanation'             => 'insertTags',
    'sql'                     => "mediumtext NULL"
  );

$GLOBALS['TL_DCA']['tl_module']['fields']['overlay_html'] = array (
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['overlay_html'],
    'exclude'                 => true,
    'search'                  => true,
    'inputType'               => 'textarea',
    'eval'                    => array('allowHtml'=>true, 'class'=>'monospace', 'rte'=>'ace|html', 'helpwizard'=>true),
    'explanation'             => 'insertTags',
    'sql'                     => "text NULL"
  );

$GLOBALS['TL_DCA']['tl_module']['fields']['overlay_loadingTime'] = array (
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['overlay_loadingTime'],
    'default'                 => 'onLeave',
    'exclude'                 => true,
    'inputType'               => 'radio',
    'options'                 => array('onLeave', 'onLoad', 'afterTime'),
    'eval'                    => array('tl_class'=>'w50 autoheight', 'mandatory'=>true, 'submitOnChange'=>true),
    'reference'               => &$GLOBALS['TL_LANG']['MSC'],
    'sql'                     => "varchar(10) NOT NULL default ''"
  );

$GLOBALS['TL_DCA']['tl_module']['fields']['overlay_delay'] = array (
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['overlay_delay'],
    'default'                 => 120,
    'exclude'                 => true,
    'inputType'               => 'text',
    'eval'                    => array('rgxp'=>'natural', 'mandatory'=>true, 'tl_class'=>'w50'),
    'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
  );


  $GLOBALS['TL_DCA']['tl_module']['fields']['overlay_cookie_expires'] = array (
      'label'                   => &$GLOBALS['TL_LANG']['tl_module']['overlay_cookie_expires'],
      'default'                 => 30,
      'exclude'                 => true,
      'inputType'               => 'text',
      'eval'                    => array('rgxp'=>'natural', 'mandatory'=>true, 'tl_class'=>'w50 clr'),
      'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
    );
