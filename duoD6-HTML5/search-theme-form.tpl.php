<?php

?>
<div id="search">
    <form action="/" accept-charset="UTF-8" method="post" id="search-form">
        <label for="search-box" class="search-label">Search</label>
        <input type="text" maxlength="128" name="search_theme_form" id="search-box" size="15" value="" title="Search" class="form-text">
        <input type="submit" name="op" id="submit" value="GO" class="form-submit">
        <?php print $search['hidden']; ?>
    </form>
</div>
<!-- /search -->