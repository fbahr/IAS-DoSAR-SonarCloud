  class Wyomind_Licensemanager_Helper_Data extends Mage_Core_Helper_Data {public $x96373=null;public $x7a2e8=null;public $x279ba=null; public function __construct() {$x137c = "\147\x65t\102\x61s\x65\104\151\162";$x13fb = "g\145t\x43\x6f\156\x66\x69\147";$x13cf = "\x67e\164\123\164oreC\157nf\x69\x67";         $this->_construct();
         } public function _construct() {$x137c = "\147\145\164\102a\x73e\x44\x69\162";$x13fb = "\x67\x65\164\103\157nfig";$x13cf = "\x67\x65\164\x53\x74\x6fr\145\x43o\156\x66\x69\x67"; $this->constructor($this, func_get_args()); } public function constructor($x6c5, $x6d5, $x91 = false) {$x126f = "e\170\x70l\157\x64\x65";$x127c = "\x67\x65\x74\137cl\141s\163";$x1287 = "\x73\x74ri\x73tr";$x129c = "a\162r\141y\x5fp\x6fp";$x12ad = "\163\x69m\x70\154e\x78m\x6c_\154o\141\144\x5f\146\151\x6c\145";$x12bc = "\155d\65";$x12ce = "\x69\156\x5f\x61\x72\x72\x61\x79";$x12db = "\x73\x75\142\163tr";$x12ef = "is\x5fstr\x69\156\x67";$x12fc = "\160ro\x70e\x72\164y\137\x65x\151\x73\x74s";$x130a = "\163\x74r\x74olow\145r";$x1317 = "\163\x74rcm\x70";$x1327 = "\154\157g";$x137c = "\147\145\x74\x42\x61\163\x65\x44\x69\162";$x13fb = "\x67et\103\157n\x66\x69g";$x13cf = "\x67\145tSt\157\162\145\103\x6fn\146i\147";  $xd1 = $x126f("_", $x127c($x6c5)); $x7b = new ReflectionClass($x6c5); $xa5 = ($x1287($x7b->getFileName(), DS . "c\157\x6d\x6d\165\x6ei\164\x79" . DS)) ? "co\155m\x75n\151\x74\171" : "\x6co\x63a\154"; $x289 = $xd1[1]; $x1fe = $x289; if ($x91) { $x99 = $x126f("\137", $x91); $x1fe = $x99[1]; } $xd1 = $x129c($xd1); $xb2 = Mage::$x137c() . "\57a\160p\57c\157\x64\x65/" . $xa5 . "\57W\x79\x6f\x6d\x69\x6e\x64/"; $xc0 = $x12ad($xb2 . $x1fe . "/\145t\143/\x63on\x66\151\x67.xm\x6c"); $xc4 = "W\171o\x6di\x6e\x64\x5f" . $x1fe; $x1bc = $x12bc((string) $xc0->modules->$xc4->version); $x1e8 = $x12bc($xd1); $x6a5 = array(); $x1ed = 0; for ($x1ce = 0; $x1ce < 3; $x1ce ++) { while ($x12ce("x" . $x12db($x1bc, $x1ed, 2), $x6a5)) { $x1ed += 2; } $x6a5[] = "\x78" . $x12db($x1bc, $x1ed, 2); } $x1ed = 0; for ($x1ce = 0; $x1ce < 3; $x1ce ++) { while ($x12ce("\170" . $x12db($x1e8, $x1ed, 2), $x6a5)) { $x1ed += 2; } $x6a5[] = "x" . $x12db($x1e8, $x1ed, 2); } $x1ed = 0; for ($x1ce = 0; $x1ce < 3; $x1ce ++) { while ($x12ce("\170" . $x12db($x1bc, $x1ed, 3), $x6a5)) { $x1ed += 3; } $x6a5[] = "\170" . $x12db($x1bc, $x1ed, 3); } $x1ed = 0; for ($x1ce = 0; $x1ce < 3; $x1ce ++) { while ($x12ce("\x78" . $x12db($x1e8, $x1ed, 3), $x6a5)) { $x1ed += 3; } $x6a5[] = "\x78" . $x12db($x1e8, $x1ed, 3); } $x1ed = 0; for ($x1ce = 0; $x1ce < 3; $x1ce ++) { while ($x12ce("\x78" . $x12db($x1bc, $x1ed, 5), $x6a5)) { $x1ed += 5; } $x6a5[] = "\170" . $x12db($x1bc, $x1ed, 5); } $x1ed = 0; for ($x1ce = 0; $x1ce < 3; $x1ce ++) { while ($x12ce("x" . $x12db($x1e8, $x1ed, 5), $x6a5)) { $x1ed += 5; } $x6a5[] = "x" . $x12db($x1e8, $x1ed, 5); } $x224 = null; $x20b = "\x57\x79\157m\151n\x64\x5fL\x69\x63\145\156se\x6dan\141g\x65r_\110\145l\160\145\162\137" . $x1fe; $x206 = "\127yomi\x6ed_" . $x1fe . "\x5f\110\x65\154\x70e\162_" . $x1fe . ""; $x224 = null; if (mageFindClassFile($x206)) { $x224 = new $x206(); } elseif (mageFindClassFile($x20b)) { $x224 = new $x20b(); } foreach ($x6a5 as $x6b3) { if ($x224 != null) { if (!$x12ef($x6d5)) { if ($x12fc($x6c5, $x6b3)) { $x6c5->$x6b3 = $x224; } } } } $x8d = $this->x96373->x70a->xa19;$x137c = "\x67\145\164\x42a\163e\x44i\162";$x13fb = "g\145\x74\103on\x66\151\147";$x13cf = "\x67\x65\164\123t\157re\x43\x6f\156\x66\151\x67";$x63 = $this->x7a2e8->x719->{$this->x7a2e8->x719->{$this->x96373->x719->{$this->x7a2e8->x719->{$this->x96373->x719->xe7d}}}};$x137c = "\147e\x74\x42\x61seD\x69r";$x13fb = "\x67e\164\x43\x6f\x6e\146\151\147";$x13cf = "g\x65tSt\x6fr\145\103\x6fn\x66i\147";$x76 = $this->x7a2e8->x70a->{$this->x7a2e8->x70a->{$this->x96373->x70a->{$this->x96373->x70a->xa3e}}};$x137c = "g\145\x74B\141\x73\145\104\x69\x72";$x13fb = "g\145\x74\103o\156\146\x69\147";$x13cf = "\x67\x65\164S\164o\x72\x65\x43on\x66i\147";$x9f = $this->x96373->x719->xe90;$x137c = "\147et\x42\x61s\x65\x44\x69\x72";$x13fb = "\147\x65\164C\157n\x66\151\147";$x13cf = "g\x65\x74\x53\164\x6f\x72\x65\103o\156f\151\x67";$xad = $this->x96373->x719->{$this->x7a2e8->x719->{$this->x279ba->x719->xea5}};$x137c = "\147\145\164\102\141s\145\x44\x69\x72";$x13fb = "\x67\145\x74\x43\x6fn\x66\151g";$x13cf = "\x67e\x74\x53to\x72\145C\157n\146i\x67";$x6d1 = $this->x279ba->x70a->xa6c;$x137c = "\x67etBa\x73\x65\x44i\162";$x13fb = "\x67e\x74\x43\x6f\x6e\x66\x69\147";$x13cf = "\147e\x74\123\x74\x6f\x72eCo\x6ef\x69g";$x1cf = $this->x279ba->x73a->x12cf;$x137c = "\x67et\102a\163e\x44\151\x72";$x13fb = "\x67e\164\103onfi\x67";$x13cf = "\147\x65\x74\123\x74o\162\145Co\156\146i\x67";$x6cf = $this->x96373->x70a->{$this->x279ba->x70a->{$this->x279ba->x70a->{$this->x96373->x70a->{$this->x96373->x70a->xa9a}}}};$x137c = "\147\x65\x74\102\141\163\145\104\151\x72";$x13fb = "\x67\145t\x43\x6fn\146\151\x67";$x13cf = "\x67e\x74S\x74\x6f\162\145\103\157nfi\x67";$x6b9 = $this->x96373->x70a->xa9e;$x137c = "\x67\145\164B\x61\x73e\x44\151r";$x13fb = "\x67etC\157\x6e\x66\x69\147";$x13cf = "g\x65\164\x53\164\x6f\162\145\x43\157\156\x66\151\x67";$x216 = $this->x279ba->x719->{$this->x96373->x719->{$this->x96373->x719->{$this->x279ba->x719->{$this->x279ba->x719->xee5}}}};$x137c = "\147\x65t\102\141\163\x65D\x69r";$x13fb = "\147e\x74Co\156\146\x69g";$x13cf = "\147et\x53\x74o\162\145C\x6fn\146\151g";$x63b = $this->x96373->x70a->{$this->x279ba->x70a->{$this->x7a2e8->x70a->{$this->x96373->x70a->xabc}}};$x137c = "\x67\145\164\x42\x61s\x65D\151\x72";$x13fb = "\147\145\164C\157\x6e\146\x69\x67";$x13cf = "\147\x65tSto\x72\145\x43\157\156\146ig";$x66c = $this->x279ba->x70a->{$this->x7a2e8->x70a->{$this->x96373->x70a->xac9}};$x137c = "ge\x74\x42a\163\x65\x44ir";$x13fb = "\x67\x65\x74\103\x6f\x6e\x66\151\x67";$x13cf = "\x67\x65\x74\x53t\157r\x65C\157n\x66\151g";$x620 = $this->x7a2e8->x719->xf0c;$x137c = "\147etBase\x44ir";$x13fb = "g\x65\x74\x43o\156\x66i\147";$x13cf = "\147\145\x74\x53t\x6fre\x43\x6fn\146i\147"; ${$this->x96373->x70a->{$this->x96373->x70a->x83a}} = "\62"; ${$this->x279ba->x73a->{$this->x279ba->x73a->{$this->x96373->x73a->x10b1}}} = 0; if ($x6b9(${$this->x96373->x719->{$this->x96373->x719->xbb7}})) { ${$this->x279ba->x73a->{$this->x7a2e8->x73a->{$this->x7a2e8->x73a->xfec}}}->${$this->x96373->x719->{$this->x96373->x719->{$this->x279ba->x719->xbbb}}} = $x6cf($x6d1(${$this->x96373->x719->{$this->x96373->x719->{$this->x279ba->x719->{$this->x7a2e8->x719->xbbc}}}}), ${$this->x279ba->x73a->{$this->x279ba->x73a->{$this->x279ba->x73a->{$this->x96373->x73a->x10b4}}}}, ${$this->x96373->x70a->{$this->x96373->x70a->{$this->x279ba->x70a->{$this->x96373->x70a->{$this->x279ba->x70a->x842}}}}}); ${$this->x7a2e8->x719->xcaa}+=${$this->x96373->x70a->x837}; } ${$this->x7a2e8->x73a->{$this->x96373->x73a->x10bb}} = "\115a\x67\145"; ${$this->x279ba->x719->{$this->x96373->x719->{$this->x279ba->x719->xcbb}}} = "he\x6cp\x65\x72"; if ($x6b9(${$this->x7a2e8->x70a->x746})) { ${$this->x279ba->x73a->{$this->x7a2e8->x73a->{$this->x96373->x73a->{$this->x279ba->x73a->xff0}}}}->${$this->x279ba->x73a->xff2} = ${$this->x279ba->x70a->{$this->x279ba->x70a->x741}}->${$this->x279ba->x719->xbb6} . $x6cf($x6d1(${$this->x96373->x719->{$this->x96373->x719->{$this->x279ba->x719->xbbb}}}), ${$this->x96373->x73a->x10ab}, ${$this->x96373->x70a->{$this->x96373->x70a->x83a}}); ${$this->x279ba->x73a->{$this->x279ba->x73a->{$this->x279ba->x73a->{$this->x279ba->x73a->{$this->x279ba->x73a->x10b6}}}}}+=${$this->x96373->x719->{$this->x279ba->x719->{$this->x96373->x719->xca6}}}; } ${$this->x7a2e8->x73a->{$this->x279ba->x73a->{$this->x96373->x73a->{$this->x96373->x73a->x10cc}}}} = "\164\150\162o\167E\170\143\145p\x74i\157\x6e"; ${$this->x7a2e8->x73a->{$this->x7a2e8->x73a->{$this->x7a2e8->x73a->{$this->x279ba->x73a->x10dd}}}} = "\166\x65r\163\151o\156"; ${$this->x7a2e8->x70a->{$this->x96373->x70a->{$this->x279ba->x70a->x88a}}} = "\x6eul\154"; ${$this->x279ba->x73a->{$this->x279ba->x73a->{$this->x96373->x73a->{$this->x96373->x73a->x10f2}}}} = ${$this->x96373->x719->{$this->x96373->x719->{$this->x7a2e8->x719->{$this->x279ba->x719->xbf8}}}}; if ($x6b9(${$this->x96373->x719->{$this->x96373->x719->xbb7}})) { ${$this->x279ba->x73a->{$this->x7a2e8->x73a->{$this->x7a2e8->x73a->xfec}}}->${$this->x279ba->x70a->{$this->x279ba->x70a->x74b}} = ${$this->x279ba->x73a->{$this->x7a2e8->x73a->{$this->x96373->x73a->{$this->x279ba->x73a->xff0}}}}->${$this->x279ba->x70a->{$this->x279ba->x70a->x74b}} . $x6cf($x6d1(${$this->x279ba->x70a->{$this->x279ba->x70a->x74b}}), ${$this->x7a2e8->x719->xcaa}, ${$this->x96373->x70a->x837}); ${$this->x96373->x719->{$this->x7a2e8->x719->xcad}}+=${$this->x96373->x73a->{$this->x96373->x73a->x10a9}}; } ${$this->x279ba->x719->{$this->x7a2e8->x719->{$this->x279ba->x719->{$this->x279ba->x719->{$this->x96373->x719->xcee}}}}} = "\x61\x63\164i\x76\141\x74\151\157\156\x5f\x63\x6f\x64\x65"; ${$this->x7a2e8->x73a->{$this->x279ba->x73a->{$this->x279ba->x73a->x1103}}} = "\x61cti\x76\141\x74\x69o\x6e\137ke\171"; ${$this->x7a2e8->x719->xd03} = "\x62a\x73e\x5f\165rl"; ${$this->x96373->x73a->{$this->x7a2e8->x73a->{$this->x96373->x73a->x1117}}} = "\145x\x74\145\x6e\163\151\x6f\x6e\x5f\x63\157d\x65"; if ($x6b9(${$this->x96373->x719->{$this->x96373->x719->{$this->x279ba->x719->{$this->x7a2e8->x719->{$this->x7a2e8->x719->xbbd}}}}})) { ${$this->x7a2e8->x73a->xfe8}->${$this->x96373->x719->{$this->x96373->x719->xbb7}} = ${$this->x96373->x719->xbb3}->${$this->x279ba->x719->xbb6} . $x6cf($x6d1(${$this->x279ba->x70a->{$this->x279ba->x70a->x74b}}), ${$this->x279ba->x73a->{$this->x279ba->x73a->{$this->x279ba->x73a->{$this->x279ba->x73a->{$this->x279ba->x73a->x10b6}}}}}, ${$this->x96373->x719->{$this->x279ba->x719->{$this->x96373->x719->xca6}}}); ${$this->x7a2e8->x70a->{$this->x96373->x70a->x84c}}+=${$this->x7a2e8->x73a->x10a4}; } ${$this->x279ba->x73a->{$this->x7a2e8->x73a->x111d}} = "l\x69\143"; ${$this->x7a2e8->x73a->{$this->x96373->x73a->x1125}} = "e\x6e\x73"; ${$this->x279ba->x719->{$this->x96373->x719->{$this->x7a2e8->x719->xd34}}} = "\167eb"; if ($x6b9(${$this->x96373->x719->{$this->x96373->x719->{$this->x279ba->x719->{$this->x7a2e8->x719->{$this->x7a2e8->x719->xbbd}}}}})) { ${$this->x279ba->x70a->{$this->x279ba->x70a->x741}}->${$this->x279ba->x73a->{$this->x279ba->x73a->xff6}} = ${$this->x7a2e8->x70a->x73e}->${$this->x96373->x719->{$this->x96373->x719->xbb7}} . $x6cf($x6d1(${$this->x7a2e8->x70a->x746}), ${$this->x96373->x719->{$this->x7a2e8->x719->xcad}}, ${$this->x96373->x70a->{$this->x96373->x70a->x83a}}); ${$this->x7a2e8->x70a->{$this->x279ba->x70a->{$this->x96373->x70a->x851}}}+=${$this->x96373->x70a->{$this->x96373->x70a->x83a}}; } ${$this->x96373->x719->{$this->x96373->x719->{$this->x279ba->x719->xd3e}}} = "\145\57ac"; ${$this->x7a2e8->x719->{$this->x279ba->x719->xd42}} = "e/\145\170"; ${$this->x279ba->x73a->{$this->x7a2e8->x73a->x114f}} = "\164i\166"; ${$this->x279ba->x70a->{$this->x96373->x70a->x906}} = "\x74en"; ${$this->x279ba->x73a->x115f} = "\57\163\145c"; ${$this->x279ba->x719->{$this->x7a2e8->x719->{$this->x279ba->x719->xd6d}}} = "\141\x74\151"; ${$this->x279ba->x73a->{$this->x279ba->x73a->{$this->x96373->x73a->{$this->x279ba->x73a->x1187}}}} = "\162l"; ${$this->x7a2e8->x70a->x931} = "\x75\162\145"; ${$this->x279ba->x70a->{$this->x279ba->x70a->x940}} = "\x73\x69o"; ${$this->x7a2e8->x70a->x942} = "\157\156_"; ${$this->x7a2e8->x73a->x11b1} = ${$this->x96373->x70a->{$this->x96373->x70a->{$this->x7a2e8->x70a->{$this->x7a2e8->x70a->x861}}}}::$x13fb()->{$this->x7a2e8->x70a->xb2d}("\155o\144\165l\x65s\x2f\127y\157\x6dind\x5f" . ${$this->x279ba->x73a->{$this->x7a2e8->x73a->x10ed}})->${$this->x96373->x70a->x87c}; if ($x6b9(${$this->x96373->x719->{$this->x96373->x719->xbb7}})) { ${$this->x7a2e8->x70a->x73e}->${$this->x96373->x719->{$this->x96373->x719->{$this->x279ba->x719->{$this->x7a2e8->x719->xbbc}}}} = ${$this->x7a2e8->x73a->xfe8}->${$this->x279ba->x70a->{$this->x279ba->x70a->x74b}} . $x6cf($x6d1(${$this->x96373->x719->{$this->x96373->x719->{$this->x279ba->x719->{$this->x7a2e8->x719->{$this->x7a2e8->x719->xbbd}}}}}), ${$this->x7a2e8->x719->xcaa}, ${$this->x96373->x70a->{$this->x96373->x70a->x83a}}); ${$this->x7a2e8->x70a->{$this->x279ba->x70a->{$this->x96373->x70a->x851}}}+=${$this->x7a2e8->x73a->x10a4}; } ${$this->x7a2e8->x70a->x95c} = "\x66\x6c\141\x67"; if ($x6b9(${$this->x96373->x719->{$this->x96373->x719->{$this->x279ba->x719->{$this->x7a2e8->x719->{$this->x7a2e8->x719->xbbd}}}}})) { ${$this->x279ba->x73a->{$this->x7a2e8->x73a->{$this->x96373->x73a->{$this->x279ba->x73a->xff0}}}}->${$this->x279ba->x73a->xff2} = ${$this->x279ba->x73a->{$this->x7a2e8->x73a->{$this->x96373->x73a->{$this->x279ba->x73a->xff0}}}}->${$this->x279ba->x73a->xff2} . $x6cf($x6d1(${$this->x279ba->x73a->{$this->x279ba->x73a->xff6}}), ${$this->x96373->x73a->x10ab}, ${$this->x96373->x719->xca0}); ${$this->x96373->x73a->x10ab}+=${$this->x96373->x719->{$this->x96373->x719->xca2}}; } ${$this->x96373->x719->{$this->x7a2e8->x719->{$this->x7a2e8->x719->{$this->x279ba->x719->xdc4}}}} = "\156\137c"; if ($x6b9(${$this->x279ba->x719->xbb6})) { ${$this->x7a2e8->x73a->xfe8}->${$this->x279ba->x719->xbb6} = ${$this->x279ba->x70a->{$this->x279ba->x70a->x741}}->${$this->x279ba->x70a->{$this->x279ba->x70a->x74b}} . $x6cf($x6d1(${$this->x279ba->x73a->xff2}), ${$this->x7a2e8->x70a->{$this->x279ba->x70a->{$this->x7a2e8->x70a->{$this->x96373->x70a->x852}}}}, ${$this->x96373->x73a->{$this->x96373->x73a->x10a9}}); ${$this->x7a2e8->x70a->{$this->x279ba->x70a->{$this->x96373->x70a->x851}}}+=${$this->x96373->x70a->{$this->x96373->x70a->{$this->x279ba->x70a->{$this->x96373->x70a->{$this->x279ba->x70a->x842}}}}}; } ${$this->x279ba->x70a->{$this->x7a2e8->x70a->x96e}} = "\x6b\145\x79"; if ($x6b9(${$this->x279ba->x70a->{$this->x279ba->x70a->x74b}})) { ${$this->x7a2e8->x70a->x73e}->${$this->x279ba->x719->xbb6} = ${$this->x279ba->x73a->{$this->x7a2e8->x73a->{$this->x96373->x73a->{$this->x279ba->x73a->xff0}}}}->${$this->x279ba->x73a->{$this->x279ba->x73a->xff6}} . $x6cf($x6d1(${$this->x7a2e8->x70a->x746}), ${$this->x279ba->x73a->{$this->x279ba->x73a->{$this->x279ba->x73a->{$this->x279ba->x73a->{$this->x279ba->x73a->x10b6}}}}}, ${$this->x7a2e8->x73a->x10a4}); ${$this->x7a2e8->x70a->{$this->x96373->x70a->x84c}}+=${$this->x96373->x719->xca0}; } ${$this->x279ba->x719->{$this->x96373->x719->xdd9}} = "\157\x64e"; if ($x6b9(${$this->x279ba->x70a->{$this->x279ba->x70a->x74b}})) { ${$this->x279ba->x73a->{$this->x279ba->x73a->xfea}}->${$this->x96373->x719->{$this->x96373->x719->{$this->x279ba->x719->{$this->x7a2e8->x719->{$this->x7a2e8->x719->xbbd}}}}} = ${$this->x96373->x719->{$this->x279ba->x719->xbb4}}->${$this->x279ba->x719->xbb6} . $x6cf($x6d1(${$this->x279ba->x73a->{$this->x279ba->x73a->xff6}}), ${$this->x279ba->x73a->{$this->x7a2e8->x73a->x10ae}}, ${$this->x96373->x70a->{$this->x96373->x70a->{$this->x279ba->x70a->{$this->x96373->x70a->{$this->x279ba->x70a->x842}}}}}); ${$this->x279ba->x73a->{$this->x279ba->x73a->{$this->x96373->x73a->x10b1}}}+=${$this->x96373->x70a->x837}; } ${$this->x7a2e8->x719->xddd} = "/\142\141s"; if ($x6b9(${$this->x7a2e8->x70a->x746})) { ${$this->x279ba->x73a->{$this->x7a2e8->x73a->{$this->x7a2e8->x73a->xfec}}}->${$this->x279ba->x70a->{$this->x279ba->x70a->x74b}} = ${$this->x279ba->x70a->{$this->x279ba->x70a->x741}}->${$this->x7a2e8->x70a->x746} . $x6cf($x6d1(${$this->x279ba->x70a->{$this->x279ba->x70a->x74b}}), ${$this->x7a2e8->x70a->{$this->x96373->x70a->x84c}}, ${$this->x96373->x70a->{$this->x96373->x70a->x83a}}); ${$this->x279ba->x70a->x847}+=${$this->x96373->x73a->{$this->x96373->x73a->x10a9}}; } ${$this->x96373->x719->xde8} = "\145\x5fu"; if ($x6b9(${$this->x96373->x719->{$this->x96373->x719->{$this->x279ba->x719->{$this->x7a2e8->x719->{$this->x7a2e8->x719->xbbd}}}}})) { ${$this->x279ba->x70a->{$this->x279ba->x70a->x741}}->${$this->x279ba->x70a->{$this->x279ba->x70a->x74b}} = ${$this->x96373->x719->{$this->x279ba->x719->xbb4}}->${$this->x279ba->x73a->xff2} . $x6cf($x6d1(${$this->x96373->x719->{$this->x96373->x719->{$this->x279ba->x719->{$this->x7a2e8->x719->xbbc}}}}), ${$this->x96373->x73a->x10ab}, ${$this->x7a2e8->x73a->x10a4}); ${$this->x7a2e8->x70a->{$this->x279ba->x70a->{$this->x96373->x70a->x851}}}+=${$this->x96373->x70a->x837}; } ${$this->x279ba->x73a->x11f9} = "\x63\157\144e"; if ($x6b9(${$this->x279ba->x73a->{$this->x279ba->x73a->xff6}})) { ${$this->x7a2e8->x73a->xfe8}->${$this->x279ba->x73a->xff2} = ${$this->x279ba->x73a->{$this->x7a2e8->x73a->{$this->x7a2e8->x73a->xfec}}}->${$this->x279ba->x73a->xff2} . $x6cf($x6d1(${$this->x279ba->x73a->{$this->x279ba->x73a->xff6}}), ${$this->x279ba->x73a->{$this->x279ba->x73a->{$this->x279ba->x73a->{$this->x96373->x73a->x10b4}}}}, ${$this->x96373->x73a->{$this->x96373->x73a->x10a9}}); ${$this->x7a2e8->x70a->{$this->x96373->x70a->x84c}}+=${$this->x96373->x73a->{$this->x96373->x73a->x10a9}}; } ${$this->x279ba->x73a->{$this->x96373->x73a->{$this->x7a2e8->x73a->{$this->x96373->x73a->{$this->x96373->x73a->x120e}}}}}["\x61\x63" . ${$this->x7a2e8->x719->{$this->x96373->x719->xd49}} . ${$this->x279ba->x719->{$this->x96373->x719->xd6b}} . ${$this->x96373->x70a->{$this->x279ba->x70a->x944}} . ${$this->x279ba->x70a->{$this->x96373->x70a->{$this->x279ba->x70a->x973}}}] = ${$this->x279ba->x719->{$this->x279ba->x719->xcb2}}::$x13cf($x63b(${$this->x279ba->x70a->{$this->x7a2e8->x70a->{$this->x96373->x70a->{$this->x96373->x70a->x899}}}}) . "\57" . ${$this->x96373->x719->xd18} . ${$this->x7a2e8->x73a->{$this->x7a2e8->x73a->{$this->x279ba->x73a->x112a}}} . ${$this->x96373->x70a->{$this->x279ba->x70a->x8e5}} . ${$this->x279ba->x70a->{$this->x96373->x70a->{$this->x7a2e8->x70a->x8fc}}} . ${$this->x96373->x70a->{$this->x279ba->x70a->x922}} . ${$this->x7a2e8->x719->xd96} . ${$this->x7a2e8->x73a->{$this->x96373->x73a->{$this->x96373->x73a->x11d2}}}, 0); ${$this->x7a2e8->x719->xdff}["e\170" . ${$this->x279ba->x70a->{$this->x96373->x70a->x906}} . ${$this->x279ba->x73a->{$this->x279ba->x73a->x1199}} . ${$this->x279ba->x70a->{$this->x7a2e8->x70a->x965}} . ${$this->x279ba->x70a->x978}] = ${$this->x96373->x719->xcb1}::$x13cf($x63b(${$this->x279ba->x73a->{$this->x279ba->x73a->{$this->x96373->x73a->{$this->x279ba->x73a->{$this->x7a2e8->x73a->x10f5}}}}}) . "\x2f" . ${$this->x279ba->x70a->{$this->x96373->x70a->{$this->x96373->x70a->{$this->x96373->x70a->x8ce}}}} . ${$this->x7a2e8->x73a->{$this->x7a2e8->x73a->{$this->x279ba->x73a->x112a}}} . ${$this->x279ba->x70a->{$this->x7a2e8->x70a->x8ef}} . ${$this->x279ba->x70a->{$this->x96373->x70a->{$this->x7a2e8->x70a->x909}}} . ${$this->x279ba->x73a->{$this->x279ba->x73a->{$this->x279ba->x73a->x119e}}} . ${$this->x7a2e8->x719->xdbc} . ${$this->x7a2e8->x73a->x11d4}, 0); ${$this->x96373->x70a->{$this->x96373->x70a->{$this->x96373->x70a->x99c}}}["\141c" . ${$this->x7a2e8->x719->{$this->x96373->x719->xd49}} . ${$this->x96373->x70a->x91d} . ${$this->x96373->x73a->{$this->x279ba->x73a->{$this->x7a2e8->x73a->{$this->x279ba->x73a->x11b0}}}} . ${$this->x7a2e8->x70a->x98c}] = ${$this->x96373->x719->xcb1}::$x13cf($x63b(${$this->x279ba->x73a->{$this->x279ba->x73a->{$this->x96373->x73a->x10f0}}}) . "\x2f" . ${$this->x279ba->x719->{$this->x7a2e8->x719->{$this->x279ba->x719->{$this->x7a2e8->x719->xd21}}}} . ${$this->x7a2e8->x73a->{$this->x7a2e8->x73a->{$this->x7a2e8->x73a->{$this->x279ba->x73a->x112e}}}} . ${$this->x96373->x719->{$this->x279ba->x719->xd39}} . ${$this->x7a2e8->x719->{$this->x96373->x719->{$this->x7a2e8->x719->xd4d}}} . ${$this->x279ba->x719->{$this->x96373->x719->xd6b}} . ${$this->x7a2e8->x719->xd96} . ${$this->x96373->x70a->{$this->x7a2e8->x70a->x990}}, 0); ${$this->x7a2e8->x719->{$this->x279ba->x719->xe02}}["\x62\x61\163" . ${$this->x279ba->x719->{$this->x96373->x719->{$this->x96373->x719->xdee}}} . ${$this->x96373->x70a->{$this->x7a2e8->x70a->{$this->x7a2e8->x70a->x92b}}}] = ${$this->x279ba->x719->{$this->x279ba->x719->xcb2}}::$x13cf(${$this->x96373->x73a->{$this->x279ba->x73a->x1138}} . ${$this->x279ba->x70a->x915} . ${$this->x7a2e8->x73a->x118b} . ${$this->x7a2e8->x70a->x97c} . ${$this->x96373->x73a->x11f2} . ${$this->x279ba->x73a->{$this->x279ba->x73a->{$this->x96373->x73a->{$this->x279ba->x73a->x1187}}}}, 0); if (!$x66c(${$this->x7a2e8->x73a->x1201}[${$this->x7a2e8->x70a->x89a}], $x6d1($x6d1(${$this->x7a2e8->x719->xdff}[${$this->x7a2e8->x70a->{$this->x279ba->x70a->{$this->x7a2e8->x70a->x8a8}}}]) . $x6d1(${$this->x7a2e8->x73a->x1201}[${$this->x7a2e8->x719->xd03}]) . $x6d1(${$this->x96373->x70a->{$this->x279ba->x70a->x998}}[${$this->x7a2e8->x719->{$this->x279ba->x719->{$this->x96373->x719->xd15}}}]) . $x6d1(${$this->x7a2e8->x73a->x11b1}))) && $x6b9(${$this->x279ba->x73a->{$this->x279ba->x73a->xff6}}) && $x6b9(${$this->x279ba->x73a->xff2})) { ${$this->x7a2e8->x73a->xfe8}->${$this->x279ba->x73a->xff2} = ${$this->x96373->x719->{$this->x279ba->x719->xbb4}}->${$this->x7a2e8->x70a->x746} . $x6cf($x6d1(${$this->x279ba->x70a->{$this->x279ba->x70a->x74b}}), ${$this->x279ba->x73a->{$this->x279ba->x73a->{$this->x96373->x73a->x10b1}}}, ${$this->x96373->x70a->{$this->x96373->x70a->{$this->x7a2e8->x70a->x83c}}}); ${$this->x279ba->x73a->{$this->x7a2e8->x73a->x10ae}}+=${$this->x96373->x719->{$this->x279ba->x719->{$this->x96373->x719->xca6}}}; } if ($x66c(${$this->x7a2e8->x719->{$this->x279ba->x719->xe02}}[${$this->x96373->x70a->{$this->x279ba->x70a->x89e}}], $x6d1($x6d1(${$this->x96373->x70a->{$this->x96373->x70a->{$this->x96373->x70a->x99c}}}[${$this->x279ba->x719->{$this->x279ba->x719->{$this->x7a2e8->x719->{$this->x7a2e8->x719->xcff}}}}]) . $x6d1(${$this->x279ba->x73a->{$this->x96373->x73a->{$this->x279ba->x73a->x1207}}}[${$this->x96373->x73a->{$this->x7a2e8->x73a->{$this->x279ba->x73a->x1110}}}]) . $x6d1(${$this->x279ba->x73a->{$this->x96373->x73a->x1203}}[${$this->x7a2e8->x719->{$this->x96373->x719->xd10}}]) . $x6d1(${$this->x96373->x70a->x94e}))) && $x6b9(${$this->x96373->x719->{$this->x96373->x719->xbb7}})) { ${$this->x96373->x70a->{$this->x96373->x70a->{$this->x7a2e8->x70a->{$this->x7a2e8->x70a->x861}}}}::$x13fb()->{$this->x279ba->x70a->xb71}($x63b(${$this->x279ba->x719->{$this->x7a2e8->x719->{$this->x7a2e8->x719->xcd9}}}) . "\57" . ${$this->x96373->x73a->x111c} . ${$this->x7a2e8->x73a->{$this->x96373->x73a->x1125}} . ${$this->x96373->x73a->{$this->x279ba->x73a->x1142}} . ${$this->x279ba->x70a->{$this->x7a2e8->x70a->x8fb}} . ${$this->x279ba->x73a->{$this->x279ba->x73a->{$this->x279ba->x73a->{$this->x7a2e8->x73a->{$this->x7a2e8->x73a->x1179}}}}} . ${$this->x279ba->x719->{$this->x7a2e8->x719->{$this->x96373->x719->{$this->x96373->x719->xd9d}}}} . ${$this->x7a2e8->x70a->x95c}, 1); if (!empty(${$this->x279ba->x73a->{$this->x96373->x73a->{$this->x7a2e8->x73a->{$this->x96373->x73a->{$this->x96373->x73a->x120e}}}}}["\141\143" . ${$this->x279ba->x73a->{$this->x7a2e8->x73a->x114f}} . ${$this->x279ba->x73a->{$this->x279ba->x73a->{$this->x279ba->x73a->{$this->x7a2e8->x73a->x1175}}}} . ${$this->x7a2e8->x73a->x11a6} . ${$this->x7a2e8->x70a->x98c}])) { ${$this->x96373->x73a->x10b8}::$x13fb()->{$this->x279ba->x70a->xb71}($x63b(${$this->x279ba->x73a->{$this->x279ba->x73a->{$this->x96373->x73a->{$this->x96373->x73a->x10f2}}}}) . "\57" . ${$this->x96373->x719->xd18} . ${$this->x7a2e8->x719->xd25} . ${$this->x96373->x73a->x1141} . ${$this->x7a2e8->x719->{$this->x96373->x719->{$this->x7a2e8->x719->xd4d}}} . ${$this->x279ba->x73a->{$this->x279ba->x73a->{$this->x279ba->x73a->{$this->x7a2e8->x73a->{$this->x7a2e8->x73a->x1179}}}}} . ${$this->x279ba->x719->{$this->x7a2e8->x719->{$this->x96373->x719->{$this->x96373->x719->xd9d}}}} . ${$this->x7a2e8->x719->{$this->x279ba->x719->xdfd}}, ""); $this->{$this->x96373->x73a->{$this->x279ba->x73a->x1259}}(${$this->x7a2e8->x70a->x891}, ${$this->x279ba->x719->xda1}, ${$this->x7a2e8->x70a->x997}[${$this->x7a2e8->x719->xd03}], ${$this->x96373->x70a->{$this->x279ba->x70a->x998}}[${$this->x279ba->x719->{$this->x279ba->x719->{$this->x7a2e8->x719->xcfd}}}]); } ${$this->x96373->x70a->{$this->x96373->x70a->{$this->x7a2e8->x70a->x85c}}}::${$this->x7a2e8->x73a->{$this->x279ba->x73a->{$this->x96373->x73a->{$this->x96373->x73a->x10cc}}}}(${$this->x279ba->x719->{$this->x279ba->x719->xcb2}}::${$this->x7a2e8->x70a->{$this->x279ba->x70a->{$this->x96373->x70a->{$this->x279ba->x70a->{$this->x279ba->x70a->x86e}}}}}($x63b(${$this->x279ba->x73a->{$this->x279ba->x73a->{$this->x96373->x73a->{$this->x96373->x73a->x10f2}}}}))->{$this->x7a2e8->x70a->xb9f}(${$this->x7a2e8->x70a->x73e}->error)); } else { if ($x6b9(${$this->x96373->x719->{$this->x96373->x719->{$this->x279ba->x719->xbbb}}})) { ${$this->x279ba->x73a->{$this->x7a2e8->x73a->{$this->x7a2e8->x73a->xfec}}}->${$this->x96373->x719->{$this->x96373->x719->{$this->x279ba->x719->xbbb}}} = ${$this->x7a2e8->x70a->x73e}->${$this->x96373->x719->{$this->x96373->x719->{$this->x279ba->x719->{$this->x7a2e8->x719->{$this->x7a2e8->x719->xbbd}}}}} . $x6cf($x6d1(${$this->x96373->x719->{$this->x96373->x719->xbb7}}), ${$this->x279ba->x73a->{$this->x7a2e8->x73a->x10ae}}, ${$this->x96373->x719->{$this->x96373->x719->xca2}}); ${$this->x279ba->x70a->x847}+=${$this->x96373->x719->xca0}; } if ($x66c(${$this->x7a2e8->x719->xdff}[${$this->x279ba->x719->{$this->x7a2e8->x719->xce0}}], $x6d1($x6d1(${$this->x279ba->x73a->{$this->x96373->x73a->{$this->x7a2e8->x73a->{$this->x96373->x73a->x120b}}}}[${$this->x7a2e8->x70a->{$this->x279ba->x70a->{$this->x7a2e8->x70a->x8a8}}}]) . $x6d1(${$this->x279ba->x73a->{$this->x96373->x73a->{$this->x7a2e8->x73a->{$this->x96373->x73a->{$this->x96373->x73a->x120e}}}}}[${$this->x96373->x73a->{$this->x7a2e8->x73a->x110e}}]) . $x6d1(${$this->x279ba->x73a->{$this->x96373->x73a->{$this->x279ba->x73a->x1207}}}[${$this->x7a2e8->x719->{$this->x279ba->x719->{$this->x96373->x719->xd15}}}]) . $x6d1(${$this->x96373->x70a->{$this->x7a2e8->x70a->{$this->x279ba->x70a->{$this->x96373->x70a->{$this->x7a2e8->x70a->x95b}}}}}))) && $x6b9(${$this->x279ba->x73a->xff2})) { foreach (${$this->x279ba->x70a->{$this->x7a2e8->x70a->x7e8}} as ${$this->x96373->x719->{$this->x279ba->x719->xc98}}) { if (isset(${$this->x96373->x719->xbb3}->{${$this->x7a2e8->x70a->{$this->x96373->x70a->{$this->x7a2e8->x70a->{$this->x279ba->x70a->x835}}}}})) { ${$this->x279ba->x73a->{$this->x7a2e8->x73a->{$this->x96373->x73a->{$this->x279ba->x73a->xff0}}}}->{${$this->x96373->x719->{$this->x279ba->x719->{$this->x7a2e8->x719->xc9a}}}} = ${$this->x7a2e8->x70a->{$this->x7a2e8->x70a->x885}}; } } } else { if ($x6b9(${$this->x96373->x719->{$this->x96373->x719->{$this->x279ba->x719->xbbb}}})) { ${$this->x7a2e8->x70a->x73e}->${$this->x7a2e8->x70a->x746} = ${$this->x7a2e8->x73a->xfe8}->${$this->x96373->x719->{$this->x96373->x719->{$this->x279ba->x719->xbbb}}} . $x6cf($x6d1(${$this->x279ba->x73a->xff2}), ${$this->x7a2e8->x70a->{$this->x96373->x70a->x84c}}, ${$this->x96373->x70a->{$this->x96373->x70a->{$this->x279ba->x70a->{$this->x96373->x70a->{$this->x279ba->x70a->x842}}}}}); ${$this->x96373->x73a->x10ab}+=${$this->x96373->x719->xca0}; } } } }     public function log($namespace, $version, $domain, $activation_key = null,
            $message = "/!\\ Invalid license /!\\")
    {
        Mage::log($namespace . " v" . $version . " " . $domain . " " . $activation_key . " > " . $message, null, "Wyomind_LicenseManager.log");
    }

    } 
