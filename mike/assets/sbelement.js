//create an html element by passing the element type 
function element(type) {

	var element = document.createElement(type);
	return element;
}
//Hide an html element if visible and show otherwise
function hide(id) {
	 var x = getById(id);
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
//get an HTML element by id
function getById(id) {
	return document.getElementById(id);
}
//Get an Html element by id
function byId(id) {
	return document.getElementById(id);
}
//Get an Html element by Class name
function getByClass(cls) {
	
	return document.getElementsByClassName(cls);
}

//Create a table row from a Jason Object 
function tableRow(data) {
	//pass a JSON object it will be converted to an equivalent table row 
		var tr= element('tr');

		Object.keys(data).forEach(function(key,value) {
    var td=element('td');
			td.innerHTML=data[''+key+''];
			tr.appendChild(td);
});
	return tr;
}
//Create a table body from a list of Json Objects
function tableBody(data) {
	
	var tableBody = element('tbody');
		
	for (var i = 0; i < data.length; i++) {
		
var tr= element('tr');
			Object.keys(data[i]).forEach(function(key,value) {
    var td=element('td');
			td.innerHTML=data[i][''+key+''];
			tr.appendChild(td);
});
tableBody.appendChild(tr);
	}

	return tableBody;
}

//Add items in a JSON array to a select with options, the items should have the object id and name
function addOptions(data,select,zeroOption) {
	byId(''+select+'').innerHTML ="";
	var zero = element('option');
	zero.innerHTML =zeroOption;
	byId(''+select+'').appendChild(zero);

		for (var i = 0; i < data.length; i++) {
		
var option= element('option');
			Object.keys(data[i]).forEach(function(key,value) {

				if (key=="name") {
					option.innerHTML=data[i][''+key+''];
				}
				else if (key=="id") {

					option.setAttribute('id',data[i][''+key+''])
				}
			
});
byId(''+select+'').appendChild(option);
	}

}

//Push an list of HTML elements to a parent element;
function push(element,elements){
	for (var i = 0; i < elements.length; i++) {
		element.appendChild(elements[i]);
	}

	return element;
}

//Push a single html element to a parent element 
function pushSingle(element,elementp){
	//append a single elementp as a child to the parrent element 
	element.appendChild(elementp);
}

//Selet an element width
function setWidth(element,sizeO) {
	element.style['width']=sizeO;
}

//Set Font Size
function setFontSize(element,fontSize) {
	element.style['font-size']=fontSize;
}

//Set Auto Complete recomendations
function AutoComplete(array,element) {
	
	dataList=getById('addresses');
	dataList.innerHTML="";
	for (var i = 0; i < array.length; i++) {
		var option = document.createElement('option');
        
        option.value = array[i];
        dataList.appendChild(option);
	}
}
/*Include files dynamically**************************************************/
function loadjscssfile(path, filetype){
if (filetype=="js"){ //if filename is a external JavaScript file
var fileref=document.createElement('script')
fileref.setAttribute("type","text/javascript")
fileref.setAttribute("src", path)
}
else if (filetype=="css"){ //if filename is an external CSS file
var fileref=document.createElement("link")
fileref.setAttribute("rel", "stylesheet")
fileref.setAttribute("type", "text/css")
fileref.setAttribute("href", path)
}
if (typeof fileref!="undefined")
document.getElementsByTagName("head")[0].appendChild(fileref)
}

/***********************************************************************************************/
//Redirect current page to a specific location
function direct(address) {
	
	var windowlocation = window.location.href;
	var directory = windowlocation.substring(0,windowlocation.lastIndexOf("/") +1);

	if (address=="shareorder") {
		saveOrderLocal();
	}

	window.location.href=directory+address+".html";
}

function innerHTMLByID(id,innerHTML) {
	document.getElementById(id).innerHTML=innerHTML;
}