<?php
/**
 * Created by PhpStorm.
 * User: raymund
 * Date: 08.04.14
 * Time: 20:48
 */
$callbackTags = $this->layoutkit->formkit->setPostCallback('AdminRightsController', 'listMembersCallBack');
?>
<div>
    <form class="yform" method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
        <?= $callbackTags ?>
        <div class="type-select">
            <label for="MemberSelect"><?= $words->get("AdminRightsMember") ?></label>
            <?= memberSelect($this->members, $this->member) ?>
        </div>
        <div class="type-button">
            <input type="submit" id="submit" name="submit"
                   value="<?= $words->getSilent("AdminRightsListMembersSubmit") ?>"/><?php echo $words->flushBuffer(); ?>
        </div>
    </form>
    <div style="height:50px">&nbsp;</div>
    <table id="rights" style="width:130%">
        <tr>
            <th class="usercol"><?= $words->get('AdminRightsUsername') ?></th>
            <th class="right"><?= $words->get('AdminRightsRight') ?></th>
            <th class="level"><?= $words->get('AdminRightsLevel') ?></th>
            <th colspan="3" class="scope"><?= $words->get('AdminRightsScope') ?></th>
        </tr>
<?php
    $i = 0;
    foreach($this->membersWithRights as $username => $details) :
    $firstRow = true;
    if ($i % 2 == 0) {
        $class = 'highlight';
    } else {
        $class = 'blank';
    }?>
    <tr class="<?= $class ?>"><td class="usercol" rowspan="<?= count($details->Rights) ?>"><?= $username ?></td>
        <?php foreach($details->Rights as $id => $right) :
            if ($firstRow) :
                $firstRow = false;
            else :
                echo '<tr class="' . $class . '">';
            endif; ?>
        <td class="right"><?= $this->rights[$id]->Name ?></td>
        <td class="level"><?= $right->level ?></td>
        <td class="scope"><?= $right->scope ?></td>
        <td class="icon"><a href="admin/rights/edit/<?= $id ?>/<?= $username ?>">
                <img src="images/icons/comment_edit.png" alt="edit"/></a></td>
        <td class="icon"><a href="admin/rights/remove/<?= $id ?>/<?= $username ?>">
                <img src="images/icons/delete.png" alt="remove"/></a></td>
        </tr>
        <?php
            endforeach;
        $i++;
    endforeach; ?>
    </table>
</div>