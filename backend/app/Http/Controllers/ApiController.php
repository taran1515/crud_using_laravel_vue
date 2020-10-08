<?php

namespace App\Http\Controllers;

use App\Imports\PostInfoImport;
use Maatwebsite\Excel\Facades\Excel;

use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Info;

class ApiController extends Controller
{
    public function getAllPosts() {
       
        $posts = Post::get()->toJson(JSON_PRETTY_PRINT);
        return response($posts, 200)->header('Content-Type', 'application/json');
      }

    public function getComments($id){

        if (Comment::where('post_id', $id)->exists()) {
            $comment = Comment::where('post_id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($comment, 200)->header('Content-Type', 'application/json');
          } else {
            return response()->json([
              "message" => "Comment not found"
            ], 404);
          }



    }

    public function getInfos($id){

      if (Info::where('id', $id)->exists()) {
          $info = Info::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
          return response($info, 200)->header('Content-Type', 'application/json');
        } else {
          return response()->json([
            "message" => "Info not found"
          ], 404);
        }



  }

//   public function readCSVFile(){
//     print("dvbshcj");

//     $file_n = storage_path('app/public/post.csv');
//     $fileD = fopen($file_n,"r");
//     $column=fgetcsv($fileD);
//     while(!feof($fileD)){
//       $rowData[]=fgetcsv($fileD);
//       }
      
//       foreach ($rowData as $key => $value) {
          
//           $inserted_data=array(
//                                'user_id'=>$value[0],
//                                'title'=>$value[1],
//                                'body'=> $value[2]
//                           );
          
//            Post::create($inserted_data);
//       }
//       // print_r($rowData);


// }

  // public function generateCSVFile(){
  //   print('sbkdvbs');

  //   $faker = Faker\Factory::create();

  //   $file_n = storage_path('app/public/file.csv');
  //   $fileD = fopen($file_n,"w");

  //   fwrite($fileD,
  //   $faker->id().','.$faker->title().','
  
  // );

    
  // }


  public function import($path)
    {
      // print('vhdfvbj');
       

        // $path1 = $request->file('import_file')->store('temp'); 
        // $path=storage_path('app').'/'.$path1;  
        // $data = \Excel::import(new PostInfoImport,$path);

        
        // print($path);
        $i = 0;
        $rowData = [];
        $fileD = fopen($path,"r");
        $column=fgetcsv($fileD);
        while(!feof($fileD))
        {
          // print_r(fgetcsv($fileD));
          array_push($rowData,fgetcsv($fileD));
          // print_r($rowData[$i]);
          $i = $i + 1;
        }
        // print_r($i);
        unset($rowData[$i-1]);
        // print('hey');
        // print_r($rowData);
        return $rowData;
        







        // $data = Excel::import(new PostInfoImport, $path);

        // return response()->json(['message' => 'uploaded successfully'], 200);
    }


  public function importPostData(Request $request)
  {

    // print('ebjhdsbh');
    $request->validate([
      'import_file' => 'required|mimes:csv,txt'
  ]);

  $path = $request->file('import_file');

  // print('Hey');
  // print($path);

  $rowData = self::import($path);
  // print_r($rowData[0]);


  

    try{    

    // print_r('Running');
    DB::beginTransaction();
    foreach ($rowData as $key => $value) {
      
        // print('xyz');
      $inserted_data=array(
        
                           'user_id'=>strval($value[0]),
                           'title'=>strval($value[1]),
                           'body'=> strval($value[2])
                      );
      
      Post::create($inserted_data);

  

      
  


  }

  DB::commit();
  // $message = "Data Imported";
  return response()->json([
    "message" => "Data Imported"
  ], 200);
  
}
catch (\Throwable $e) {
  DB::rollback();
  // print('Not created');

  return response()->json([
    "message" => "Not Created"
  ], 200);
  // throw $e;
}


}


public function createPost(Request $request) {

  print('Running');
  $post = new Post;
  print($request);
  $post->user_id = $request->user_id[0];
  $post->title = $request->title[0];
  $post->body = $request->body[0];
  $post->save();

  return response()->json([
      "message" => "post record created"
  ], 201);
}

}
