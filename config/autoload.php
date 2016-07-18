<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'EuF_Overlay',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Modules
	'EuF_Overlay\ModuleOverlay' => 'system/modules/euf_overlay/modules/ModuleOverlay.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_overlay' => 'system/modules/euf_overlay/templates',
));
