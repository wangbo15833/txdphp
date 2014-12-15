function CheckAll(form)
{
for (var i=0;i<form.elements.length;i++)
  {
  var e = form.elements[i];
  if (e.name != 'chkall')
     e.checked = form.chkall.checked;
  }
}
function delit(myform)
{
  result="提示：是否删除所选项？"
  if (confirm(result))
  {
    myform.action="log_del_do.php";
  }
}