
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Cache-Control: no cache");

session_cache_limiter("private_no_expire");

class Test_c extends CI_Controller {

	function __construct(){
			parent::__construct();
			
			$this->load->model('Main_m');
			
	}
	public function index(){


		$data['action'] = "Test_c/generateCSVFile";	
  	 	$data['error'] = false;
  	 	$data['value'] = '' ;
  
		$this->load->view('generate_file_v',$data);
	}

	/**
	* Validate if record count is greater then zero
	* if greater then zero generate CSV File
	*
	* @param  record_count $record_count number of records to generate
	* @return CSV File
	**/
	public function generateCSVFile(){

		$record_count =  $this->input->post('no_records'); 

		if(empty($record_count ) || $record_count > 1000000){
			$data['error'] = true;
			$data['action'] = "generateCSVFile";	
			$data['value'] = $record_count ;
			$this->load->view('generate_file_v',$data);
		}else{

			$headers = array("Id", "Name", "Surname", "Initials", "Age", "DateOfBirth");

			$names = array("Mary Elizabeth", "Jake ", "Gemma ", "Elliot James", "Richard ", "Alfred ", "Stephen A.", "Farzana Dua", "Ben","Steve","Claudio","Selva", "Masoud", "Ronald", "Darwin", "Daisy", "Chris", "Don", "Brie", "Elizabeth");

			$surnames = array("Smith", "Gyllenhaal", "Arterton", "Neale", "Coyle", "Molina", "Pope", "Elahe", "Kingsley","Toussaint","Pacifico","Rasalingam", "Abbasi", "Pickup", "Shaw", "Doidge-Hill", "Evans", "Cheadle", "Larson", "Olsen");

			$output = [];


	   		$id = 1;	
	   		for ($i=0; $i < $record_count ; $i++) { 
	   			
	   			$start = strtotime('1970-01-01');
				$end = time();
				$timestamp = mt_rand($start, $end);
				$randomDate = date('Y-m-d', $timestamp);
				$years_ago = date("Y-m-d");
	  			$diff = date_diff(date_create($randomDate), date_create($years_ago));
	  			$randomName = $names[array_rand($names)];
	  			$randomSurname =$surnames[array_rand($surnames)];

	  			$initials = substr($randomName, 0, 1);
	  			$pos = strpos($randomName, ' ');

	  			if(!empty($pos)){
	  				$initials  = $initials .''. substr($randomName,$pos + 1, 1);
	  			}



				$output []  = array(
					'id' =>  $id , 
					'name' =>  $randomName,
					'surname' => $randomSurname,
					'initials' => $initials,
					'age' => $diff->format('%y') ,
					'Date of Birth' => $randomDate
				);

				$id++;
				
	   		}


   			$filename = 'output/output.csv';
   			$fsh = fopen($filename, 'w');

   			fputcsv($fsh, $headers);

   			// write each row at a time to a file
			foreach ($output as $row) {
				fputcsv($fsh, $row);
			}

				// close the file
			fclose($fsh);
			$data['error'] = false;

			$this->load->view('upload_file_v',$data);
		}

		
	}
	/**
	* Upload CSV File content to database
	* 
	*
	* @param  file upload
	* @return total records imported
	**/
	 public function import(){



       $file = $_FILES['file']['tmp_name'];
       
       if(empty($file)){
       		$data['error'] = true;

       		$this->load->view('upload_file_v',$data);
       }else{

	       $csv_data = fopen($file,"r");

	       $count= 0;
	       while (($row = fgetcsv($csv_data, 1000000, ",")) != FALSE)
			{
			   
			    if( $count != 0){
			    	$user []  = array(
			    		'id' => $row[0], 
			    		'name' => $row[1], 
			    		'surname' => $row[2], 
			    		'initials' => $row[3], 
			    		'age' => $row[4], 
			    		'dateofbirth' => $row[5], 


			    	);

			    	
			    }

			    
			    $count++;	

			}

			$data['total'] = $this->Main_m->insertUser($user);


			$this->load->view('success_v', $data);
       }


      
    }


	
}
