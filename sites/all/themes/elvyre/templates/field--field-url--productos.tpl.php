<?php
foreach($items as $i):
    ?><li><a href="<?php print $i['#href']?>"><?php print $i['#title']?></a></li><?php
endforeach;
