<?php

App::uses('AppHelper', 'View/Helper');

class BoxHelper extends AppHelper {
 	public $helpers = array('Html');
	
	
	function faq($eEntry=NULL,$role=NULL) {
		
		$ansID=$eEntry['faq_entry_id'];
		$edit='';
		
		if($role=='admin') { $edit='<div class="edit"><a href="/faq_entry/edit/'.$ansID.'">Edit</a></div>';}
		
		$faqBox='
		<div class="eQues">'.$edit.'
			<div class="fQues"><a href="javascript:" onclick="faq(\''.$ansID.'\')">'.$eEntry['faq_question'].'</a></div>
			<div id="fAns_'.$ansID.'" class="fAns">'.$eEntry['faq_answer'].'</div>
		</div>
		';
		
		return $faqBox;
	
	}
	
	
	function frDate($date) {
		
		$frDate=date('D. M. jS, Y',strtotime($date));
		return $frDate;
	
	}
	
	
	function monDayYear($field,$dbVal=NULL) {
		
		$selMon=$selYear=$selDay='';
		
		if(empty($dbVal)) { $dbVal=date('Y-m-d'); }
		
		if(!empty($dbVal)) { 
			$dateAr=explode('-',$dbVal); 
			$selMon=$dateAr[1]; 
			$selDay=$dateAr[2];
			$selYear=$dateAr[0]; 
		} //Y-m-d
		
		$mons=array(
		  '00'=>' -- ',
		  '01'=>'Jan.',
		  '02'=>'Feb.',
		  '03'=>'Mar.',
		  '04'=>'Apr.',
		  '05'=>'May',
		  '06'=>'Jun.',
		  '07'=>'Jul.',
		  '08'=>'Aug.',
		  '09'=>'Sept.',
		  '10'=>'Oct.',
		  '11'=>'Nov.',
		  '12'=>'Dec.',
		);
		$mOpts='';
		foreach($mons as $mKey=>$mVal) { 
			$sel=''; if($selMon==$mKey) { $sel=' selected="selected"'; }
			$mOpts.='<option value="'.$mKey.'" '.$sel.'>'.$mVal.'</option>'."\n";
		}
		
		$month='
		<select name="'.$field.'[mon]">
			'.$mOpts.'
		</select>';
		
		$s=1; $dOpts='';
		for($i=0;$i<=($s+31);$i++) {
			$d=(strlen($i)==1?'0'.$i:$i);
			$sel=''; if($selDay==$d) { $sel=' selected="selected"'; }
			$dd=$d=='00'?' -- ':$d;
			$dOpts.='<option value="'.$d.'" '.$sel.'>'.$dd.'</option>'."\n";
		}
		
		$day='
		<select name="'.$field.'[day]">
			'.$dOpts.'
		</select>';
		
		$s=date('Y'); $yOpts='';
		for($i=$s;$i<=($s+3);$i++) { 
			$sel=''; if($selYear==$i) { $sel=' selected="selected"'; }
			$yOpts.='<option value="'.$i.'" '.$sel.'>'.$i.'</option>'."\n";
		}
		
		$year='
		<select name="'.$field.'[year]">
			<option value="0000"> -- </option>
			'.$yOpts.'
		</select>';
		
		return $month.' '.$day.' '.$year;
	
	}
	
	function resMonth($key=NULL) { 
		/*/
		$mons=array(
		  '01'=>'January',
		  '02'=>'February',
		  '03'=>'March',
		  '04'=>'April',
		  '05'=>'May',
		  '06'=>'June',
		  '07'=>'July',
		  '08'=>'August',
		  '09'=>'September',
		  '10'=>'October',
		  '11'=>'November',
		  '12'=>'December',
		);
		/*/
		$mons=array(
		  '00'=>' -- ',
		  '01'=>'Jan.',
		  '02'=>'Feb.',
		  '03'=>'Mar.',
		  '04'=>'Apr.',
		  '05'=>'May',
		  '06'=>'Jun.',
		  '07'=>'Jul.',
		  '08'=>'Aug.',
		  '09'=>'Sept.',
		  '10'=>'Oct.',
		  '11'=>'Nov.',
		  '12'=>'Dec.',
		);
		
		if(!is_null($key)) { return $types[$key]; }
		
	}
	
	
	
	function genSelList($wList,$selected=NULL) {
		$optList='';
		foreach($wList as $eKey=>$eOpt) {
			$sel='';
			if($eKey==$selected) { $sel=' selected="selected"'; }
			$optList.=' <option value="'.$eKey.'"'.$sel.'>'.$eOpt.'</option>';
		}
	
	  return $optList;
	}


