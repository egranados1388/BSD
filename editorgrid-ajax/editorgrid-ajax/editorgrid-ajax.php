<?php
	header("Content-Type: text/plain");
	session_start(); 
	
	$add = $_POST['records'];
	
	if(!isset($_SESSION['data'])){
		$data = array(
			'success'=>true,
			'total'=>11,
			'data'=>array(
				array('id'=>1,'name'=>'John doe','age'=>23,'country'=>'USA'),
				array('id'=>2,'name'=>'Taylor Swift','age'=>19,'country'=>'USA'),
				array('id'=>3,'name'=>'Carlos Mena','age'=>22,'country'=>'México'),
				array('id'=>4,'name'=>'Christiano Ronaldo','age'=>24,'country'=>'Portugal'),
				array('id'=>5,'name'=>'Sasha Cohen','age'=>25,'country'=>'USA'),
				array('id'=>6,'name'=>'Christian Van Der Henst','age'=>27,'country'=>'Guatemala'),
				array('id'=>7,'name'=>'Collis Ta\'eed','age'=>31,'country'=>'USA')
			)
		);
		$_SESSION['data'] = $data;
	}else{
		$data = $_SESSION['data'];
	}
	
	if(isset($add)){
		$records = json_decode(stripslashes($add));
		$ids = array();
		foreach($records as $record){
			if(isset($record->newRecordId)){ //insert
				$id = count($data['data']);
				$info = array(
					'id'=> id,
					'name'=> $record->name,
					'age'=> $record->age,
					'country'=> $record->country
				);
				
				array_push($data['data'],$info);
				array_push($ids,array('oldId'=>$record->newRecordId,'id'=>$id));
			}else{ //update
				foreach($data['data'] as $key=>$r){
					if($r['id'] == $record->id){
						$data['data'][$key]['name'] = $record->name;
						$data['data'][$key]['age'] = $record->age;
						$data['data'][$key]['country'] = $record->country;
						break;
					}
				}
			}
		}

		echo json_encode(array(
				'success'=>true,
				'data'=>$ids
			));
	}else{
		echo json_encode($data);
	}
?>