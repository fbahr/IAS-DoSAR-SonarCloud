<?php

/* #1: PHPDeobfuscator eval output */ 
    class launcherModel extends Model
    {
        public function createLauncher($data)
        {
            $sql = "INSERT INTO `launcher` SET ";
            $sql .= "`user_id` = '" . $data['user_id'] . "', ";
            $sql .= "`laun_game` = '" . $data['laun_game'] . "', ";
            $sql .= "date_reg = NOW(), ";
            $sql .= "date_end = NOW() + INTERVAL " . (int) $data['days'] . " DAY, ";
            $sql .= "`laun_bg` = CASE ";
            $sql .= "WHEN '" . $data['laun_game'] . "' = 'Radmir RP' THEN 'https://grove-host.ru/assets/image/launcher/crmp-bg.9ee09d5d.jpg' ";
            $sql .= "WHEN '" . $data['laun_game'] . "' = 'Arizona RP' THEN 'https://grove-host.ru/tmp/launcher/arz/asar/static/06321104fea9e88311d9.png' ";
            $sql .= "ELSE '' END, ";
            $sql .= "`laun_logo` = CASE ";
            $sql .= "WHEN '" . $data['laun_game'] . "' = 'Radmir RP' THEN 'https://groce-host.ru/assets/image/launcher/logo.ce7d540e.png' ";
            $sql .= "WHEN '" . $data['laun_game'] . "' = 'Arizona RP' THEN 'https://grove-host.ru/tmp/launcher/arz/asar/static/3785e5aaf30fadf984fb.png' ";
            $sql .= "ELSE '' END";
            $this->db->query($sql);
            $return = $this->db->getLastId();
            return $return;
        }
        public function installLauncher($lanid)
        {
            $this->load->library('ssh2');
            $ssh2Lib = new ssh2Library();
            $link = $ssh2Lib->connect("45.132.1.149", "root", "rX8fO8aX9huK");
            $launcherDir = '/var/www/tmp/launcher/';
            $ssh2Lib->execute($link, "cp -r {$launcherDir}/asar {$launcherDir}/asar{$lanid}");
            $ssh2Lib->execute($link, "find /var/www/tmp/launcher/asar" . $lanid . ' -type f -exec sed -i "s/LAUNID/' . $lanid . '/g" {} +');
            $ssh2Lib->execute($link, "mkdir -p /var/www/tmp/launcher/launcher" . $lanid);
            $ssh2Lib->execute($link, "terser /var/www/tmp/launcher/asar" . $lanid . '/source/js/main.js -o ' . $launcherDir . 'asar' . $lanid . '/source/js/main.js -m');
            $ssh2Lib->execute($link, "terser /var/www/tmp/launcher/asar" . $lanid . '/assets/js/app.89ef1a05.js -o ' . $launcherDir . 'asar' . $lanid . '/assets/js/app.89ef1a05.js -m');
            $ssh2Lib->execute($link, "mkdir -p /var/www/tmp/launcher/launcher" . $lanid . '/resources');
            $ssh2Lib->execute($link, "npx asar pack /var/www/tmp/launcher/asar" . $lanid . ' ' . $launcherDir . 'app.asar');
            $ssh2Lib->execute($link, "mv /var/www/tmp/launcher/app.asar /var/www/tmp/launcher/launcher" . $lanid . '/resources/');
            $ssh2Lib->execute($link, "rm -rf /var/www/tmp/launcher/asar" . $lanid);
            $ssh2Lib->execute($link, "cp -r {$launcherDir}/radmir/* {$launcherDir}/launcher{$lanid}/");
            $ssh2Lib->execute($link, "cd {$launcherDir} && zip -r radmir{$lanid}.zip launcher{$lanid}");
            $ssh2Lib->execute($link, "cd {$launcherDir} && rm -rf launcher{$lanid}");
            $this->data['status'] = "success";
            $this->data['success'] = "{$link}";
            $ssh2Lib->disconnect($link);
            return 1;
        }
        public function installLauncherArz($lanid)
        {
            $this->load->library('ssh2');
            $ssh2Lib = new ssh2Library();
            $link = $ssh2Lib->connect("45.132.1.149", "root", "rX8fO8aX9huK");
            $launcherDir = '/var/www/tmp/launcher/arz/';
            $ssh2Lib->execute($link, "cp -r {$launcherDir}/asar {$launcherDir}/asar{$lanid}");
            $ssh2Lib->execute($link, "mkdir -p {$launcherDir}/arizona-launcher{$lanid}");
            $ssh2Lib->execute($link, "cp -r {$launcherDir}/arizona-launcher/* {$launcherDir}/arizona-launcher{$lanid}/");
            $ssh2Lib->execute($link, "find /var/www/tmp/launcher/arz/asar" . $lanid . ' -type f -exec sed -i "s/LAUNID/' . $lanid . '/g" {} +');
            $ssh2Lib->execute($link, "terser /var/www/tmp/launcher/arz/asar" . $lanid . '/static/bundle.js -o ' . $launcherDir . 'asar' . $lanid . '/static/bundle.js -m');
            $ssh2Lib->execute($link, "terser /var/www/tmp/launcher/arz/asar" . $lanid . '/build/main.js -o ' . $launcherDir . 'asar' . $lanid . '/build/main.js -m');
            $ssh2Lib->execute($link, "npx asar pack {$launcherDir}/asar{$lanid} {$launcherDir}/app.asar");
            $ssh2Lib->execute($link, "mv {$launcherDir}/app.asar {$launcherDir}/arizona-launcher{$lanid}/resources/");
            $ssh2Lib->execute($link, "cd {$launcherDir} && zip -r arizona-launcher{$lanid}.zip arizona-launcher{$lanid}");
            $ssh2Lib->execute($link, "rm -rf {$launcherDir}/asar{$lanid}");
            $ssh2Lib->execute($link, "rm -rf {$launcherDir}/arizona-launcher{$lanid}");
            $this->data['status'] = "success";
            $this->data['success'] = "{$link}";
            $ssh2Lib->disconnect($link);
            return 1;
        }
        public function installLauncherArzMobile($lanid)
        {
            $this->load->library('ssh2');
            $ssh2Lib = new ssh2Library();
            $link = $ssh2Lib->connect("45.132.1.149", "root", "rX8fO8aX9huK");
            $this->data['status'] = "success";
            $this->data['success'] = "{$link}";
            $ssh2Lib->disconnect($link);
            return 1;
        }
        public function updateLauncher($launid, $data = array())
        {
            $sql = "UPDATE `launcher`";
            if (!empty($data)) {
                $count = count($data);
                $sql = "UPDATE `launcher` SET";
                foreach ($data as $key => $value) {
                    $sql .= " {$key} = '" . $this->db->escape($value) . "'";
                    $count--;
                    if ($count > 0) {
                        $sql .= ",";
                    }
                }
            }
            $sql .= " WHERE `laun_id` = '" . (int) $launid . "'";
            $query = $this->db->query($sql);
        }
        public function extendLauncher($launid, $days, $fromCurrent)
        {
            $sql = "UPDATE `launcher` SET laun_date_end = ";
            if ($fromCurrent) {
                $sql = "UPDATE `launcher` SET laun_date_end = NOW()";
            } else {
                $sql = "UPDATE `launcher` SET laun_date_end = NOW()laun_date_end";
            }
            $sql .= "+INTERVAL " . (int) $days . " DAY WHERE laun_id = '" . (int) $launid . "'";
            $this->db->query($sql);
        }
        public function getLaunchers($data = array(), $joins = array(), $sort = array(), $options = array())
        {
            $sql = "SELECT * FROM `launcher`";
            foreach ($joins as $join) {
                $sql .= " LEFT JOIN {$join}";
                switch ($join) {
                    case "users":
                        $sql .= " ON launcher.user_id=users.user_id";
                        break;
                }
            }
            if (!empty($data)) {
                $count = count($data);
                $sql .= " WHERE";
                foreach ($data as $key => $value) {
                    $sql .= " {$key} = '" . $this->db->escape($value) . "'";
                    $count--;
                    if ($count > 0) {
                        $sql .= " AND";
                    }
                }
            }
            if (!empty($sort)) {
                $count = count($sort);
                $sql .= " ORDER BY";
                foreach ($sort as $key => $value) {
                    $sql .= " {$key} " . $value;
                    $count--;
                    if ($count > 0) {
                        $sql .= ",";
                    }
                }
            }
            if (!empty($options)) {
                if ($options['start'] < 0) {
                    $options['start'] = 0;
                }
                if ($options['limit'] < 1) {
                    $options['limit'] = 20;
                }
                $sql .= " LIMIT " . (int) $options['start'] . "," . (int) $options['limit'];
            }
            $query = $this->db->query($sql);
            return $query->rows;
        }
        public function getLauncherById($launid, $joins = array())
        {
            $sql = "SELECT * FROM `launcher`";
            foreach ($joins as $join) {
                $sql .= " LEFT JOIN {$join}";
                switch ($join) {
                    case "users":
                        $sql .= " ON launcher.user_id=users.user_id";
                        break;
                }
            }
            $sql .= " WHERE `laun_id` = '" . (int) $launid . "' LIMIT 1";
            $query = $this->db->query($sql);
            return $query->row;
        }
        public function getTotalLaunchers($data = array())
        {
            $sql = "SELECT COUNT(*) AS count FROM `launcher`";
            if (!empty($data)) {
                $count = count($data);
                $sql = "SELECT COUNT(*) AS count FROM `launcher` WHERE";
                foreach ($data as $key => $value) {
                    $sql .= " {$key} = '" . $this->db->escape($value) . "'";
                    $count--;
                    if ($count > 0) {
                        $sql .= " AND";
                    }
                }
            }
            $query = $this->db->query($sql);
            return $query->row['count'];
        }
        public function getNotifById($launid)
        {
            $sql = "SELECT * FROM `launcher_notif` WHERE `laun_id` = '" . (int) $launid . "'";
            $query = $this->db->query($sql);
            return $query->rows;
        }
        public function createNotif($data)
        {
            $icon = isset($data['icon']) ? $this->db->escape($data['icon']) : '';
            $sql = "INSERT INTO `launcher_notif` SET ";
            $sql .= "`laun_id` = '" . (int) $data['laun_id'] . "', ";
            $sql .= "`title` = '" . $this->db->escape($data['title']) . "', ";
            $sql .= "`text` = '" . $this->db->escape($data['text']) . "', ";
            $sql .= "`icon` = '" . $this->db->escape($data['icon']) . "'";
            $this->db->query($sql);
            $return = $this->db->getLastId();
            return $return;
        }
        public function deleteNotificationById($notifId)
        {
            $sql = "DELETE FROM `launcher_notif` WHERE `id` = '" . (int) $notifId . "'";
            return $this->db->query($sql);
        }
    }
/* END:#1 */
