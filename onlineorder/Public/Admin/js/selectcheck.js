//全选
function selectall(){
	var chk=document.getElementsByName('id[]');
	for(var i=0;i<chk.length;i++){
		chk[i].checked=true;
	}
}
//反选
function inverse(){
	var chk=document.getElementsByName('id[]');
	for(var i=0;i<chk.length;i++){
		if(chk[i].checked){
			chk[i].checked=false;
		}else{
			chk[i].checked=true;
		}
	}
}
//全不选
function unselectall(){
	var chk=document.getElementsByName('id[]');
	for(var i=0;i<chk.length;i++){
		chk[i].checked=false;
	}
}