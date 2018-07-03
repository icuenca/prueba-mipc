<!DOCTYPE html>
<html>
<head>
<title>RingooMVC</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />

<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/bootstrap/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">


<div ID="waitDiv" style="position:absolute;margin-left:350px;visibility:hidden">
<img src="images/loading2.gif" width='70'>
</div>
<SCRIPT>
<!--
var DHTML = (document.getElementById || document.all || document.layers);
function ap_getObj(name) {
if (document.getElementById)
{ return document.getElementById(name).style; }
else if (document.all)
{ return document.all[name].style; }
else if (document.layers)
{ return document.layers[name]; }
}
function ap_showWaitMessage(div,flag) {
if (!DHTML) return;
var x = ap_getObj(div); x.visibility = (flag) ? 'visible':'hidden'
if(! document.getElementById) if(document.layers) x.left=280/2; return true; } ap_showWaitMessage('waitDiv', 3);
//-->
</SCRIPT>
</head>
<body>