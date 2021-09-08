<?php

$base64 = $_POST['url'];
// echo $base64;
/**
 * [将Base64图片转换为本地图片并保存]
 * @E-mial wuliqiang_aa@163.com
 * @TIME   2017-04-07
 * @WEB    http://blog.iinu.com.cn
 * @param  [Base64] $base64_image_content [要保存的Base64]
 * @param  [目录] $path [要保存的路径]
 */
// function base64_image_content($base64_image_content,$path){
    //匹配出图片的格式
    if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64, $result)){
        $type = $result[2];
        $new_file = "upload/".date('Ymd',time())."/";
        if(!file_exists($new_file)){
            //检查是否有该文件夹，如果没有就创建，并给予最高权限
            mkdir($new_file, 0700);
        }
        $new_file = $new_file.time().".{$type}";
        if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64)))){
            echo $new_file;
        }else{
            return false;
        }
    }else{
        return false;
    }
// }

// preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64, $result);
// $time = time();
// echo $return;
// exit();
// // $type = $result[2];
// $name = $time.".".$type; 
// $savepath = 'upload/'.$name;
// // file_put_contents($savepath, base64_decode(str_replace($result[1], '', $base64)));   //对图片进行解析并保存
// die();

	// if ((($_FILES["file"]["type"] == "image/gif")
	// 	|| ($_FILES["file"]["type"] == "image/jpeg")
	// 	|| ($_FILES["file"]["type"] == "image/png"))
	// 	&& ($_FILES["file"]["size"] < 2000000)){
	//   	if ($_FILES["file"]["error"] > 0){
	//     	echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
	//     }else{
	// 	    // echo "Upload: " . $_FILES["file"]["name"] . "<br />";
	// 	    // echo "Type: " . $_FILES["file"]["type"] . "<br />";
	// 	    // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
	// 	    // echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

	// 	    // if (file_exists("upload/" . $_FILES["file"]["name"])){
	// 	    //   	echo $_FILES["file"]["name"] . " already exists. ";
	// 	    // }else{
	// 		      move_uploaded_file($_FILES["file"]["tmp_name"],
	// 		      "upload/" . $_FILES["file"]["name"]);
	// 		      echo $_FILES["file"]["name"];
	// 	      	// }
	// 	}
	// }else{
 //  		echo "Invalid file";
 //  	}

  	function resize($src, $width_value=300, $height_value='') {
        $temp = pathinfo($src);

        $filename = $temp['filename'].'_width.jpg';
        $dir = $temp["dirname"];    //文件所在的文件夹     
        $savepath = $dir.'/'.$filename; //缩略图保存路径  

        // $savepath_= $dir.'/'.$filename; 
        // echo $savepath.'<br>'.$savepath_;
        // die();
        // die();
        // echo $savepath;
        // die();
        //获取图片的基本信息     
        
        $info = getimagesize($src);

        $width = $info[0];      //获取图片宽度     
        $height = $info[1];     //获取图片高度 
        
        $rate = $width_value/$info[0]; //计算绽放比例
        $height_value = floor($info[1]*$rate);//根據寬度大小，高度等比縮放

        if(($width/$height) >= ($width_value/$height_value)){ //宽度优先
            $w_mid = $width_value;                        //压缩后图片的宽度
            $h_mid = intval($width_value * $height/$width);//等比缩放图片高度       
            $mid_x = 0;
            $mid_y = intval(($height_value-$h_mid)/2);
        }else{                                          //高度优先
            $w_mid = intval($height_value * $width/$height);                            //压缩后图片的宽度
            $h_mid = $height_value;//等比缩放图片高度               
            $mid_x = intval(($width_value-$w_mid)/2);
            $mid_y = 0;
        }   
     
        $temp_img = imagecreatetruecolor($width_value , $height_value);     //创建画布   
        $white = imagecolorallocate($temp_img, 255, 255, 0);
        imagefill($temp_img, 0, 0, $white);     
        $im = create($src);    
        imagecopyresampled($temp_img, $im, $mid_x, $mid_y, 0, 0, $w_mid, $h_mid, $width, $height);     
        imagejpeg($temp_img,$savepath, 100);
        imagedestroy($im);  
     
        return $savepath;
    }
     
    /**
     * 创建图片，返回资源类型 
     * @param  string $src 图片路径   
     * @return resource $im 返回资源类型   
     */
    function create($src) {
    	ini_set('memory_limit','256M');
        $info = getimagesize($src);
        switch ($info[2]) {
            case 1:
                $im = imagecreatefromgif($src);
                break;
            case 2:
                $im = imagecreatefromjpeg($src);
                break;
            case 3:
                $im = imagecreatefrompng($src);
                break;
        }
        return $im;
    }
?>