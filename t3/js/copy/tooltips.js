var btns=document.querySelectorAll('.btnqxd');for(var i=0;i<btns.length;i++){btns[i].addEventListener('mouseleave',clearTooltip);btns[i].addEventListener('blur',clearTooltip);}
function clearTooltip(e){e.currentTarget.setAttribute('class','btnqxd');e.currentTarget.removeAttribute('aria-label');}
function showTooltip(elem,msg){elem.setAttribute('class','btnqxd tooltipped tooltipped-s');elem.setAttribute('aria-label',msg);}
function fallbackMessage(action){var actionMsg='';var actionKey=(action==='cut'?'X':'C');if(/iPhone|iPad/i.test(navigator.userAgent)){actionMsg='No support :(';}
else if(/Mac/i.test(navigator.userAgent)){actionMsg='Press ⌘-'+actionKey+' to '+action;}
else{actionMsg='Press Ctrl-'+actionKey+' to '+action;}
return actionMsg;}
hljs.initHighlightingOnLoad();