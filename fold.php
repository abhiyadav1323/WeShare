<?php
session_start();
include_once 'dbconnect.php';?>
    <script type="text/javascript" src="folder.js"></script>
<?php
if(sizeof($_FILES) > 0)
	$fileUploader = new FileUploader($_FILES);

class FileUploader{
	public function __construct($uploads,$uploadDir='/var/www/html/upload/'){
		
		// Split the string containing the list of file paths into an array 
		$paths = explode("###",rtrim($_POST['paths'],"###"));
		
		// Loop through files sent
		foreach($uploads as $key => $current)
		{
			// Stores full destination path of file on server
			$this->uploadFile=$uploadDir.rtrim($paths[$key],"/.");
			// Stores containing folder path to check if dir later
			$this->folder = substr($this->uploadFile,0,strrpos($this->uploadFile,"/"));
			
			// Check whether the current entity is an actual file or a folder (With a . for a name)
			if(strlen($current['name'])!=1)
				// Upload current file
				if($this->upload($current,$this->uploadFile))
					echo "The file ".$paths[$key]." has been uploadedn";
				else 
					echo "Error";
		}
	}
	
	private function upload($current,$uploadFile){
		// Checks whether the current file's containing folder exists, if not, it will create it.
		if(!is_dir($this->folder)){
			mkdir($this->folder,0700,true);
		}
		// Moves current file to upload destination
		if(move_uploaded_file($current['tmp_name'],$uploadFile))
		{
			$query = "INSERT INTO upload(fname) VALUES ('$uploadFile')";
			mysql_query($query) or die('Error, query failed');

			// Tells you if its all ok
			echo "The folder ". $uploadFile. " has been uploaded."."<br>";
			//$q = "SELECT * FROM upload WHERE fname = '$uploadFile'";
			//$res = mysql_query($q) or die('Error, query failed');
			//list($id) = mysql_fetch_array($res);
			//echo "the url of file: localhost/abhishek/download.php?id=".$id;
		}
		else 
			return false;
	}
}
?>