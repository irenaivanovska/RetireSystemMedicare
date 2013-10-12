// JavaScript Document


$(document).ready(function() {
   $('.swf').focus(function(){ clf(this); });
   $('.swf').blur(function(){ rsf(this); });
});


function faq(wAns) {
	var ansDiv='fAns_'+wAns;
	$('#'+ansDiv).slideToggle();
}



function show(wDiv){ document.getElementById(wDiv).style.display='block'; }
function hide(wDiv) { 
	if(typeof wDiv=='object') { wDiv.style.display='none'; return; } 
	document.getElementById(wDiv).style.display='none';
}

function flip(nmDiv) {
	var wDiv=document.getElementById(nmDiv);
	if(wDiv.style.display=='block') { wDiv.style.display='none'; }
	else { wDiv.style.display='block'; }
	
}

function clf(wInput) {
	var myType=$(wInput).attr('type');
	if(wInput.value==wInput.defaultValue) { 
		if($('#fp') && myType=='password') { $('#fp').css('display','none'); } 
		wInput.value='';  wInput.style.color='#111';
	}
}
function rsf(wInput) {
	var myType=$(wInput).attr('type');
	if(wInput.value=='') { 
		if($('#fp') && myType=='password') { $('#fp').css('display','block'); }
		wInput.value=wInput.defaultValue;  wInput.style.color='';
	}
}

function conDelete() {
	var r=confirm("Are you sure you want to delete this?");
	if (r==true){ return true; }
	return false;
}

function conAddrDel() {
	var r=confirm("Are you sure you want to delete this address?");
	if (r==true){ return true; }
	return false;
}

function delFile(wFile) {
	
	var hClass=$('#'+wFile+'_s').hasClass('strike');
	if(hClass==true) { 
		$('#'+wFile).val('0');
		$('#'+wFile).attr('checked',false);
		$('#'+wFile+'_s').removeClass('strike');
	} else {
		$('#'+wFile).val('del');
		$('#'+wFile).attr('checked',true);
		$('#'+wFile+'_s').addClass('strike');	
		
	}
}




function addBar() {
	var barDiv=$('#bars');
	var lastBar=$('#bars div:first-child');
	var rem='<a href="javascript:" onclick="remBar(this)">X</a>';
	lastBar.clone().append(rem).appendTo(barDiv);
}

function remBar(bar) {
	$(bar).parent('div').remove();
}

function addAdBar() {
	var barDiv=$('#add_bars');
	//var lastBar=$('#add_bars div:first-child');
	var rem='<a href="javascript:" onclick="remBar(this)">X</a>';
	var newBar='<div><input type="text" size="40" name="data[ad_bars][]" value="" maxlength="80"> '+rem+'</div>';
	barDiv.append(newBar);
}

function addFF() {
	var flDiv=$('#floral_from');
	var newBar='<div><input name="data[floral_from][]" type="text" size="30"/></div>';
	flDiv.append(newBar);
}

function addFF() {
	var flDiv=$('#floral_from');
	var newBar='<br/><input name="data[floral_from][]" type="text" size="30"/>';
	flDiv.append(newBar);
}

function addEmails() {
	var emDiv=$('#email_addys');
	var lastDiv=$('#email_addys > div:last-child').attr('rel');
	var xID=-1;
	if(lastDiv) { xID=+lastDiv; } 
	var xID=xID+1;
	var rem='<a href="javascript:" onclick="remBar(this)">X</a>';
	var newBar='<div rel="'+xID+'">Name: <input name="data[UserEmails]['+xID+'][email_name]" type="text"/> Email: <input name="data[UserEmails]['+xID+'][email_addy]" type="text" size="25"/> '+rem+'</div>';
	
	emDiv.append(newBar);
}

