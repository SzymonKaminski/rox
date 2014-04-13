<?php
/*

Copyright (c) 2007-2014 BeVolunteer

This file is part of BW Rox.

BW Rox is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

BW Rox is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, see <http://www.gnu.org/licenses/> or 
write to the Free Software Foundation, Inc., 59 Temple Place - Suite 330, 
Boston, MA  02111-1307, USA.

*/
$vars = $this->getRedirectedMem('vars');
if ($vars) {
    // overwrite the vars
    $this->vars = $vars;
}
$errors = $this->getRedirectedMem('errors');
if ($errors) {
    echo '<div class="error">';
    foreach($errors as $error) {
        echo '<p>' . $this->words->get($error) . '<p>';
    }
    echo '</div>';
}
$callbackTags = $this->layoutkit->formkit->setPostCallback('AdminRightsController', 'removeCallback');
?>
<form class="yform" method="post">
    <?= $callbackTags ?>
    <input type="button" id="redirect" name="redirect" value="<?= $this->vars['redirect'] ?>"/>
    <div class="type-text">
        <label for="username"><?php echo $this->words->get("AdminRightsUserName")?></label>
        <input type="text" id="username" name="username" disabled="disabled" value="<?= $this->vars['username'] ?>"/>
    </div>
    <div class="type-select">
        <label for="right"><?php echo $words->get("AdminRightsRights")?></label>
        <?= $this->rightsSelect($this->rights, $this->vars['right'], true) ?>
    </div>
    <div class="type-select">
        <label for="level"><?php echo $words->get("AdminRightsLevel") ?></label>
        <?= $this->levelSelect($this->vars['level'], true) ?>
    </div>
    <div class="type-text">
        <label for="scope"><?php echo $this->words->get("AdminRightsScope") ?></label>
        <input type="text" id="scope" name="scope" disabled="disabled" value="<?= htmlentities($this->vars['scope'], ENT_COMPAT, 'utf-8') ?>"/>
    </div>
    <div class="type-button">
        <input type="submit" id="AdminRightsRemove" name="AdminRightsRemove" value="<?php echo $this->words->getSilent("AdminRightsRemove")?>" /><?php echo $words->flushBuffer(); ?>
    </div>
</form>