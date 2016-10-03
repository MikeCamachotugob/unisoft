
<script src="../js_script/jquery.min.js"></script> 
<script src="../js_script/moment.min.js"></script> 
<script src="../js_script/moment.js"></script> 
<script src="../js_script/combodate.js"></script> 



<input type="text" id="date" data-format="DD-MM-YYYY" data-template="D MMM YYYY" name="date" value="<?php echo $datekunno; ?>">
<script>
$(function(){
    $('#date').combodate();    
});
</script>