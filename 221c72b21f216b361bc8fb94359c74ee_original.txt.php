<?php

/*   __________________________________________________
    |  Obfuscated by YAK Pro - Php Obfuscator  2.0.14  |
    |              on 2023-09-13 10:53:52              |
    |    GitHub: https://github.com/pk-fr/yakpro-po    |
    |__________________________________________________|
*/
declare (strict_types=1);
namespace MlIxn\yoFcq\aK7tq\Hr_nW;

use function array_filter;
use function array_map;
use function array_merge;
use function array_values;
use function count;
use function preg_match;
use function preg_match_all;
use function preg_split;
use function realpath;
use function substr;
use function trim;
use RQ5c0\Lm7_y\XDQ1U;
use MLixn\k4pLD\TFUF2;
use ReflectionClass;
use ReflectionFunctionAbstract;
use ReflectionMethod;
final class kPDyM
{
    private const uC8Mq = "/@requires\\s+(?P<name>PHP(?:Unit)?)\\s+(?P<operator>[<>=!]{0,2})\\s*(?P<version>[\\d\\.-]+(dev|(RC|alpha|beta)[\\d\\.])?)[ \\t]*\\r?\$/m";
    private const inTES = "/@requires\\s+(?P<name>PHP(?:Unit)?)\\s+(?P<constraint>[\\d\\t \\-.|~^]+)[ \\t]*\\r?\$/m";
    private const NdwWR = "/@requires\\s+(?P<name>OS(?:FAMILY)?)\\s+(?P<value>.+?)[ \\t]*\\r?\$/m";
    private const EwiMk = "/@requires\\s+(?P<name>setting)\\s+(?P<setting>([^ ]+?))\\s*(?P<value>[\\w\\.-]+[\\w\\.]?)?[ \\t]*\\r?\$/m";
    private const o5Lsv = "/@requires\\s+(?P<name>function|extension)\\s+(?P<value>([^\\s<>=!]+))\\s*(?P<operator>[<>=!]{0,2})\\s*(?P<version>[\\d\\.-]+[\\d\\.]?)?[ \\t]*\\r?\$/m";
    private string $DVODL;
    private array $yZ6zf;
    private ?array $weB8e = null;
    private int $vx7w1;
    private string $jj_Vg;
    public static function YMGjB(ReflectionClass $QNAhx) : self
    {
        return new self((string) $QNAhx->getDocComment(), self::PtY5x($QNAhx), $QNAhx->getStartLine(), $QNAhx->getFileName());
    }
    public static function qfBBB(ReflectionMethod $Xlz3l, string $uWzTI) : self
    {
        return new self((string) $Xlz3l->getDocComment(), self::pty5x($Xlz3l), $Xlz3l->getStartLine(), $Xlz3l->getFileName());
    }
    private function __construct(string $WE8LS, array $X3qiB, int $NCcDh, string $tMcRf)
    {
        $this->DVODL = $WE8LS;
        $this->yZ6zf = $X3qiB;
        $this->vx7w1 = $NCcDh;
        $this->jj_Vg = $tMcRf;
    }
    public function HWq4M() : array
    {
        if (!($this->weB8e !== null)) {
            $U7F7k = $this->vx7w1;
            $UHaRr = [];
            $NRSjp = [];
            $jViCk = [];
            $OuGam = ["__FILE" => realpath($this->jj_Vg)];
            $y85is = preg_replace(["#^/\\*{2}#", "#\\*/\$#"], '', preg_split("/\\r\\n|\\r|\\n/", $this->DVODL));
            $U7F7k -= count($y85is);
            foreach ($y85is as $IUu8l) {
                if (!preg_match(self::NdwWR, $IUu8l, $KVswA)) {
                    goto IG8br;
                }
                $UHaRr[$KVswA["name"]] = $KVswA["value"];
                $OuGam[$KVswA["name"]] = $U7F7k;
                IG8br:
                if (!preg_match(self::uC8Mq, $IUu8l, $KVswA)) {
                    goto oWavf;
                }
                $UHaRr[$KVswA["name"]] = ["version" => $KVswA["version"], "operator" => $KVswA["operator"]];
                $OuGam[$KVswA["name"]] = $U7F7k;
                oWavf:
                if (!preg_match(self::inTES, $IUu8l, $KVswA)) {
                    goto DQSHt;
                }
                if (empty($UHaRr[$KVswA["name"]])) {
                    try {
                        $mn5VS = new XDQ1u();
                        $UHaRr[$KVswA["name"] . "_constraint"] = ["constraint" => $mn5VS->SAjqo(trim($KVswA["constraint"]))];
                        $OuGam[$KVswA["name"] . "_constraint"] = $U7F7k;
                    } catch (\rq5c0\lM7_y\Exception $xc2RB) {
                        throw new TFUF2($xc2RB->getMessage(), $xc2RB->getCode(), $xc2RB);
                    }
                    DQSHt:
                    if (!preg_match(self::EwiMk, $IUu8l, $KVswA)) {
                        goto A41Q1;
                    }
                    $NRSjp[$KVswA["setting"]] = $KVswA["value"];
                    $OuGam["__SETTING_" . $KVswA["setting"]] = $U7F7k;
                    A41Q1:
                    if (!preg_match(self::o5Lsv, $IUu8l, $KVswA)) {
                        goto x8Rwl;
                    }
                    $ZLjkG = $KVswA["name"] . "s";
                    if (isset($UHaRr[$ZLjkG])) {
                        goto TXazB;
                    }
                    $UHaRr[$ZLjkG] = [];
                    TXazB:
                    $UHaRr[$ZLjkG][] = $KVswA["value"];
                    $OuGam[$KVswA["name"] . "_" . $KVswA["value"]] = $U7F7k;
                    if (!($ZLjkG === "extensions" && !empty($KVswA["version"]))) {
                        goto YHOGb;
                    }
                    $jViCk[$KVswA["value"]] = ["version" => $KVswA["version"], "operator" => $KVswA["operator"]];
                    YHOGb:
                    x8Rwl:
                    $U7F7k++;
                    goto FoxLG;
                }
                $U7F7k++;
                FoxLG:
            }
            return $this->weB8e = array_merge($UHaRr, ["__OFFSET" => $OuGam], array_filter(["setting" => $NRSjp, "extension_versions" => $jViCk]));
        }
        return $this->weB8e;
    }
    public function LOhYd() : array
    {
        return $this->yZ6zf;
    }
    private static function crMWE(string $OgvY3) : array
    {
        $OgvY3 = substr($OgvY3, 3, -2);
        $ieFdK = [];
        if (!preg_match_all("/@(?P<name>[A-Za-z_-]+)(?:[ \\t]+(?P<value>.*?))?[ \\t]*\\r?\$/m", $OgvY3, $KVswA)) {
            goto lXlj6;
        }
        $WIhxG = count($KVswA[0]);
        $bTEDz = 0;
        nR4QM:
        if (!($bTEDz < $WIhxG)) {
            lXlj6:
            return $ieFdK;
        }
        $ieFdK[$KVswA["name"][$bTEDz]][] = (string) $KVswA["value"][$bTEDz];
        $bTEDz++;
        goto nR4QM;
    }
    private static function pTy5X(ReflectionClass|ReflectionFunctionAbstract $LxgXM) : array
    {
        $ieFdK = [];
        if (!$LxgXM instanceof ReflectionClass) {
            goto LW7Jy;
        }
        $ieFdK = array_merge($ieFdK, ...array_map(static function (ReflectionClass $MuxtH) : array {
            return self::cRmwE((string) $MuxtH->getDocComment());
        }, array_values($LxgXM->getTraits())));
        LW7Jy:
        return array_merge($ieFdK, self::crMwE((string) $LxgXM->getDocComment()));
    }
}
