 <?php 
defined("BASEPATH") or exit("No direct script access allowed");
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->ion_auth->logged_in()) {
            goto tc3T5;
        }
        redirect("auth");
        tc3T5:
        $this->load->model("Master_model", "master");
        $this->load->model("Dashboard_model", "dashboard");
        $this->load->model("Log_model", "logging");
        $this->load->model("Dropdown_model", "dropdown");
        $this->load->model("Cbt_model", "cbt");
    }
    public function admin_box($setting, $tp, $smt)
    {
        $where = '';
        if ($setting->jenjang == "1") {
            $where = "jenjang=0 OR jenjang=1";
            goto hnnNj;
        }
        if ($setting->jenjang == "2") {
            $where = "jenjang=2 OR jenjang=1";
            goto PZZb9;
        }
        PZZb9:
        hnnNj:
        $box = [["box" => "blue", "total" => $this->dashboard->total("master_siswa"), "title" => "Siswa", "url" => "datasiswa", "icon" => "users"], ["box" => "cyan", "total" => $this->dashboard->total("master_kelas", "id_tp=" . $tp . " AND id_smt=" . $smt), "title" => "Rombel", "url" => "datakelas", "icon" => "bell"], ["box" => "teal", "total" => $this->dashboard->total("master_guru"), "title" => "Guru", "url" => "dataguru", "icon" => "user"], ["box" => "fuchsia", "total" => $this->dashboard->totalWaliKelas($tp, $smt), "title" => "Wali Kelas", "url" => "dataguru", "icon" => "user"], ["box" => "success", "total" => $this->dashboard->total("master_mapel", $where), "title" => "Mapel", "url" => "datamapel", "icon" => "book"], ["box" => "yellow", "total" => $this->dashboard->total("master_ekstra"), "title" => "Ekstrakurikuler", "url" => "dataekstra", "icon" => "book"]];
        $info_box = json_decode(json_encode($box), FALSE);
        return $info_box;
    }
    public function guru_box($setting)
    {
        $where = '';
        if ($setting->jenjang == "1") {
            $where = "jenjang=0 OR jenjang=1";
            goto xdRqB;
        }
        if ($setting->jenjang == "2") {
            $where = "jenjang=2 OR jenjang=1";
            goto qHgWH;
        }
        qHgWH:
        xdRqB:
        $box = [["box" => "teal", "total" => $this->dashboard->total("master_kelas"), "title" => "Rombel", "icon" => "user"], ["box" => "blue", "total" => $this->dashboard->total("master_siswa"), "title" => "Siswa", "icon" => "users"], ["box" => "fuchsia", "total" => $this->dashboard->total("master_guru"), "title" => "Guru", "icon" => "user"], ["box" => "success", "total" => $this->dashboard->total("master_mapel", $where), "title" => "Mapel", "icon" => "book"]];
        $info_box = json_decode(json_encode($box), FALSE);
        return $info_box;
    }
    public function ujian_box()
    {
        $box = [["box" => "indigo", "total" => $this->dashboard->total("cbt_ruang"), "title" => "Ruang Ujian", "url" => "cbtruang", "icon" => "school"], ["box" => "maroon", "total" => $this->dashboard->total("cbt_sesi"), "title" => "Sesi", "url" => "cbtsesi", "icon" => "clock"], ["box" => "green", "total" => $this->dashboard->total("cbt_bank_soal"), "title" => "Bank Soal", "url" => "cbtbanksoal", "icon" => "folder"], ["box" => "teal", "total" => $this->dashboard->totalJadwal(), "title" => "Jadwal", "url" => "cbtjadwal", "icon" => "clock"]];
        $info_box = json_decode(json_encode($box), FALSE);
        return $info_box;
    }
    public function menu_siswa_box()
    {
        $box = [["title" => "Jadwal Pelajaran", "icon" => "ic_online.png", "link" => "siswa/jadwalpelajaran"], ["title" => "Materi", "icon" => "ic_elearning.png", "link" => "siswa/materi"], ["title" => "Tugas", "icon" => "ic_questions.png", "link" => "siswa/tugas"], ["title" => "Ujian / Ulangan", "icon" => "ic_question.png", "link" => "siswa/cbt"], ["title" => "Nilai Hasil", "icon" => "ic_exam.png", "link" => "siswa/hasil"], ["title" => "Absensi", "icon" => "ic_clipboard.png", "link" => "siswa/kehadiran"], ["title" => "Catatan Guru", "icon" => "ic_student.png", "link" => "siswa/catatan"]];
        $info_box = json_decode(json_encode($box), FALSE);
        return $info_box;
    }
    public function index()
    {
        $setting = $this->dashboard->getSetting();
        $user = $this->ion_auth->user()->row();
        $data = ["user" => $user, "judul" => "Beranda", "subjudul" => "Halaman Utama", "setting" => $setting];
        $tp = $this->dashboard->getTahunActive();
        $smt = $this->dashboard->getSemesterActive();
        $data["tp"] = $this->dashboard->getTahun();
        $data["tp_active"] = $tp;
        $data["smt"] = $this->dashboard->getSemester();
        $data["smt_active"] = $smt;
        $kelass = [];
        if (!($tp != null)) {
            goto ndXfP;
        }
        $kelass = $this->dropdown->getAllKelas($tp->id_tp, $smt->id_smt);
        ndXfP:
        $data["kelases"] = $kelass;
        $day = date("N", strtotime(date("Y-m-d")));
        $jadwal = $this->dashboard->loadJadwalHariIni($tp->id_tp, $smt->id_smt, null, $day);
        $kbms = $this->dashboard->getJadwalKbm($tp->id_tp, $smt->id_smt);
        foreach ($kbms as $kbm) {
            $kbm->istirahat = unserialize($kbm->istirahat);
        }
        $arrJadwalKelas = [];
        foreach ($jadwal as $key => $item) {
            $arrJadwalKelas[$item->id_kelas][$item->jam_ke] = $item;
        }
        $arrKbm = [];
        foreach ($kbms as $key => $item) {
            $arrKbm[$item->id_kelas] = $item;
        }
        if ($this->ion_auth->in_group("siswa")) {
            $siswa = $this->dashboard->getDataSiswa($user->username, $tp->id_tp, $smt->id_smt);
            if ($siswa == null) {
                $this->load->view("disable_login", $data);
                goto OYXsV;
            }
            $data["siswa"] = $siswa;
            $data["menu"] = $this->menu_siswa_box();
            $data["kbms"] = $arrKbm[$siswa->id_kelas] ?? null;
            $data["jadwals"] = $arrJadwalKelas[$siswa->id_kelas] ?? [];
            $data["running_text"] = $this->dashboard->getRunningText();
            $this->load->view("members/siswa/templates/header", $data);
            $this->load->view("members/siswa/dashboard");
            $this->load->view("members/siswa/templates/footer");
            OYXsV:
            goto I7Gw5;
        }
        $token = $this->cbt->getToken();
        $tkn["token"] = '';
        $tkn["auto"] = "0";
        $tkn["jarak"] = "1";
        $tkn["elapsed"] = "00:00:00";
        $data["token"] = $token != null ? $token : json_decode(json_encode($tkn));
        $data["ada_ujian"] = $this->cbt->getDataJadwalByTgl(date("Y-m-d"));
        $data["jadwals"] = $arrJadwalKelas;
        $data["kbms"] = $arrKbm;
        $data["mapels"] = $this->master->getAllMapel();
        $tglJadwals = $this->cbt->getAllJadwalByJenis(null, $tp->id_tp, $smt->id_smt);
        foreach ($tglJadwals as $tgl => $jadwalss) {
            foreach ($jadwalss as $mpl => $jadwals) {
                foreach ($jadwals as $jadwal) {
                    $jadwal->bank_kelas = unserialize($jadwal->bank_kelas);
                    foreach ($jadwal->bank_kelas as $kb) {
                        if (!($kb["kelas_id"] != '')) {
                            goto Oa_fr;
                        }
                        $p = $this->cbt->getKelasUjian($kb["kelas_id"]);
                        $jadwal->peserta[] = $p;
                        Oa_fr:
                    }
                }
            }
        }
        $data["jadwals_ujian"] = $tglJadwals;
        $data["pengawas"] = $this->cbt->getAllPengawas($tp->id_tp, $smt->id_smt, null, null);
        $data["ruangs"] = $this->cbt->getDistinctRuang($tp->id_tp, $smt->id_smt, []);
        $data["gurus"] = $this->dropdown->getAllGuru();
        if ($this->ion_auth->is_admin()) {
            $data["info_box"] = $this->admin_box($setting, $tp->id_tp, $smt->id_smt);
            $data["ujian_box"] = $this->ujian_box();
            $data["profile"] = $this->dashboard->getProfileAdmin($user->id);
            $this->load->view("_templates/dashboard/_header", $data);
            $this->load->view("dashboard");
            $this->load->view("_templates/dashboard/_footer");
            goto DCo_O;
        }
        if ($this->ion_auth->in_group("guru")) {
            $guru = $this->dashboard->getDataGuruByUserId($user->id, $tp->id_tp, $smt->id_smt);
            if ($guru == null) {
                $this->load->view("disable_login", $data);
                goto K0RDj;
            }
            $data["info_box"] = $this->admin_box($setting, $tp->id_tp, $smt->id_smt);
            $data["ujian_box"] = $this->ujian_box();
            $data["guru"] = $guru;
            $this->load->view("members/guru/templates/header", $data);
            $this->load->view("members/guru/dashboard");
            $this->load->view("members/guru/templates/footer");
            K0RDj:
            goto r05ZL;
        }
        r05ZL:
        DCo_O:
        I7Gw5:
    }
    public function checkTokenJadwal()
    {
        $data["ada_ujian"] = $this->cbt->getDataJadwalByTgl(date("Y-m-d"));
        $token = $this->cbt->getToken();
        $token->now = date("d-m-Y H:i:s");
        $data["token"] = $token;
        $this->output_json($data);
    }
    public function output_json($data, $encode = true)
    {
        if (!$encode) {
            goto CnUMu;
        }
        $data = json_encode($data);
        CnUMu:
        $this->output->set_content_type("application/json")->set_output($data);
    }
    public function gantiTahun()
    {
        $aktif = $this->input->post("active", true);
        $rows = count($this->input->post("tahun", true));
        $i = 0;
        gKU9P:
        if (!($i <= $rows)) {
            $this->dashboard->update("master_tp", $update, "id_tp", null, true);
            $data["update"] = $update;
            $data["status"] = true;
            $this->logging->saveLog(4, "mengganti tahun ajaran aktif");
            $this->output_json($data);
            // [PHPDeobfuscator] Implied return
            return;
        }
        $id_tp = $this->input->post("id_tp[" . $i . "]", true);
        $tahun = $this->input->post("tahun[" . $i . "]", true);
        if ($id_tp === $aktif) {
            $active = 1;
            goto ucBKx;
        }
        $active = 0;
        ucBKx:
        $update[] = array("id_tp" => $id_tp, "tahun" => $tahun, "active" => $active);
        $i++;
        goto gKU9P;
    }
    public function gantiSemester()
    {
        $aktif = $this->input->post("active", true);
        $rows = count($this->input->post("smt", true));
        $i = 1;
        bTDy_:
        if (!($i <= $rows)) {
            $this->dashboard->update("master_smt", $update, "id_smt", null, true);
            $data["update"] = $update;
            $data["status"] = true;
            $this->logging->saveLog(4, "mengganti semester aktif");
            $this->output_json($data);
            // [PHPDeobfuscator] Implied return
            return;
        }
        $id_smt = $this->input->post("id_smt[" . $i . "]", true);
        $smt = $this->input->post("smt[" . $i . "]", true);
        if ($id_smt === $aktif) {
            $active = 1;
            goto bz3JY;
        }
        $active = 0;
        bz3JY:
        $update[] = array("id_smt" => $id_smt, "smt" => $smt, "active" => $active);
        $i++;
        goto bTDy_;
    }
    public function getNotifikasi()
    {
    }
    public function getLog($limit)
    {
        $this->output_json($this->logging->loadAktifitas($limit));
    }
    public function hapusLog()
    {
        $this->db->trans_start();
        if ($this->db->empty_table("log")) {
            $deleted = ["status" => true, "message" => "berhasil"];
            goto SOvq1;
        }
        $deleted = ["status" => false, "message" => "gagal"];
        SOvq1:
        $this->db->trans_complete();
        $this->output_json($deleted);
    }
    public function getLogSiswa($limit)
    {
        $this->output_json($this->logging->loadAktifitasSiswa($limit));
    }
    public function getPengumuman($for)
    {
        $this->output_json($this->dashboard->loadPengumuman($for));
    }
    public function getJadwalHariIni($id_kelas, $id_hari)
    {
        $tp = $this->dashboard->getTahunActive();
        $smt = $this->dashboard->getSemesterActive();
        $this->output_json($this->dashboard->loadJadwalHariIni($tp->id_tp, $smt->id_smt, $id_kelas, $id_hari));
    }
    public function getJadwalKbm($id_kelas)
    {
        $tp = $this->dashboard->getTahunActive();
        $smt = $this->dashboard->getSemesterActive();
        $jadwal = $this->dashboard->getJadwalKbm($tp->id_tp, $smt->id_smt, $id_kelas);
        $istirahat = unserialize($jadwal->istirahat);
        $this->output_json(array("jadwal" => $jadwal, "istirahat" => $istirahat));
    }
}
