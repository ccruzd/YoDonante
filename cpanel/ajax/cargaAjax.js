function $(id){return document.getElementById(id);}
function http(){
	if(window.XMLHttpRequest){
		return new XMLHttpRequest();	
	}else{
		try{
			return new ActiveXObject('Microsoft.XMLHTTP');
		}catch(e){
			alert('nop');
        	return false;
		}	
	}
}
String.prototype.tratarResponseText=function(){
	var pat=/<script[^>]*>([\S\s]*?)<\/script[^>]*>/ig;
	var pat2=/\b\s+src=[^>\s]+\b/g;
	var elementos = this.match(pat) || [];
	for(i=0;i<elementos.length;i++) {
		var nuevoScript = document.createElement('script');
		nuevoScript.type = 'text/javascript';
		var tienesrc=elementos[i].match(pat2) || [];
		if(tienesrc.length){
			nuevoScript.src=tienesrc[0].split("'").join('').split('"').join('').split('src=').join('').split(' ').join('');
		}else{
			var elemento = elementos[i].replace(pat,'$1','');
			nuevoScript.text = elemento;
		}
		document.getElementsByTagName('body')[0].appendChild(nuevoScript);
	}
	return this.replace(pat,'');
}

function SetContainerHTML(id_contenedor,responseText){
	var mydiv = $(id_contenedor);
	mydiv.innerHTML = responseText.tratarResponseText();
}
function cargarPagina(url,contenedorId){
var H=new http();
H.open('get',url+'?'+Math.random(),true);
H.onreadystatechange=function(){
	if(H.readyState==4){
		SetContainerHTML(contenedorId,H.responseText);
		H.onreadystatechange=null;
	}else{
		$(contenedorId).innerHTML='cargando...';
	}
}
H.send(null);
}

window.onload=function(){
	cargarPagina(url,id);
}