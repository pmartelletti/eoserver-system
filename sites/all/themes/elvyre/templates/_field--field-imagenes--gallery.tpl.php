<?php
$a = 0;
die('a');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php foreach($items as $index=> $item):?>
<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
    <div class="flipper">
        <div class="front">
            <!-- front content -->
        </div>
        <div class="back">
            <!-- back content -->
        </div>
    </div>
</div>
<?php endforeach;?>