function addContact() {
	var emDiv=$('#myCons');
	
	var lastDiv=$('#myCons > div:last-child').attr('data');
	var xID=-1;
	if(lastDiv) { xID=+lastDiv; } 
	var xID=xID+1;
	//var rem='<a href="javascript:" onclick="remBar(this)">X</a>';
	//var newBar='<div rel="'+xID+'">Name: <input name="data[UserEmails]['+xID+'][email_name]" type="text"/> Email: <input name="data[UserEmails]['+xID+'][email_addy]" type="text" size="25"/> '+rem+'</div>';
	var newCon='<div id="con_'+xID+'" data="'+xID+'"><a href="javascript:" onclick="remCon(this,0)" class="remove">X</a>\n<table width="100%" border="0" cellspacing="0" cellpadding="0">\n<tr><td>Job Title:</td><td><input name="data[newContacts]['+xID+'][con_title]" type="text"/></td>\n</tr>\n<tr><td>Name:</td><td>\n<input name="data[newContacts]['+xID+'][con_fname]" type="text" size="15"/> \n<input name="data[newContacts]['+xID+'][con_lname]" type="text"/> <span class="fs12">(First, Last)</span>\n</td>\n</tr>\n<tr><td>Phones:</td>\n<td>\n<span class="fs12">primary: </span><input name="data[newContacts]['+xID+'][con_phone]" type="text" size="10"/>\n<span class="fs12"> office: </span><input name="data[newContacts]['+xID+'][con_ph_office]" type="text" size="10"/></td>\n</tr>\n<tr><td>Email:</td><td><input name="data[newContacts]['+xID+'][con_email]" type="text" size="30"/> </td></tr>\n</table>\n</div>';
	
	
	//var newCon='<div id="con_'+xID+'" data="'+xID+'">'+$('#con_new').html()+'</div>';
	
	emDiv.append(newCon);
}

function remCon(bar,con) {
	
	if(con==1) {
		var conText="Remove this contact?"
		
		var r=confirm(conText);
		if (r==true){ $(bar).parent('div').remove(); }
		
	} else { $(bar).parent('div').remove(); }
}



/* -------------------------------------------------------------------------- */

function vr(field,alerttxt) {
	with (field) { if (value==null || value=="") { alert(alerttxt); return false; } else {return true;} }
}

function vf_search(thisform) { 

var numbersOnly = /[^\d.]/;

with (thisform) {
	
	var distGood = !numbersOnly.test(distance.value);
	if (!distGood) { alert("Please enter a Valid Distance\n\n Numbers Only"); distance.focus(); return false; }
	
	var zipGood = !numbersOnly.test(zip.value);
	if (!zipGood) { alert("Please enter a Valid Zipcode\n\n Numbers Only"); zip.focus(); return false; }
	
}
return true;

}

function vf_password(thisform) {

with (thisform) {
	if (vr(pass,"Please enter a Password.")==false) { pass.focus() ;return false; }
	if (vr(pass_confirm,"Please confirm the Password.")==false) { pass_confirm.focus() ;return false; }
	if(pass.value!=pass_confirm.value) { alert('Passwords do not match'); return false; }
}
return true;
}

function vf_user(thisform) {

with (thisform) {
	if (vr(UsersUserFirstname,"Please enter a First Name.")==false) { UsersUserFirstname.focus() ;return false; }
	if (vr(UsersUserLastname,"Please enter a Last Name.")==false) { UsersUserLastname.focus() ;return false; }
	if (vr(UsersUserEmailAddress,"Please enter an email address.")==false) { UsersUserEmailAddress.focus() ;return false; }
	if (echeck(UsersUserEmailAddress.value)==false) { 
		alert("Invalid E-mail Address\n  must be a \"name@site.com\""); 
		UsersUserEmailAddress.focus(); return false; 
	}
	
}
return true;
}


function vra(field) {
	with (field) { if (value==null || value=="") { return false; } else {return true;} }
}

