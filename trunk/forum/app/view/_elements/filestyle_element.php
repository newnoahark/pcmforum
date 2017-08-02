<div class="fileupload" >
	<style type="text/css">
		.fileupload input{
			margin-top: 10px;
			margin-right: 10px;
		}
	</style>

	<form action="<?php echo url("file/filestylesave");  ?>" method="post" enctype="multipart/form-data">
		<label for="file_name">filename</label>
		<input  class='file_name' type="text" name="file_name" id="file_name"><br>
		<label for="file_type">file_type</label>
			图片<input  class='file_type' type="radio" name="file_type" id="file_type" value="图片" onclick="filetype(this)">
			文本<input  class='file_type' type="radio" name="file_type"  value="文本" onclick="filetype(this)">
			视频<input  class='file_type' type="radio" name="file_type"  value="视频" onclick="filetype(this)">
		<br>
		<label for="limit_format">limit_format</label>
		<input  class='limit_format' type="text" name="limit_format" id="limit_format" value=""><br>			
		<br>
		<label for="limit_sizetxt">limit_size</label>
		<input  class='limit_sizetxt' type="text" name="limit_size" id="limit_sizetxt" min="1" max="1024" value=" ">
		<input  class='limit_sizerange' type="range"  id="limit_sizerange" min="1" max="1024" value="" onchange="rangeslide(this.value)">
		<br>
			<label for="complete_code">complete_code</label>
			<textarea id="complete_code" style="height: 100px;width: 400px;resize: none;" name= "complete_code"><form action="upload_file.php" method="post"  ><label for="file">Filename:</label><input type="file" name="file" id="file" /> <br /><input type="submit" name="submit" value="Submit" /></form>
			</textarea>
		<br>
		<label for="status">status</label>
			禁用<input  class='status' type="radio" name="status" id="file_type" value="0" >
			可用<input  class='status' type="radio" name="status"  value="1" >
		<br>		
		<input type="submit" name="upload" value="upload">
	</form>
<script type="text/javascript">
		function  filetype(e) {
		
			switch(e.value) {
				case '图片' :					
					var filetypelimit = new Array("bmp","jpg","png","tiff","gif");
					break;
				case "文本" :
					var filetypelimit = new Array("doc", "docx","pdf","pdf","xls");
					break;
				case "视频" :
					var filetypelimit = new Array("avi","rm");
					break;
			} 			
			document.getElementById("limit_format").value = filetypelimit;
	     	}
	     	function rangeslide(e) {
	     		
	    	document.getElementById("limit_sizetxt").value = e+"k";	

	     	}
</script>

</div>