	function stateList($field,$selState,$sel_id=NULL) {

		$selNone='selected="selected"';
		
		$selAL=$selAK=$selAZ=$selAR=$selCA=$selCO=$selCT=$selDE=$selDC=$selFL=$selGA=$selHI=$selID=$selIL=$selIN=$selIA=$selKS=$selKY=$selLA=$selME=$selMD=$selMA=$selMI=$selMN=$selMS=$selMO=$selMT=$selNE=$selNV=$selNH=$selNJ=$selNM=$selNY=$selNC=$selND=$selOH=$selOK=$selOR=$selPA=$selRI=$selSC=$selSD=$selTN=$selTX=$selUT=$selVT=$selVA=$selWA=$selWV=$selWI=$selWY='';
		
		if(!empty($selState)) {
			$selNone='';
			$selSt='sel'.$selState;
			$$selSt='selected="selected"';
		} 
		
		if(empty($sel_id)) { $sel_id='state_list'; }
		
		$stateList='
		<select name="'.$field.'" size="1" id="'.$sel_id.'">
		<option value="" '.$selNone.'> - choose state - </option>
		<option value="AL" '.$selAL.'>Alabama</option>
		<option value="AK" '.$selAK.'>Alaska</option>
		<option value="AZ" '.$selAZ.'>Arizona</option>
		<option value="AR" '.$selAR.'>Arkansas</option>
		<option value="CA" '.$selCA.'>California</option>
		<option value="CO" '.$selCO.'>Colorado</option>
		<option value="CT" '.$selCT.'>Connecticut</option>
		<option value="DE" '.$selDE.'>Delaware</option>
		<option value="DC" '.$selDC.'>DC</option>
		<option value="FL" '.$selFL.'>Florida</option>
		<option value="GA" '.$selGA.'>Georgia</option>
		<option value="HI" '.$selHI.'>Hawaii</option>
		<option value="ID" '.$selID.'>Idaho</option>
		<option value="IL" '.$selIL.'>Illinois</option>
		<option value="IN" '.$selIN.'>Indiana</option>
		<option value="IA" '.$selIA.'>Iowa</option>
		<option value="KS" '.$selKS.'>Kansas</option>
		<option value="KY" '.$selKY.'>Kentucky</option>
		<option value="LA" '.$selLA.'>Louisiana</option>
		<option value="ME" '.$selME.'>Maine</option>
		<option value="MD" '.$selMD.'>Maryland</option>
		<option value="MA" '.$selMA.'>Massachusetts</option>
		<option value="MI" '.$selMI.'>Michigan</option>
		<option value="MN" '.$selMN.'>Minnesota</option>
		<option value="MS" '.$selMS.'>Mississippi</option>
		<option value="MO" '.$selMO.'>Missouri</option>
		<option value="MT" '.$selMT.'>Montana</option>
		<option value="NE" '.$selNE.'>Nebraska</option>
		<option value="NV" '.$selNV.'>Nevada</option>
		<option value="NH" '.$selNH.'>New Hampshire</option>
		<option value="NJ" '.$selNJ.'>New Jersey</option>
		<option value="NM" '.$selNM.'>New Mexico</option>
		<option value="NY" '.$selNY.'>New York</option>
		<option value="NC" '.$selNC.'>North Carolina</option>
		<option value="ND" '.$selND.'>North Dakota</option>
		<option value="OH" '.$selOH.'>Ohio</option>
		<option value="OK" '.$selOK.'>Oklahoma</option>
		<option value="OR" '.$selOR.'>Oregon</option>
		<option value="PA" '.$selPA.'>Pennsylvania</option>
		<option value="RI" '.$selRI.'>Rhode Island</option>
		<option value="SC" '.$selSC.'>South Carolina</option>
		<option value="SD" '.$selSD.'>South Dakota</option>
		<option value="TN" '.$selTN.'>Tennessee</option>
		<option value="TX" '.$selTX.'>Texas</option>
		<option value="UT" '.$selUT.'>Utah</option>
		<option value="VT" '.$selVT.'>Vermont</option>
		<option value="VA" '.$selVA.'>Virginia</option>
		<option value="WA" '.$selWA.'>Washington</option>
		<option value="WV" '.$selWV.'>West Virginia</option>
		<option value="WI" '.$selWI.'>Wisconsin</option>
		<option value="WY" '.$selWY.'>Wyoming</option>
		</select>
		';
		
		return $stateList;
		
	}
    
	
	
	function resState($wState) {
		
		if(empty($wState)) { return ''; } 
	
		$stateList=array(
		"AL"=>'Alabama',
		"AK"=>'Alaska',
		"AZ"=>'Arizona',
		"AR"=>'Arkansas',
		"CA"=>'California',
		"CO"=>'Colorado',
		"CT"=>'Connecticut',
		"DE"=>'Delaware',
		"DC"=>'DC',
		"FL"=>'Florida',
		"GA"=>'Georgia',
		"HI"=>'Hawaii',
		"ID"=>'Idaho',
		"IL"=>'Illinois',
		"IN"=>'Indiana',
		"IA"=>'Iowa',
		"KS"=>'Kansas',
		"KY"=>'Kentucky',
		"LA"=>'Louisiana',
		"ME"=>'Maine',
		"MD"=>'Maryland',
		"MA"=>'Massachusetts',
		"MI"=>'Michigan',
		"MN"=>'Minnesota',
		"MS"=>'Mississippi',
		"MO"=>'Missouri',
		"MT"=>'Montana',
		"NE"=>'Nebraska',
		"NV"=>'Nevada',
		"NH"=>'New Hampshire',
		"NJ"=>'New Jersey',
		"NM"=>'New Mexico',
		"NY"=>'New York',
		"NC"=>'North Carolina',
		"ND"=>'North Dakota',
		"OH"=>'Ohio',
		"OK"=>'Oklahoma',
		"OR"=>'Oregon',
		"PA"=>'Pennsylvania',
		"RI"=>'Rhode Island',
		"SC"=>'South Carolina',
		"SD"=>'South Dakota',
		"TN"=>'Tennessee',
		"TX"=>'Texas',
		"UT"=>'Utah',
		"VT"=>'Vermont',
		"VA"=>'Virginia',
		"WA"=>'Washington',
		"WV"=>'West Virginia',
		"WI"=>'Wisconsin',
		"WY"=>'Wyoming'
		);
		
		$myState=$stateList[$wState];
		
		return $myState;
		
	}
                

}

?>