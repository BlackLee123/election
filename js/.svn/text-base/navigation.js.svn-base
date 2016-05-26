var openImg = new Image();
openImg.src = "images/navigation_open.gif";
var closedImg = new Image();
closedImg.src = "images/navigation_closed.gif";

function showBranch(branch){
	var objBranch = document.getElementById(branch).style;
	if(objBranch.display=="block")
		objBranch.display="none";
	else
		objBranch.display="block";
	swapFolder('I' + branch);
}

function swapFolder(img){
  objImg = document.getElementById(img);
  if(objImg.src.indexOf('images/navigation_closed.gif')>-1)
	 objImg.src = openImg.src;
  else
	 objImg.src = closedImg.src;
}

function ChangedLink(linkText)
{
	var d = new Date();
	var NewLink = linkText + "?p=" + d.getTime();
	parent.frames['main'].location.href = NewLink;
}