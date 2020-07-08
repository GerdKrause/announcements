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
namespace pcsg\announcements\core;

class Events {
    public static function addPopForFlow(){
        $oConfig = oxNew('oxRegistry')::getConfig();
        $sqlFile = $oConfig->getModulesDir().'pcsg/announcements/core/oxcontents.sql';
        $sSql = file_get_contents($sqlFile);
        oxNew('oxDb')::getDb()->execute($sSql);
    }
    public static function rmPopForFlow(){
        $sSql = "DELETE FROM `oxcontents` WHERE `OXID` IN ('announcements')";
        oxNew('oxDb')::getDb()->execute( $sSql );
    }
    public static function onActivate(){
        self::addPopForFlow();
    }
    public static function onDeactivate(){
        self::rmPopForFlow();
    }
}
