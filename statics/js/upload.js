function Upload(fileForm){
  var form_data = new FormData();
  const LENGTH = 1024 * 1024;
  var start = 0;
  var end = start + LENGTH;
  var blob;
  var blob_num = 1;
  //传入文件对象
  fileForm.onchange = function(){
	var file = that.files[0];
	sendFile(file);
  }
  //切割文件
  function cutFile(file){
   var file_blob = file.slice(start,end);
   start = end;
   end = start + LENGTH;
   return file_blob;
  };
  //发送文件
  function sendFile(file){
   var total_blob_num = Math.ceil(file.size / LENGTH);
   var t = setTimeout(function(){
      blob = cutFile(file);
	  if(blob.size>0){
		form_data.append('file',blob);
		form_data.append('blob_num',blob_num);
		form_data.append('total_blob_num',total_blob_num);
		form_data.append('file_name',file.name);
		$.ajax({
			url: 'upload.php',
			type: 'POST',
			cache: false,
			data: form_data,
			processData: false,
			contentType: false,
			dataType:"json",
			beforeSend: function(){
				uploading = true;
			},
			success : function(data) {
				if(data.code==1){
					var progress;
					if(total_blob_num == 1){
					  progress = '100%';
					}else{
					  progress = Math.min(100,(blob_num/total_blob_num)* 100 ) +'%';
					}
					sendFile(file);
					blob_num += 1;
				}
			}
		});
	  } else {
		  clearTimeout(t);
	  }
   },2000);
  }
 }