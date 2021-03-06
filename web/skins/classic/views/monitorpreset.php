<?php
//
// ZoneMinder web monitor preset view file, $Date$, $Revision$
// Copyright (C) 2001-2008 Philip Coombes
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with this program; if not, write to the Free Software
// Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
//

if ( !canEdit( 'Monitors' ) )
{
    $view = "error";
    return;
}
$sql = "select Id,Name from MonitorPresets";
$presets = array();
$presets[0] = $SLANG['ChoosePreset'];
foreach( dbFetchAll( $sql ) as $preset )
{
    $presets[$preset['Id']] = htmlentities( $preset['Name'] );
}

$focusWindow = true;

xhtmlHeaders(__FILE__, $SLANG['MonitorPreset'] );
?>
<body>
  <div id="page">
    <div id="header">
      <h2><?php echo $SLANG['MonitorPreset'] ?></h2>
    </div>
    <div id="content">
      <form name="contentForm" id="contentForm" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input type="hidden" name="view" value="none"/>
        <input type="hidden" name="mid" value="<?php echo validNum($_REQUEST['mid']) ?>"/>
        <p>
          <?php echo $SLANG['MonitorPresetIntro'] ?>
        </p>
        <p>
          <label for="preset"><?php echo $SLANG['Preset'] ?></label><?php echo buildSelect( "preset", $presets, 'configureButtons( this )' ); ?>
        </p>
        <div id="contentButtons">
          <input type="submit" name="saveBtn" value="<?php echo $SLANG['Save'] ?>" onclick="submitPreset( this )" disabled="disabled"/><input type="button" value="<?php echo $SLANG['Cancel'] ?>" onclick="closeWindow()"/>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
