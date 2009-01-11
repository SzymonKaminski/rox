<?php
$words = new MOD_words();
?>
<h3><?php echo $words->getFormatted('ForumBrowseCategories'); ?></h3>
<select name="board" id="forumsboarddropdown" onchange="window.location.href=this.value;">
    <option value=""><?php echo $words->getFormatted('ForumChooseCategory'); ?></option>
<?php
    foreach ($topboards as $topboard) {
        $url = 'forums/t'. $topboard->tagid.'-'.$topboard->tag;
        ?>
            <option value="<?php echo $url; ?>"><?php echo $topboard->tag; ?></option>
        <?php
        /*if ($board->hasSubBoards()) {
            foreach ($board as $b) {
                echo '<a href="'.$uri.$b->getBoardLink().'">'.$b->getBoardName().'</a>';
                echo '<br />';
            }
        }*/
    }
?>
</select>

<h3><?php echo $words->getFormatted('Actions'); ?></h3>
<ul class="linklist">
<?php 
//	        echo "<li class=\"icon fam_commentadd\"><a href=\"forums/new\"" ;
    $request = PRequest::get()->request;
    $uri = implode('/', $request);
    $uri = rtrim($uri, '/').'/';
?>
    <li class="icon fam_commentadd">
        <a href="<?php echo $uri,'new'; ?>"><?php echo $words->getBuffered('ForumNewTopic'); ?></a><?php echo $words->flushBuffer(); ?>
    </li>
    <li><a href="forums/rules"><?php echo $words->get('ForumRulesShort'); ?></a></li>
    <li><a href="http://www.bevolunteer.org/wiki/forumdoc"><?php echo $words->get('ForumLinkToDoc'); ?></a></li>
<?php  if (isset($_SESSION["IdMember"])) echo "<li><a href=\"forums/subscriptions\">",$words->get('forum_YourSubscription'),"</a></li>"; ?>
</ul>
