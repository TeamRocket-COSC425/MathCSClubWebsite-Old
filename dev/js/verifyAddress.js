/* This script and many more are available free online at
The JavaScript Source!! http://www.javascriptsource.com
Created by: William Bontrager | http://www.willmaster.com/Licensed under: U.S. Copyright
 */

function ErrorCheck() {
  var formname = "signupform";
  var fieldwithlist = "identicalfields";
  var er = new String();
  var tempstring = eval("document."+formname+"."+fieldwithlist+".value");

  if(tempstring.length > 1) {
    var idi = tempstring.split(',');
    var ts0 = eval("document."+formname+"."+idi[0]+".value");
    var ts1 = eval("document."+formname+"."+idi[1]+".value");
    if(ts0 != ts1) { er = 'The e-mail addresses do not match. Please re-enter them again.'; }
  }

  if(er.length > 0) {
    alert(er);
    return false;
  }

  return true;
}

