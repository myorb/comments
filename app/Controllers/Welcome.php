<?php
namespace Controllers;

use Core\View;
use Core\Controller;
use Models\Comments;
/*
 * Welcome controller
 *
 * @author David Carr - dave@simplemvcframework.com
 * @version 2.2
 * @date June 27, 2014
 * @date updated May 18 2015
 */
class Welcome extends Controller
{

    /**
     * Call the parent construct
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Define Index page title and load template files
     */
    public function index()
    {
        $model = new Comments;

        $data['title'] = 'Comments';
        $data['welcome_message'] = $model->getAll();

        View::renderTemplate('header', $data);
        View::render('welcome/welcome', $data);
        View::renderTemplate('footer', $data);
    }
    
    public function subpage()
    {
        $model = new Comments;
        $data['welcome_message'] = $model->getAll();
        View::render('welcome/subpage', $data);
    }

    public function create()
    {
        $model = new Comments;
        $income = $_POST;

        if(isset($_FILES["fileToUpload"])){

            $target_dir = UPLOADS_DIR."/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $error ='';
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                // echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                $error = "File is not an image.";
                $uploadOk = 0;
            }
            // Check if file already exists
            if (file_exists($target_file)) {
                $error = "Sorry, file already exists.";
                $uploadOk = 0;
                $income['image'] = basename( $_FILES["fileToUpload"]["name"]);
            }
            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                $error = "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $error = "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $income['image'] = basename( $_FILES["fileToUpload"]["name"]);
                    // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                } else {
                    $error = "Sorry, there was an error uploading your file.";
                }
            }
        }

        echo $model->create($income)?"Thank you for your comment!":'error: '.$error;

    }
}
