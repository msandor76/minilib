<?php
class FileUpload{
    protected $tmp_name;
    protected $name; 
	protected $size;  
	protected $type; 
	protected $error; 
	protected $uploaded_file_and_path; 
	protected $uploadedfilename;
	protected $message;
	protected $errorcode;
	protected $file_link; 
	protected $img_target_folder = "uploads/images/";// "../kepek/";
	protected $doc_target_folder = "uploads/files/"; //fajlok/

	public function __construct( $formInputFieldName, $doc_target_folder ){
		$this->tmp_name = $_FILES[$formInputFieldName]["tmp_name"]; //$_FILES["uploadfile"]["tmp_name"];
		$this->name = $_FILES[$formInputFieldName]["name"];
		$this->size = $_FILES[$formInputFieldName]["size"];
		$this->type = $_FILES[$formInputFieldName]["type"];
		$this->error = $_FILES[$formInputFieldName]["error"];
	}
	
	public function setUploadedFileAndPath($d=NULL){
		//$d = date("Ymd_His");
		$d = ($d==NULL) ? date("Ymd") : $d;
		//$d = time();
		$this->uploaded_file_and_path = $this->doc_target_folder.$d."_".$this->setSeoName($this->name);
		$this->uploadedfilename = $d."_".$this->setSeoName($this->name);
		if( is_file( $this->uploaded_file_and_path ) ) $this->deleteFile(); //ha létezik
	}
	
	
	public function getUploadedFile(){
		return $this->uploaded_file_and_path;
	}
	
	public function getUploadedfilename(){
		return $this->uploadedfilename;
	}
	
	
	/* Mime type: text/comma-separated-values, text/csv, application/csv, application/excel, 
	 * application/vnd.ms-excel, application/vnd.msexcel, text/anytext */
	public function fileCheckCsv(){
		if($this->type != "text/comma-separated-values" && 
		   $this->type != "text/x-comma-separated-values" &&
		   $this->type != "text/csv" && 
		   $this->type != "application/csv" &&
		   $this->type != "application/excel" && 
		   $this->type != "text/anytext" && 
		   $this->type != "application/vnd.ms-excel" &&
		   $this->type != "application/vnd.openxmlformats-officedocument.wordprocessingml.document" && 
		   $this->type != "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" &&
		    substr($this->type,-4)!=".csv" &&
			substr($this->type,-4)!=".xls" &&
			substr($this->type,-5)!=".xlsx" )
		{
			//echo("A fájl nem egyszerû szöveg");
			$this->message = "Nem jó fájl formátumot akartál felrakni";
			$this->errorcode = 3;
			return false;
		}
		else{
		    //a file ok
			return true;
		}
	}


	public function fileCheckDoc(){ 
	    if($this->type != "text/plain" && 
		   $this->type != "text/rtf" && 
		   $this->type != "application/pdf" &&
		   $this->type != "image/jpeg" && 
		   $this->type != "application/msword" && 
		   $this->type != "application/vnd.ms-excel" &&
		   $this->type != "application/vnd.openxmlformats-officedocument.wordprocessingml.document" && 
			$this->type != "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" &&
		   substr($this->type,-4)!=".jpg" &&
		   substr($this->type,-4)!=".pdf" &&
			substr($this->type,-5)!=".jpeg" &&
		    substr($this->type,-4)!=".doc" && 
			substr($this->type,-5)!=".docx" &&
			substr($this->type,-4)!=".xls" &&
			substr($this->type,-5)!=".xlsx" &&
			substr($this->type,-4)!=".rtf" )
		{
			$this->message = "Nem jó fájl akartál felrakni";
			$this->errorcode = 3;
			return false;
		}
		else{
		    //feltöltés ok, mehet
			return true;
		}
		
	} 
	
	
	public function fileCheckImg(){ 
	    if($this->type != "image/jpeg" && 
	       $this->type != "image/gif" && 
		   substr($this->type,-4)!=".jpg" && 
		   substr($this->type,-4)!=".JPG" &&
		    substr($this->type,-4)!=".gif" && 
			substr($this->type,-5)!=".jpeg" && 
			substr($this->type,-5)!=".JPEG" )
		{
			$this->message = "Nem jó fájl formátumot akartál felrakni";
			$this->errorcode = 3;
			return false;
		}
		else{
		    //mehet
			return true;
		}
		
	}
	

