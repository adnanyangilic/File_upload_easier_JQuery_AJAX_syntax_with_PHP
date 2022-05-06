<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>How to upload Image file using AJAX and jQuery</title>
    <link href="style.css" rel="stylesheet" type="text/css">
   <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

    <script type="text/javascript">

        $(document).ready(function(){

            $("#but_upload").click(function(){

                var fd = new FormData();

                var files = $('#file')[0].files;

                // Check file selected or not
                if(files.length > 0 ){

                    fd.append('file',files[0]);
					
					
					/* Easier to memorize and remember $.ajax(option); */
                    var options={};
					options.url='upload.php';
					options.type='post';
					options.data=fd;
					options.contentType=false;
					options.processData=false;
					options.success=function(response){
                            if(response != 0){
                                $("#img").attr("src",response);
                                $('.preview img').show();
                            }else{
                                alert('File not uploaded');
                            }
                        };
					$.ajax(options);
					
					
                   /* $.ajax({
                        url:'upload.php',
                        type:'post',
                        data:fd,
                        contentType: false,
                        processData: false,
                        success:function(response){
                            if(response != 0){
                                $("#img").attr("src",response);
                                $('.preview img').show();
                            }else{
                                alert('File not uploaded');
                            }
                        }
                    });  */
					
					
                }else{
                    alert("Please select a file.");
                }
            });
        });


    </script>

</head>
<body>
    <div class="container">
        <form method="post" action="" enctype="multipart/form-data" id="myform">
            <div class='preview'>
                <img src="upload/default.png" id="img" width="100" height="100">
            </div>
            <div >
                <input type="file" id="file" name="file" />
                <input type="button" class="button" value="Upload" id="but_upload">
            </div>
        </form>
    </div>
</body>
</html>