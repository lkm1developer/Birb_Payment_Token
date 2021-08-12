<?php

?>


<div id="custom_input" id="custome_method">
	
</div>

<script>
jQuery('#sender_add').keyup(function(e) {
	var mobile_num = 121212121212;
	if(e.keyCode){
		jQuery.ajax({
          type:"POST",
           url:"<?php echo admin_url('admin-ajax.php'); ?>",
          data: {
            action: "checkPayment",
            mobile_num : mobile_num
          },
          success: function(results){
          },
          error: function(results) {
          }
        });	
	}else{
		console.log('wwww');
	}  
});
</script>