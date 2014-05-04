<?php

class MY_Form_validation extends CI_Form_validation{

	function test(){
	
		echo "testing the extended Form Validation Library";
	}
	
	function strong_pass($value, $params){
	
		$this->CI->form_validation->set_message('strong_pass',
			'This %s is not strong enough (hint: need combination of digit, char, special char)');
	
		$score = 0;
		//digit
		if(preg_match('!\d!',$value)){
			$score++;	
		}
		//char
		if(preg_match('![A-z]!',$value)){
			$score++;	
		}
		//special char
		if(preg_match('!\W!',$value)){
			$score++;	
		}
		if(strlen($value)>=8){
			$score++;	
		}
		
		if($score < $params){
			return false;
		}
		
		return true;	
	}
	
	function ic_no($value){
	
		$this->CI->form_validation->set_message('ic_no',
			'This %s is not ic number (hint: 123456-12-1234) ');
			
		if(preg_match('/^\d{6}\-\d{2}\-\d{4}$/',$value)){
			return true	;
		}
		else
		{
			return false;
		}
	}
	
	function li_no($value){
	
		$this->CI->form_validation->set_message('li_no',
			'This %s is not License number (hint: 123456) ');
			
		if(preg_match('/^\d{6}$/',$value)){
			return true	;
		}
		else
		{
			return false;
		}
	}
	
	function name_space($value){
	
		$this->CI->form_validation->set_message('name_space',
			'The Name field may only contain alphabetical and space characters.');
			
		if(preg_match('/^[a-zA-Z\s]+$/',$value)){
			return true	;
		}
		else
		{
			return false;
		}
	}
	
	function phone($value){
	
		$this->CI->form_validation->set_message('phone',
			'The %s should be in this format 123-1324567');
			
		if(preg_match('/^\d{3}\-\d{7}$/',$value)){
			return true	;
		}
		else
		{
			return false;
		}
	}
	
}