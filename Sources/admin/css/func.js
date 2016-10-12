// JavaScript Document
function chk_null(){
	if(document.form1.bName.value==""){
		alert("กรุณากรอกชื่อหนังสือ");
		document.form1.bName.focus();
		return false;
	}
	if(document.form1.authID.value==""){
		alert("กรุณากรอกรหัสผู้แต่ง");
		document.form1.authID.focus();
		return false;
	}
	if(document.form1.bDesc.value==""){
		alert("กรุณากรอกคำอธิบายหนังสือ");
		document.form1.bDesc.focus();
		return false;
	}
		if(document.form1.bEdition.value==""){
		alert("กรุณากรอกราคา");
		document.form1.bEdition.focus();
		return false;
	}
	if(document.form1.bPrice.value==""){
		alert("กรุณากรอกราคา");
		document.form1.bPrice.focus();
		return false;
	}
		
			if(document.form1.bCount.value==""){
		alert("กรุณากรอกจำนวน");
		document.form1.bCount.focus();
		return false;
	}
		if(document.form1.bPic.value==""){
		alert("กรุณาเลือกรูปภาพ");
		return false;
	}
}
