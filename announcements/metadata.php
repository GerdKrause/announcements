<?php

// GNU GENERAL PUBLIC LICENSE
//
//This program is free software;
//you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
//either version 3 of the License, or (at your option) any later version.
//
//This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
//without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
// You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>


/**
 * Metadata version
 */

$sMetadataVersion = '2.0';

/**
 * Module information
 */
$aModule = array(
    'id'           => 'announcements',
    'title'        => 'Announcements',
    'description'  => array(
        'de' => 'Modul für Ankündigungen gegenüber Kunden.',
        'en' => 'Module for announcements to customers.',
    ),
    'version'     => '1.0',
    'author'      => 'Gerd Krause',
    'email'       => 'gerd@pcsg.de',
    'extend'      => array(
      'oxviewconfig'     => 'pcsg/announcements/core/pcsg_announcements'
    ),
   'events'           => array(
     'onActivate'       => 'od_flow_pop::onActivate',
     'onDeactivate'     => 'od_flow_pop::onDeactivate'
    ),
    'settings'         => array (
        array (
          'group'            => 'popup',
          'name'             => 'homePop',
          'type'             => 'bool',
          'value'            => 'true'
        ),
        array (
          'group'            => 'popup',
          'name'             => 'openPop',
          'type'             => 'str',
          'value'            => '3000'
        ),
        array (
          'group'            => 'popup',
          'name'             => 'closePop',
          'type'             => 'str',
          'value'            => '3000'
        ),
    ),
    'blocks'  => array(
        array(
          'template'	       => 'layout/footer.tpl',
          'block'		       => 'footer_main',
          'file'		        => 'Application/views/announcements.tpl'
        )
    )
);
