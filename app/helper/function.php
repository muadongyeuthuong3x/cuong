<?php
function ShowErrors($errors, $name){
if($errors->has($name))
   return '
    <div class="alert alert-warning mt-4" role="alert">
        <strong>'.$errors->first($name).'</strong>
    </div>
 ';
}


