<style>
    span {
        font-size: 20px
    }
    .succese {
        background-color: green;
        color: whitesmoke;
    }
    .fail {
        background-color: red;
        color: whitesmoke;
    }
    .notice {
        background-color: yellow;
        color: whitesmoke;
    }
</style>

<?php $message = $this->getMessage(); ?>

<?php
    if($message):

    foreach($message as $key => $value): 
?>
    <div>
        <span class="<?php echo $key; ?>"><?php echo $value; ?></span>
    </div>
<?php 
    endforeach; 
    endif;    
?>