	public function startFileUpload(){
	    if(is_uploaded_file($this->tmp_name) ){
		   if(!move_uploaded_file($this->tmp_name, $this->uploaded_file_and_path) ){
			  $this->message = "Nem sikerult a cél/megadott helyre átrakni a fájlt";
			  $this->errorcode = 4;
			  return false;
		   }
		   else{ 
		      $this->message = "Feltöltés sikeresen megtörtént";
			  $this->message .= "A fájl elérése: <br /> <a href=\"".$this->uploaded_file_and_path."\">" . $this->uploaded_file_and_path . "</a>";
              $this->file_link = $this->uploaded_file_and_path;
			  $this->errorcode = 5;
			  return true;
		   }
		}
		else{
		   $this->message = "Hiba: támadási kísérlet! Fájlneve: ".$this->name;
		   $this->errorcode = 6;
		   return false;
		}

		//echo("A fájlfeltöltés sikerült");
	} // startFileUpload() END
	
	
	public function checkAndUploadImg(){
       $feltoltve = false;
       if(!preg_match('/(gif|jpe?g|png)$/i', $this->name)){
         //echo("<h3 style=\"color:crimson\">Valami nem OK! Lehet, hogy nem képet akartál felrakni!</h3>");
          $feltoltve = false;
       }
       else{
         move_uploaded_file($this->tmp_name, $this->uploaded_file_and_path);
         $feltoltve = true;
       }
       return $feltoltve; 
    }
	

	public function getErrorCode(){
	   //return $this->uzenet;
	   return $this->errorcode;
	}
	
	public function getMessage(){
	   //return $this->uzenet;
	   return $this->message;
	}

	public function getLink(){
	   return $this->file_link;
	}
	
	public function deleteFile(){
		chmod( $this->uploaded_file_and_path, 0777);
		unlink($this->uploaded_file_and_path);
	}
	
	public function setSeoName($str){
       $cserelendo = array("é","É", "á","Á", "í","Í", "ü","Ü", "ű","Ű", "ú","Ú", "ó","Ó", "ö","Ö", "ő","Ő", "ä", " ", ",","(",")","'","' ");
       $mire =       array("e","e", "a","a", "i","i", "u","u", "u","u", "u","u", "o","o", "o","o", "o","o", "a", "-", "-","","","-","-" );
	   $seostr = mb_strtolower($str,'UTF-8');
	   $seostr = strtolower($str);
       $seostr = str_replace($cserelendo, $mire, $seostr);
       
       // ki kellett egészíteni:
       $seostr = $this->slugify($seostr);
       
	   return $seostr;
    }
    
    // ezt kiegészítésként kellett beleraknom mert van olyan pdf/fájl aminek nevében rejtélyes karakterek vannak
    public function slugify($text, $strict = false) {
		$text = html_entity_decode($text, ENT_QUOTES, 'UTF-8');
		$text = str_replace(array("’", "'", '"'), "", $text);
		$text = preg_replace('~[^\\pL\d.]+~u', '-', $text);
		$text = trim($text, '-');
		setlocale(LC_CTYPE, 'en_GB.utf8');
		if (function_exists('iconv')) {
			$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
		}
		$text = strtolower($text);
		$text = preg_replace('~[^-\w.]+~', '', $text);
		if (empty($text)) {
			return 'empty_$';
		}
		if ($strict) {
			$text = str_replace(".", "_", $text);
		}
		return $text;
	}


}
?>
