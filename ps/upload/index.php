
<script src="../js/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="css/uploadify.css">



	<h2>Select Files</h2>
	<form>
		<div id="queue"></div>
		<input id="file_upload" name="file_upload" type="file" multiple="true">
		
	</form>

	<script type="text/javascript">
		<?php $timestamp = time();
		?>


		$(function() {
			
			$('#file_upload').uploadify({
				'formData'     : {
					'timestamp' : '<?php echo $timestamp;?>',
					'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
				},
				'swf'      : 'upload/uploadify.swf',
				'uploader' : 'upload/uploadify.php',
				'uploadLimit': 5,
				'onUploadSuccess' : function  (file,data,response) {
					alert(file+' ' +data);
					// body...
				}
			});
		});

		
	</script>
