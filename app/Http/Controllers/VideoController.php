<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use FFMpeg;

class VideoController extends Controller
{
    
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$data = DB::table("tech_videos")->where("user_id",\Auth::user()->id)->paginate(10);
    	return view("videos.list",["data"=>$data]);
    }

    public function add(){
    	return view("videos.add");
    }

    public function save_data(Request $request){
    	//echo "<pre>"; print_r($request->all()); exit;

    	$messages = [
          'title.required' => '*Please enter title',
          'description.required' => '*Please enter vide description',
          'image.required' => '*Please upload image',
          'upload_file.required' => '*Please upload video'
        ];
        $validate = $this->validate($request, [
                'title' => 'required |unique:tech_videos',
                'description' => 'required',
                'image' => 'required|mimes:png',
                'upload_file' => 'required|mimes:mp4,mov,ogg,qt | max:20000'
            ],$messages);

        //echo "<pre>"; print_r($request->all()); exit;

        $insertID = DB::table("tech_videos")->insertGetId(["title"=>$request->title,"description"=>$request->description,"user_id"=>\Auth::user()->id,"created_at"=>date("Y-m-d H:i:s")]);

        if(!empty($request->file("upload_file"))){
            $s_profile = $request->file("upload_file");
            $s_profile_image = $request->file("image");
            
            $folderPath = public_path('videos');
            if(!file_exists ( $folderPath )){$folderPath = mkdir($folderPath);}
            
            //video upload
            /*$s_profile->move($folderPath,$insertID.".".$s_profile->getClientOriginalExtension());*/
            $watermark = public_path().'/stamps/s1.png';
            $input = $img = $s_profile->getPathName();
            $output_file = public_path().'/videos/'.$insertID.".".$s_profile->getClientOriginalExtension();
            $ffmpeg = "C:\\ffmpeg\\bin\\ffmpeg";
            $cmd = $ffmpeg . " -i " . $input . " -i " . $watermark . " -filter_complex 'overlay' " . $output_file;
            exec($cmd, $output);

            //image upload
            /*$s_profile_image->move($folderPath,$insertID.".".$s_profile_image->getClientOriginalExtension());*/

            //waterMark for image//
            $img = $s_profile_image->getPathName();
            $stampImg = public_path()."/stamps/s1.png";
            $stamp = imagecreatefrompng($stampImg);
            $im = imagecreatefrompng($img);
            $onLeft = 1;   $onTop = 1;  $margin = 10;
            
            if($onLeft){
                $orgX = $margin;  
            } else {
                $orgX = imagesx($im)-$margin-imagesx($stamp);  
            }

            if($onTop){
                $orgY = $margin;   
            }else {
                $orgY = imagesy($im)-$margin-imagesy($stamp);   
            }

            $cut = imagecreatetruecolor(imagesx($stamp), imagesy($stamp)); 
            imagecopy($cut, $im, 0, 0, $orgX, $orgY, imagesx($stamp), imagesy($stamp)); 
            imagecopy($cut, $stamp, 0, 0, 0, 0, imagesx($stamp), imagesy($stamp)); 
            imagecopymerge($im, $cut, $orgX, $orgY, 0, 0, imagesx($stamp), imagesy($stamp), 50); 
            header('Content-type: image/jpeg');
            $filename = public_path()."/videos/".$insertID.".png";
            //imagepng($imageProperties, $filename);
            //imagepng($im);
            imagepng($im, $filename);
            imagedestroy($stamp);
            imagedestroy($im);
            //waterMark for image//

            DB::table("tech_videos")->where("id",$insertID)->update(["video_links"=>$insertID.".".$s_profile->getClientOriginalExtension(),"image"=>$insertID.".".$s_profile_image->getClientOriginalExtension()]);
        }

        if($insertID){
            return Redirect("/videos/list")->with(['message'=>"*New video added sucessfully"]);
        }else{
            return Redirect("videos/add")->with(['message'=>"*Unable to create new video."]);
        }

    }


    public function edit($id){
    	$data = DB::table("tech_videos")->where("id",$id)->first();
    	return view("videos.edit",["videos"=>$data]);
    }

    public function edit_data(Request $request){

    	$messages = [
          'title.required' => '*Please enter title',
          'description.required' => '*Please enter vide description'
        ];
        $validate = $this->validate($request, [
                'title' => 'required',
                'description' => 'required'
            ],$messages);

        if($request->file("image") != null){
            
        $validate = $this->validate($request, [
                'image' => 'mimes:png'
            ]);
        }

        if($request->file("upload_file") != null){
            
        $validate = $this->validate($request, [
                'image' => 'mimes:mp4'
            ]);
        }

        DB::table("tech_videos")->where("id",$request->id)->update(["title"=>$request->title,"description"=>$request->description]);

        $insertID = $request->id;

        if(!empty($request->file("upload_file")) || !empty($request->file("image"))){
            $s_profile = $request->file("upload_file");
            $s_profile_image = $request->file("image");
            
            $folderPath = public_path('videos');
            if(!file_exists ( $folderPath )){$folderPath = mkdir($folderPath);}
            
            if(!empty($request->file("upload_file"))){
            //video upload
            /*$s_profile->move($folderPath,$insertID.".".$s_profile->getClientOriginalExtension());*/
            $watermark = public_path().'/stamps/s1.png';
            $input = $img = $s_profile->getPathName();
            $output_file = public_path().'/videos/'.$insertID.".".$s_profile->getClientOriginalExtension();
            $ffmpeg = "C:\\ffmpeg\\bin\\ffmpeg";
            $cmd = $ffmpeg . " -i " . $input . " -i " . $watermark . " -filter_complex 'overlay' " . $output_file;
            exec($cmd, $output);
            DB::table("tech_videos")->where("id",$insertID)->update(["video_links"=>$insertID.".".$s_profile->getClientOriginalExtension()]);
            }

            if(!empty($request->file("image"))){
            //image upload
            /*$s_profile_image->move($folderPath,$insertID.".".$s_profile_image->getClientOriginalExtension());*/
            //waterMark for image//
            $img = $s_profile_image->getPathName();
            $stampImg = public_path()."/stamps/s3.png";
            $stamp = imagecreatefrompng($stampImg);
            $im = imagecreatefrompng($img);
            $onLeft = 1;   $onTop = 1;  $margin = 10;
            
            if($onLeft){
                $orgX = $margin;  
            } else {
                $orgX = imagesx($im)-$margin-imagesx($stamp);  
            }

            if($onTop){
                $orgY = $margin;   
            }else {
                $orgY = imagesy($im)-$margin-imagesy($stamp);   
            }

            $cut = imagecreatetruecolor(imagesx($stamp), imagesy($stamp)); 
            imagecopy($cut, $im, 0, 0, $orgX, $orgY, imagesx($stamp), imagesy($stamp)); 
            imagecopy($cut, $stamp, 0, 0, 0, 0, imagesx($stamp), imagesy($stamp)); 
            imagecopymerge($im, $cut, $orgX, $orgY, 0, 0, imagesx($stamp), imagesy($stamp), 50); 
            header('Content-type: image/jpeg');
            $filename = public_path()."/videos/".$insertID.".png";
            //imagepng($imageProperties, $filename);
            //imagepng($im);
            imagepng($im, $filename);
            imagedestroy($stamp);
            imagedestroy($im);
            //waterMark for image//

            DB::table("tech_videos")->where("id",$insertID)->update(["image"=>$insertID.".".$s_profile_image->getClientOriginalExtension()]);
            }

        }
        return Redirect("/videos/edit/".$request->id)->with(['message'=>"*Record updateds sucessfully"]);
    }


    public function delete($id){
    	$video = DB::table("tech_videos")->where("id",$id)->value("video_links");
    	DB::table("tech_videos")->where("id",$id)->delete();
    	unlink(public_path()."/videos/".$video);
    	return redirect("videos/list")->with(["message"=>"*Video deleted"]);
    }

	public function show($id){
		$data = DB::table("tech_videos")->where("id",$id)->first();
		return view("videos.view",["video"=>$data]);	
	}

	public function user_show(){
		$data = DB::table("tech_videos")->get();
		return view("users.user_view",["data"=>$data]);	
	}


public function setWaterMark(Request $request){
      
        /*$watermark = Input::file('watermark');
        $input = Input::file('input');*/
        $watermark = public_path().'/stamps/s3.png';
        $input = public_path().'/videos/1.mp4';
        $output_file = public_path().'/videos/ww.mp4';

        $ffmpeg = "C:\\ffmpeg\\bin\\ffmpeg";
        $cmd = $ffmpeg . " -i " . $input . " -i " . $watermark . " -filter_complex 'overlay' " . $output_file;
        exec($cmd, $output);

        return $output_file;
        exit;

}


public function user_view($id){
    $data = DB::table("tech_videos")->find($id);
    return view("users.view",["data"=>$data]);
}


}