function vf_application(thisform) {

var errors=['0'];

$('.formDiv input, .formDiv select, .formDiv span').removeClass('err');

with (thisform) {
	
	if (vra(UserApplicationCoName)==false) { errors['UserApplicationCoName']="Please enter your Company Name."; }
	
	var n = $("input.ent:checked").length;
	if(n<1) { errors['co_entity']="Please choose an Entity Type"; }
	
	if (vra(UserApplicationNumYearsBiz)==false) { errors['UserApplicationNumYearsBiz']="Please enter # of years in business."; }
	if (vra(UserApplicationNumYearsOwner)==false) { errors['UserApplicationNumYearsOwner']="Please enter # of years under current ownership."; }
	if (vra(UserApplicationCoWebsite)==false) { errors['UserApplicationCoWebsite']="Please enter your business website address"; }
	
	if (vra(pStreet)==false) { errors['pStreet']="Please provide your business Street Address"; }
	if (vra(pCity)==false) { errors['pCity']="Please provide your business City"; }
	if (vra(pState)==false) { errors['pState']="Please provide your business State"; }
	if (vr(apZip)==false) { errors['pZip']="Please provide your business Zip"; }
	
	if(document.getElementById('floral_from')) { 
		if (vra(floral_1)==false) { errors['floral_1']="Please provide at least 2 company names"; }
		if (vra(floral_2)==false) { errors['floral_2']="Please provide at least 2 company names"; }
	}
	
	var n = $("input.btype:checked").length;
	if(n<1) { errors['biz_type']="Please choose at least 1 Type of Business"; }
	
	if (vra(UserApplicationCoDescr)==false) { errors['UserApplicationCoDescr']="Please provide a Company Description"; }
	
	if(agree_fedex.checked==false) { errors['agree_fedex']="You must agree to FedEx authorization"; }
	
	if (vra(agree_terms_FN)==false || vra(agree_terms_LN)==false) { 
		errors['agree_terms_FN']="You must agree to FedEx contact by providing your first and last name";
		errors['agree_terms_LN']="";
	}
	
	alerText='';
	for(x in errors) { 
		if(errors[x]=='0') { continue; }
		if(errors[x]!='') { alerText=alerText+" - "+errors[x]+"\n"; }
		$('#'+x).addClass('err');
	}
	if(alerText!='') {
		var fullAlertText="Please fix these errors:\n"+alerText;
		alert(fullAlertText);
		return false;
	}

}
return true;
}




function vf_join(thisform) { 

var numbersOnly = /[^\d.]/;

with (thisform) {
	
	if (vr(UsersUsername,"Please enter a Username")==false) { UsersUsername.focus(); return false; }
	if (vr(UsersPassword,"Password cannot be blank")==false) { UsersPassword.focus(); return false; }
	
	var passVal=document.getElementById('UsersPassword').value;
	var conVal=document.getElementById('UsersPasswordConfirmation').value;
	
	if(passVal!=conVal) { alert("Passwords do not match"); return false; }
	
	if(document.getElementById('UsersTerms')) {
		if(UsersTerms.checked==false) { alert("You must agree to the Terms of Service"); return false; }
	}	
	
} // end with this form
	 
return true;

}


function vf_faq(thisform) {

with (thisform) {
	if(document.getElementById('delete_entry')) {
		if(delete_entry.checked==true) {
			var r=confirm("Are you sure you want to delete this FAQ?");
			if (r==true){ return true; }
			return false;
		}
	}
	if (vr(faq_question,"Please enter a Question")==false) { faq_question.focus() ;return false; }
	if (vr(entry_text,"Please enter an Answer")==false) { entry_text.focus() ;return false; }
	if (faq_cat.value==0) { 
		alert("You must choose a Category");
		faq_cat.focus() ;return false;
	}
	
}
return true;
}


function vf_url(thisform) { 

var numbersOnly = /[^\d.]/;

with (thisform) {
	
	if (vr(short_URL,"Please enter a short URL you profile will be known be.")==false) { short_URL.focus(); return false; }
	
} // end with this form
	 
return true;

}




function echeck(str) {
		var at="@";
		var dot=".";
		var lat=str.indexOf(at);
		var lstr=str.length;
		var ldot=str.indexOf(dot);
		if (str.indexOf(at)==-1){ return false; }
		if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){ return false; }
		if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){ return false; }
		if (str.indexOf(at,(lat+1))!=-1){ return false; }
		if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){ return false; }
		if (str.indexOf(dot,(lat+2))==-1){ return false; }		
		if (str.indexOf(" ")!=-1){ return false; }
 		 return true;	
}


