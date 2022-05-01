/*
Navicat MySQL Data Transfer

Source Server         : kenrsfmuser
Source Server Version : 50723
Source Host           : localhost:3306
Source Database       : kernsfm

Target Server Type    : MYSQL
Target Server Version : 50723
File Encoding         : 65001

Date: 2020-03-12 22:19:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `department`
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `leader` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of department
-- ----------------------------
INSERT INTO `department` VALUES ('1', 'Technik', '0');
INSERT INTO `department` VALUES ('2', 'Einkauf', '0');
INSERT INTO `department` VALUES ('3', 'Versand', '0');
INSERT INTO `department` VALUES ('4', 'Lager', '0');
INSERT INTO `department` VALUES ('5', 'Service', '0');
INSERT INTO `department` VALUES ('6', 'Entwicklung', '0');

-- ----------------------------
-- Table structure for `entry_history`
-- ----------------------------
DROP TABLE IF EXISTS `entry_history`;
CREATE TABLE `entry_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entry` int(11) NOT NULL,
  `creator` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `project_owner` int(11) DEFAULT NULL,
  `project_creator` int(11) DEFAULT NULL,
  `entry_type` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of entry_history
-- ----------------------------
INSERT INTO `entry_history` VALUES ('64', '15', '3', 'aGFzIGFkZCBTb2x1dGlvbg==', null, null, null, '2020-01-24 14:24:45');
INSERT INTO `entry_history` VALUES ('65', '15', '3', 'aGFzIGNsb3NlZCBQcm9ibGVt', null, null, null, '2020-01-24 14:24:55');
INSERT INTO `entry_history` VALUES ('66', '17', '0', 'aGFzIGNoYW5nZWQgU3RhdHVz', '3', '3', '0', '2020-01-25 19:45:28');
INSERT INTO `entry_history` VALUES ('67', '8', '3', 'aGFzIGVkaXQgc29sdXRpb24gVGltZQ==', '2', '2', '2', '2020-01-26 13:22:52');
INSERT INTO `entry_history` VALUES ('68', '8', '3', 'aGFzIGFkZCBTb2x1dGlvbg==', '2', '2', '1', '2020-01-26 13:23:07');
INSERT INTO `entry_history` VALUES ('69', '8', '3', 'aGFzIGNsb3NlZCBQcm9ibGVt', '2', '2', '3', '2020-01-26 13:23:27');
INSERT INTO `entry_history` VALUES ('70', '10', '0', 'aGFzIGNoYW5nZWQgU3RhdHVz', '3', '1', '0', '2020-01-31 02:40:15');
INSERT INTO `entry_history` VALUES ('71', '10', '3', 'aGFzIGNsb3NlZCBQcm9ibGVt', '3', '1', '3', '2020-02-03 14:57:15');
INSERT INTO `entry_history` VALUES ('72', '17', '3', 'aGFzIGVkaXQgc29sdXRpb24gVGltZQ==', '3', '3', '2', '2020-02-03 14:57:36');
INSERT INTO `entry_history` VALUES ('73', '16', '3', 'aGFzIGNsb3NlZCBQcm9ibGVt', '3', '3', '3', '2020-02-03 14:57:54');
INSERT INTO `entry_history` VALUES ('74', '11', '3', 'aGFzIGNsb3NlZCBQcm9ibGVt', '3', '1', '3', '2020-02-03 14:58:04');
INSERT INTO `entry_history` VALUES ('75', '1', '3', 'aGFzIG9wZW5lZCBQcm9ibGVt', '1', '3', '4', '2020-02-06 01:36:14');
INSERT INTO `entry_history` VALUES ('76', '1', '3', 'aGFzIG9wZW5lZCBQcm9ibGVt', '1', '3', '4', '2020-02-06 13:08:49');
INSERT INTO `entry_history` VALUES ('77', '21', '3', 'aGFzIGFkZCBTb2x1dGlvbg==', '1', '3', '1', '2020-02-06 13:09:35');
INSERT INTO `entry_history` VALUES ('78', '21', '3', 'aGFzIGFkZCBDb21tZW50', null, null, '4', '2020-02-06 13:09:40');
INSERT INTO `entry_history` VALUES ('79', '21', '3', 'aGFzIGNsb3NlZCBQcm9ibGVt', '1', '3', '3', '2020-02-06 13:09:46');
INSERT INTO `entry_history` VALUES ('80', '1', '3', 'aGFzIG9wZW5lZCBQcm9ibGVt', '2', '3', '4', '2020-02-06 13:10:10');
INSERT INTO `entry_history` VALUES ('81', '22', '3', 'aGFzIGFkZCBDb21tZW50', null, null, '4', '2020-02-06 13:10:20');
INSERT INTO `entry_history` VALUES ('82', '22', '3', 'aGFzIGFkZCBDb21tZW50', null, null, '4', '2020-02-06 13:10:28');
INSERT INTO `entry_history` VALUES ('83', '22', '3', 'aGFzIGVkaXQgc29sdXRpb24gVGltZQ==', '2', '3', '2', '2020-02-06 13:10:43');
INSERT INTO `entry_history` VALUES ('84', '18', '3', 'aGFzIGVkaXQgc29sdXRpb24gVGltZQ==', '1', '3', '2', '2020-02-06 13:11:41');
INSERT INTO `entry_history` VALUES ('85', '18', '3', 'aGFzIGFzc2lnbmVkIEpvc2NoYSBLZXJu', null, null, null, '2020-02-06 13:12:01');
INSERT INTO `entry_history` VALUES ('86', '19', '3', 'aGFzIGVkaXQgc29sdXRpb24gVGltZQ==', '1', '3', '2', '2020-02-06 13:14:33');
INSERT INTO `entry_history` VALUES ('87', '19', '0', 'aGFzIGNoYW5nZWQgU3RhdHVz', '1', '3', '0', '2020-02-06 13:14:33');
INSERT INTO `entry_history` VALUES ('88', '1', '3', 'aGFzIG9wZW5lZCBQcm9ibGVt', '1', '3', '4', '2020-02-06 13:16:11');
INSERT INTO `entry_history` VALUES ('89', '23', '3', 'aGFzIGVkaXQgc29sdXRpb24gVGltZQ==', '1', '3', '2', '2020-02-06 13:16:20');
INSERT INTO `entry_history` VALUES ('90', '23', '0', 'aGFzIGNoYW5nZWQgU3RhdHVz', '1', '3', '0', '2020-02-06 13:16:20');
INSERT INTO `entry_history` VALUES ('91', '1', '3', 'aGFzIG9wZW5lZCBQcm9ibGVt', '1', '3', '4', '2020-02-06 13:36:28');
INSERT INTO `entry_history` VALUES ('92', '24', '3', 'aGFzIGFkZCBDb21tZW50', null, null, '4', '2020-02-06 13:37:18');
INSERT INTO `entry_history` VALUES ('93', '24', '3', 'aGFzIGFkZCBTb2x1dGlvbg==', '1', '3', '1', '2020-02-06 13:37:51');
INSERT INTO `entry_history` VALUES ('94', '19', '3', 'aGFzIGFkZCBDb21tZW50', null, null, '4', '2020-02-06 14:20:58');
INSERT INTO `entry_history` VALUES ('95', '19', '3', 'aGFzIGFkZCBDb21tZW50', null, null, '4', '2020-02-06 14:21:28');
INSERT INTO `entry_history` VALUES ('96', '19', '3', 'aGFzIGFkZCBDb21tZW50', null, null, '4', '2020-02-06 14:21:52');
INSERT INTO `entry_history` VALUES ('97', '19', '3', 'aGFzIGFkZCBDb21tZW50', null, null, '4', '2020-02-06 14:22:07');
INSERT INTO `entry_history` VALUES ('98', '19', '3', 'aGFzIGFkZCBDb21tZW50', null, null, '4', '2020-02-06 14:22:16');
INSERT INTO `entry_history` VALUES ('99', '19', '3', 'aGFzIGFkZCBDb21tZW50', null, null, '4', '2020-02-06 14:30:28');
INSERT INTO `entry_history` VALUES ('100', '19', '3', 'aGFzIGFkZCBDb21tZW50', null, null, '4', '2020-02-06 14:32:14');
INSERT INTO `entry_history` VALUES ('101', '19', '3', 'aGFzIGFkZCBDb21tZW50', null, null, '4', '2020-02-06 14:34:50');
INSERT INTO `entry_history` VALUES ('102', '19', '3', 'aGFzIGFkZCBDb21tZW50', null, null, '4', '2020-02-06 15:13:58');
INSERT INTO `entry_history` VALUES ('103', '1', '3', 'aGFzIG9wZW5lZCBQcm9ibGVt', '1', '3', '4', '2020-02-07 13:17:14');
INSERT INTO `entry_history` VALUES ('104', '25', '3', 'aGFzIGVkaXQgc29sdXRpb24gVGltZQ==', '1', '3', '2', '2020-02-07 13:17:51');
INSERT INTO `entry_history` VALUES ('105', '25', '0', 'aGFzIGNoYW5nZWQgU3RhdHVz', '1', '3', '0', '2020-02-07 13:17:51');
INSERT INTO `entry_history` VALUES ('106', '25', '3', 'aGFzIGFkZCBDb21tZW50', null, null, '4', '2020-02-07 13:18:08');
INSERT INTO `entry_history` VALUES ('107', '25', '3', 'aGFzIGFzc2lnbmVkIEhlaW56IEd1c3RhZg==', null, null, null, '2020-02-07 13:18:31');
INSERT INTO `entry_history` VALUES ('108', '25', '3', 'aGFzIGFkZCBTb2x1dGlvbg==', '2', '3', '1', '2020-02-07 13:19:05');
INSERT INTO `entry_history` VALUES ('109', '25', '3', 'aGFzIGNsb3NlZCBQcm9ibGVt', '2', '3', '3', '2020-02-07 13:19:33');
INSERT INTO `entry_history` VALUES ('110', '20', '0', 'aGFzIGNoYW5nZWQgU3RhdHVz', '1', '3', '0', '2020-02-09 14:02:11');
INSERT INTO `entry_history` VALUES ('111', '1', '3', 'aGFzIG9wZW5lZCBQcm9ibGVt', '2', '3', '4', '2020-02-19 10:56:56');
INSERT INTO `entry_history` VALUES ('112', '26', '3', 'aGFzIGVkaXQgc29sdXRpb24gVGltZQ==', '2', '3', '2', '2020-02-19 10:58:36');
INSERT INTO `entry_history` VALUES ('113', '26', '3', 'aGFzIGFkZCBTb2x1dGlvbg==', '2', '3', '1', '2020-02-19 10:58:57');
INSERT INTO `entry_history` VALUES ('114', '26', '3', 'aGFzIGNsb3NlZCBQcm9ibGVt', '2', '3', '3', '2020-02-19 10:59:40');
INSERT INTO `entry_history` VALUES ('115', '17', '0', 'aGFzIGNoYW5nZWQgU3RhdHVz', '3', '3', '0', '2020-03-09 21:14:10');
INSERT INTO `entry_history` VALUES ('116', '18', '0', 'aGFzIGNoYW5nZWQgU3RhdHVz', '1', '3', '0', '2020-03-09 21:14:11');
INSERT INTO `entry_history` VALUES ('117', '22', '0', 'aGFzIGNoYW5nZWQgU3RhdHVz', '2', '3', '0', '2020-03-09 21:14:12');
INSERT INTO `entry_history` VALUES ('118', '24', '0', 'aGFzIGNoYW5nZWQgU3RhdHVz', '1', '3', '0', '2020-03-09 21:14:17');
INSERT INTO `entry_history` VALUES ('119', '17', '3', 'aGFzIGVkaXQgc29sdXRpb24gVGltZQ==', '3', '3', '2', '2020-03-11 13:52:50');
INSERT INTO `entry_history` VALUES ('120', '17', '3', 'aGFzIGFzc2lnbmVkIEpvc2NoYSBLZXJu', null, null, null, '2020-03-11 13:53:13');
INSERT INTO `entry_history` VALUES ('121', '17', '3', 'aGFzIGFkZCBTb2x1dGlvbg==', '1', '3', '1', '2020-03-11 13:53:45');
INSERT INTO `entry_history` VALUES ('122', '17', '3', 'aGFzIGNsb3NlZCBQcm9ibGVt', '1', '3', '3', '2020-03-11 13:54:05');

-- ----------------------------
-- Table structure for `language`
-- ----------------------------
DROP TABLE IF EXISTS `language`;
CREATE TABLE `language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `lang_de` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `lang_en` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `lang_cn` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang_in` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of language
-- ----------------------------
INSERT INTO `language` VALUES ('5', 'Dashboard', 'Dashboard', 'Dashboard', '仪表板', 'डैशबोर्ड');
INSERT INTO `language` VALUES ('6', 'VIALL', 'Alle anzeigen', 'View all', '查看所有的', 'सभी देखें');
INSERT INTO `language` VALUES ('7', 'email', 'Email', 'Email', '电子邮件', 'ईमेल');
INSERT INTO `language` VALUES ('8', 'password', 'Passwort', 'Password', '密码', 'पासवर्ड');
INSERT INTO `language` VALUES ('9', 'remember', 'Speichern', 'Remember Me', '还记得我', 'मुझे याद है');
INSERT INTO `language` VALUES ('10', 'passfor', 'Passwort vergessen?', 'Password forget?', '密码忘了吗？', 'पासवर्ड भूल जाते हैं?');
INSERT INTO `language` VALUES ('11', 'register', 'Registrieren', 'Sign Up', '注册', 'साइन अप करें');
INSERT INTO `language` VALUES ('12', 'missempass', 'Bitte Email und Passwort eingeben', 'Please enter Email and Password', '请输入电子邮件地址和密码', 'कृपया ईमेल और पासवर्ड दर्ज');
INSERT INTO `language` VALUES ('13', 'error', 'Unbekannter Fehler', 'Unknown Error', '未知的错误', 'अज्ञात त्रुटि');
INSERT INTO `language` VALUES ('14', 'error1', 'Unbekannter Fehler', 'Unknown Error', '未知的错误', 'अज्ञात त्रुटि');
INSERT INTO `language` VALUES ('15', 'wrongcredi', 'Falsche Anmeldeinformationen, versuchen Sie es erneut.....', 'Incorrect Credentials, Try again...', '不正确的凭据，再试一次...', 'गलत पहचान, फिर से कोशिश...');
INSERT INTO `language` VALUES ('16', 'loginhead', 'Anmelden', 'Login', '登录', 'लॉगिन');
INSERT INTO `language` VALUES ('17', 'sitenotfound', 'Seite wurde nicht gefunden...', 'Site not found...', '现场没有发现...', 'साइट नहीं पाया...');
INSERT INTO `language` VALUES ('18', 'signupheader', 'Registrieren', 'Sign up', '注册', 'साइन अप करें');
INSERT INTO `language` VALUES ('19', 'reppass', 'Passwort erneut eingeben', 'Repeat password', '重复密码', 'दोहराने पासवर्ड');
INSERT INTO `language` VALUES ('20', 'choseemail', 'Bitte gib eine Email addresse an', 'Please chose a Email address', '请选择了一个电子邮件地址', 'कृपया चुना है एक ईमेल पते की');
INSERT INTO `language` VALUES ('21', 'accepttherms', 'Du musst unsere AGB\'s akzeptieren', 'You have to accept our terms and conditions.', '你必须要接受我们的条款和条件。', 'आप को स्वीकार करने के लिए हमारे नियम और शर्तों.');
INSERT INTO `language` VALUES ('22', 'passwordnotsame', 'Passwörter stimmen nicht überein', 'Passwords do not match', '密码不匹配', 'पासवर्ड मेल नहीं खाते');
INSERT INTO `language` VALUES ('23', 'novalidemail', 'Bitte gib eine gültige Email addresse ein', 'Please enter a valid email address', '请输入一个有效的电子邮件地址', 'कृपया एक मान्य ईमेल पता दर्ज');
INSERT INTO `language` VALUES ('24', 'open_problems', 'Offene Probleme', 'Open problems', '开放的问题', 'खोलने की समस्याओं');
INSERT INTO `language` VALUES ('25', 'project', 'Projekt', 'Project', '项目', 'परियोजना');
INSERT INTO `language` VALUES ('26', 'type', 'Typ', 'Type', '类型', 'प्रकार');
INSERT INTO `language` VALUES ('27', 'description', 'Beschreibung', 'Description', '描述', 'विवरण');
INSERT INTO `language` VALUES ('28', 'opened_on', 'Geöffnet am', 'Opened on', '打开上', 'पर खोला');
INSERT INTO `language` VALUES ('29', 'status', 'Status', 'Status', '状态', 'स्थिति');
INSERT INTO `language` VALUES ('30', 'last_answered', 'Letzte Anwort', 'Last Answered', '最后的回答', 'पिछले जवाब दिए');
INSERT INTO `language` VALUES ('31', 'responsible', 'Verantwortliche', 'Responsible', '负责', 'जिम्मेदार');
INSERT INTO `language` VALUES ('32', 'department', 'Abteilung', 'Department', '部门', 'विभाग');
INSERT INTO `language` VALUES ('33', 'actions', 'Aktionen', 'Actions', '行动', 'कार्रवाई');
INSERT INTO `language` VALUES ('34', 'started_on', 'Angefangen am', 'Started on', '开始上', 'पर शुरू कर दिया');
INSERT INTO `language` VALUES ('35', 'deadline', 'Deadline', 'Deadline', '截止日期', 'समय सीमा');
INSERT INTO `language` VALUES ('36', 'days_to_deadline', 'Tage bis Deadline', 'Days to Deadline', '天的最后期限', 'दिनों के लिए समय सीमा');
INSERT INTO `language` VALUES ('37', 'no_projects', 'Keine Projekte gefunden', 'No Projects found', '没有项目的发现', 'कोई परियोजनाओं पाया');
INSERT INTO `language` VALUES ('38', 'wrong_t_number', 'Falsche Typennummer', '\r\nWrong type number', '類型編號錯誤', '\r\nगलत प्रकार की संख्या');
INSERT INTO `language` VALUES ('39', 'new', 'Neu', 'New', '新的', 'नई');
INSERT INTO `language` VALUES ('40', 'pending', 'In Bearbeitung', 'Pending', '待', 'लंबित');
INSERT INTO `language` VALUES ('41', 'closed', 'Geschlossen', 'Closed', '关闭', 'बंद');
INSERT INTO `language` VALUES ('42', 'escalated', 'Eskalliert', 'Escalated', '升级', 'परिवर्धित');
INSERT INTO `language` VALUES ('43', 'project_details', 'Projekt details', 'Project details', '项目的详细信息', 'परियोजना के विवरण');
INSERT INTO `language` VALUES ('44', 'home', 'Home', 'Home', '家', 'घर');
INSERT INTO `language` VALUES ('45', 'new_problem', 'Neues Problem', 'New Problem', '新问题', 'नई समस्या');
INSERT INTO `language` VALUES ('46', 'problem_title', 'Problem title', 'Problem title', '问题标题', 'समस्या का शीर्षक');
INSERT INTO `language` VALUES ('47', 'problem_description', 'Problembeschreibung', 'Problem description', '问题简介', 'समस्या विवरण');
INSERT INTO `language` VALUES ('48', 'enter_description', 'Bitte Beschreibung angeben', 'Please enter description', '请输入的说明', 'कृपया विवरण दर्ज करें');
INSERT INTO `language` VALUES ('49', 'enter_title', 'Bitte Titel angeben', 'Please enter title', '请输入标题', 'दर्ज करें शीर्षक');
INSERT INTO `language` VALUES ('50', 'enter_assigned_to', 'Bitte zuständen angeben', 'Please enter Assigned to', '请输入分配', 'कृपया प्रवेश करने के लिए सौंपा');
INSERT INTO `language` VALUES ('51', 'contact_admin', 'Bitte Administrator kontaktieren', 'Please contact Administrator', '请联络管理员', 'कृपया व्यवस्थापक से संपर्क करें');
INSERT INTO `language` VALUES ('52', 'company', 'Firma', 'Company', '公司', 'कंपनी');
INSERT INTO `language` VALUES ('53', 'comm_nr', 'Kommissions Nr.', 'Comm Nr.', 'Comm。', 'कॉम Nr.');
INSERT INTO `language` VALUES ('54', 'close', 'Schließen', 'Close', '靠近', 'करीब');
INSERT INTO `language` VALUES ('55', 'submit', 'Weiter', 'Submit', '提交', 'प्रस्तुत');
INSERT INTO `language` VALUES ('56', 'deadline_on', 'Deadline am', 'Deadline on', '最后期限', 'समय सीमा पर');
INSERT INTO `language` VALUES ('57', 'comments', 'Kommentare', 'Comments', '评论意见', 'टिप्पणी');
INSERT INTO `language` VALUES ('58', 'new_comment', 'Neuer Kommentar', 'New Comment', '新的评论', 'नई टिप्पणी');
INSERT INTO `language` VALUES ('59', 'save', 'Speichern', 'Save', '保存', 'बचाने के लिए');
INSERT INTO `language` VALUES ('60', 'problem_recored', 'Problem aufgenommen', 'Problem recored', '问题条记录', 'समस्या recored');
INSERT INTO `language` VALUES ('61', 'solve_until', 'Zu lösen bis', 'Solve untill', '解决，直到', 'हल जब तक');
INSERT INTO `language` VALUES ('62', 'days_left', 'Tage übrig', 'Days left', '天离开', 'दिनों के लिए छोड़ दिया');
INSERT INTO `language` VALUES ('63', 'history', 'History', 'History', '历史', 'इतिहास');
INSERT INTO `language` VALUES ('64', 'enter_comment_text', 'Bitte gib einen Kommentar text ein', 'Please enter Comment text', '请输入意见文本', 'कृपया टिप्पणी पाठ दर्ज करें');
INSERT INTO `language` VALUES ('65', 'assign', 'Zuweisen', 'Assign', '分配', 'आवंटित');
INSERT INTO `language` VALUES ('66', 'problem_fixed', 'Problem gelöst', 'Problem fixed', '问题的固定', 'समस्या फिक्स्ड');
INSERT INTO `language` VALUES ('67', 'fixed_title', 'Erfolgreich gelöst?', 'Successfully fixed?', '成功固定的？', 'सफलतापूर्वक तय की?');
INSERT INTO `language` VALUES ('68', 'fixed_description', 'Wenn Sie auf Speichern klicken, bestätigen Sie, dass das Problem erfolgreich behoben wurde.', 'When you press Save, you confirm that the problem has been successfully fixed.', '当你按下保存，你的确认的问题已经成功地固定的。', 'जब आप प्रेस बचाने के लिए, आप की पुष्टि करें कि समस्या को सफलतापूर्वक किया गया है तय की । ');
INSERT INTO `language` VALUES ('69', 'assign_title', 'Problem zuweißen', 'Problem assign', '问题分配', 'समस्या निरुपित');
INSERT INTO `language` VALUES ('70', 'assign_description', 'Wem soll das Problem zugewießen werden', 'Who should the Problem assign to', '谁应该的问题分配给', 'जाना चाहिए, जो समस्या के लिए आवंटित');
INSERT INTO `language` VALUES ('71', 'details', 'Details', 'Details', '详细信息', 'विवरण');
INSERT INTO `language` VALUES ('72', 'assigned_to', 'Verantwortlicher', 'Assigned to', '分配给', 'करने के लिए सौंपा');
INSERT INTO `language` VALUES ('73', 'solut', 'Lösung', 'Solution', '解决方案', 'समाधान');
INSERT INTO `language` VALUES ('74', 'solut_title', 'Lösung', 'Solution', '解决方案', 'समाधान');
INSERT INTO `language` VALUES ('75', 'solut_description', 'Hier kannst du eine Lösung des Problems einfügen', 'Here you can provide a Solution for the Problem', '在这里你可以提供一个解决方案的问题', 'यहाँ आप प्रदान कर सकते हैं समस्या के लिए एक समाधान');
INSERT INTO `language` VALUES ('76', 'prob_type', 'Problem typ', 'Problem type', '问题类型', 'समस्या के प्रकार');
INSERT INTO `language` VALUES ('77', 'unknown', 'Unbekannt', 'Unknown', '未知', 'अज्ञात');
INSERT INTO `language` VALUES ('78', 'edit_solution_time', 'Lösungszeit bearbeiten', 'Edit Solution Time', '编辑解决方案的时间', 'संपादित करें समाधान का समय');
INSERT INTO `language` VALUES ('79', 'solution_time_desc', 'Du möchtest die Zeit anpassen, die bis zum lösen des Problems nötig ist?', 'You want to adjust the time it takes to solve the problem?', '你想要的调整所需的时间要解决的问题?', 'आप चाहते हैं को समायोजित करने के लिए इसे लेता समय को हल करने के लिए समस्या है?');
INSERT INTO `language` VALUES ('80', 'time_now', 'Datum sollte nicht heute sein!', 'Date should not be today!', '日期不应该被今天！', 'तारीख नहीं होना चाहिए आज!');
INSERT INTO `language` VALUES ('81', 'solut_msg', 'Lösungsbeschreibung', 'Solution description', '方案描述', 'समाधान विवरण');
INSERT INTO `language` VALUES ('82', 'no_solu', 'Problem kann nicht ohne Lösung geschlossen werden', 'Problem can not be closed without an Solution', '问题可能不被关闭，没有一个解决方案', 'समस्या को बंद नहीं किया जा सकता के बिना एक समाधान');
INSERT INTO `language` VALUES ('83', 'none', 'Niemand', 'None', '没有', 'कोई नहीं');
INSERT INTO `language` VALUES ('84', 'project_item', 'Projekt Item', 'Project Item', '项目的项目', 'परियोजना मद');
INSERT INTO `language` VALUES ('85', 'msg', 'Nachrichten', 'Messages', '消息', 'संदेश');
INSERT INTO `language` VALUES ('86', 'message', 'Nachricht', 'Message', '消息', 'संदेश');
INSERT INTO `language` VALUES ('87', 'date', 'Datum', 'Date', '日期', 'तारीख');
INSERT INTO `language` VALUES ('88', 'projects', 'Projekte', 'Projects', '项目', 'परियोजनाओं');
INSERT INTO `language` VALUES ('89', 'settings', 'Einstellungen', 'Settings', '设置', 'सेटिंग्स');
INSERT INTO `language` VALUES ('90', 'missingparts', 'Fehlteile', 'Missing Parts', '缺少的部分', 'लापता भागों');
INSERT INTO `language` VALUES ('91', 'sel_prob_type', 'Bitte Problem typ auswählen', 'Please select Problem type', '请选择的问题类型', 'समस्या के प्रकार का चयन करें');
INSERT INTO `language` VALUES ('92', 'update_missing_parts', 'Fehlteilliste aktuallisieren', 'Update Missing Part list', '更新的缺失的部分清单', 'अद्यतन लापता हिस्सा की सूची');
INSERT INTO `language` VALUES ('93', 'upload', 'Upload', 'Upload', '上传', 'अपलोड');
INSERT INTO `language` VALUES ('94', 'select_new_csv', 'Neue .csv hochladen', 'Select New CSV file', '选择新的CSV文件', 'नई CSV फ़ाइल का चयन करें');
INSERT INTO `language` VALUES ('95', 'no_file_selected', 'Keine Datei ausgewählt', 'Please select a File', '请选择文件', 'कृपया एक फ़ाइल का चयन करें');
INSERT INTO `language` VALUES ('96', 'noly_csv_file', 'Bitte wähle eine .csv Datei aus', 'Please chose a .csv file', '请选一个.csv文件', 'कृपया का फैसला किया .सीएसवी फाइल');
INSERT INTO `language` VALUES ('97', 'file_uploaded', 'Datei erfolgreich hochgeladen', 'File succesfully uploaded', '文件上传成功', 'फाइल सफलतापूर्वक अपलोड किया गया');
INSERT INTO `language` VALUES ('98', 'no_missing_parts', 'Keine Fehlteile vorhanden', 'No missing Parts', '没有丢失的部件', 'कोई लापता भागों');
INSERT INTO `language` VALUES ('99', 'old_pass', 'Altes Passwort', 'Old Password', '旧密码', 'पुराना पासवर्ड');
INSERT INTO `language` VALUES ('100', 'new_pass', 'Neues Passwort', 'New Password', '新密码', 'नया पासवर्ड');
INSERT INTO `language` VALUES ('101', 'new_pass_repeat', 'Neues Passwort wiederholen', 'Repeat new Password', '重新密码', 'नया पासवर्ड दोहराने');
INSERT INTO `language` VALUES ('102', 'firstname', 'Vorname', 'First Name', '\r\n名字', '\r\nपहला नाम');
INSERT INTO `language` VALUES ('103', 'lastname', 'Nachname', 'Last Name', '\r\n姓', '\r\nउपनाम');
INSERT INTO `language` VALUES ('104', 'changename', 'Namen ändern', 'Change Name', '\r\n更換名字', '\r\nनाम परिवर्तित करें');
INSERT INTO `language` VALUES ('105', 'changepass', 'Passwort ändern', 'Change Password', '改变密码', 'पासवर्ड बदलें');
INSERT INTO `language` VALUES ('106', 'saved', 'Erfolgreich gespeichert', 'Succesfully saved', '成功地保存', 'सफलतापूर्वक बचाया');
INSERT INTO `language` VALUES ('107', 'wrong_oldpass', 'Dein altes Passwort stimmt nicht überein', 'Your old password does not match', '你的旧密码不匹配', 'अपने पुराने पासवर्ड से मेल नहीं खाता');
INSERT INTO `language` VALUES ('108', 'new_pass_notsame', 'Neue Passwörter stimmen nicht überein', 'New passwords do not match', '新密码不匹配', 'नए पासवर्ड से मेल नहीं खाते');
INSERT INTO `language` VALUES ('109', 'solved_on', 'Gelöst am', 'Solved on', '解决上', 'हल पर');
INSERT INTO `language` VALUES ('110', 'lang_set', 'Spracheinstellungen', 'Language settings', '语言设置', 'भाषा सेटिंग्स');
INSERT INTO `language` VALUES ('111', 'de', 'Deutsch', 'German', '德', 'जर्मन');
INSERT INTO `language` VALUES ('112', 'en', 'Englisch', 'English', '英语', 'अंग्रेजी');
INSERT INTO `language` VALUES ('113', 'cn', 'Chinesisch', 'Chinese', '中国', 'चीनी');
INSERT INTO `language` VALUES ('114', 'in', 'Indisch', 'Indian', '印度', 'भारतीय');
INSERT INTO `language` VALUES ('115', 'edit', 'Bearbeiten', 'Edit', '编辑', 'संपादित करें');
INSERT INTO `language` VALUES ('116', 'change', 'Ändern', 'Change', '改变', 'परिवर्तन');
INSERT INTO `language` VALUES ('117', '_SITEURL', 'Seiten URL', 'Site URL', '网站的网址', 'साइट यूआरएल');
INSERT INTO `language` VALUES ('118', '_SITETITLE', 'seitentitel', 'Site Title', '\r\n網站標題', '\r\nक्षेत्र शीर्षक');
INSERT INTO `language` VALUES ('119', 'user', 'Benutzer', 'User', '用户', 'उपयोगकर्ता');
INSERT INTO `language` VALUES ('120', 'yes', 'Ja', 'Yes', '是的', 'हाँ');
INSERT INTO `language` VALUES ('121', 'no', 'Nein', 'No', '没有', 'कोई');
INSERT INTO `language` VALUES ('122', 'que', 'Ques', 'Ques', '疑问句', 'सवाल');
INSERT INTO `language` VALUES ('123', 'name', 'Name', 'Name', '名称', 'नाम');
INSERT INTO `language` VALUES ('124', 'entry', 'Einträge', 'Entries', '\r\n參賽作品', '\r\nप्रविष्टियां');
INSERT INTO `language` VALUES ('125', 'add', 'Hinzufügen', 'Add', '添加', 'जोड़ें');
INSERT INTO `language` VALUES ('126', 'newque', 'Neue Que', 'New Que', '新Que', 'नई Que');
INSERT INTO `language` VALUES ('127', 'enter_name', 'Bitte Namen angeben', 'Please enter a Name', '请输入一个名字', 'कृपया एक नाम प्रविष्ट करें');
INSERT INTO `language` VALUES ('128', 'activated', 'Aktiviert', 'Activated', '激活', 'सक्रिय');
INSERT INTO `language` VALUES ('129', 'last7days', 'Letzten 7 Tage', 'Last 7 Days', '最后7天', 'पिछले 7 दिनों में');
INSERT INTO `language` VALUES ('130', 'last30days', 'Letzten 30 Tage', 'Last 30 Days', '最后30天', 'पिछले 30 दिनों');
INSERT INTO `language` VALUES ('131', 'opened', 'Eröffnet', 'Opened', '打开', 'खोला');

-- ----------------------------
-- Table structure for `log`
-- ----------------------------
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project` int(11) NOT NULL,
  `type` int(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `creator` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of log
-- ----------------------------

-- ----------------------------
-- Table structure for `message`
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` longtext NOT NULL,
  `touser` int(255) NOT NULL,
  `fromuser` int(255) NOT NULL,
  `priority` int(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of message
-- ----------------------------

-- ----------------------------
-- Table structure for `problem_type`
-- ----------------------------
DROP TABLE IF EXISTS `problem_type`;
CREATE TABLE `problem_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `enabled` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of problem_type
-- ----------------------------
INSERT INTO `problem_type` VALUES ('1', 'Mechanik', '1');
INSERT INTO `problem_type` VALUES ('2', 'Elektrik', '1');
INSERT INTO `problem_type` VALUES ('3', 'PLC', '1');
INSERT INTO `problem_type` VALUES ('4', 'test', '1');

-- ----------------------------
-- Table structure for `project`
-- ----------------------------
DROP TABLE IF EXISTS `project`;
CREATE TABLE `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `type` int(255) NOT NULL,
  `status` int(255) NOT NULL,
  `priority` int(255) NOT NULL,
  `responsibly` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deadline` datetime NOT NULL,
  `start` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of project
-- ----------------------------
INSERT INTO `project` VALUES ('1', '286800', 'EEW', '2', '0', '0', '-', '2019-10-26 21:07:44', '2020-02-01 21:49:24', '2019-10-01 21:51:28');

-- ----------------------------
-- Table structure for `project_comment`
-- ----------------------------
DROP TABLE IF EXISTS `project_comment`;
CREATE TABLE `project_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project` int(11) NOT NULL,
  `msg` longtext NOT NULL,
  `user` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of project_comment
-- ----------------------------
INSERT INTO `project_comment` VALUES ('1', '1', 'PHA+dGVzdDEyMzwvcD4=', '2', '2019-10-27 12:09:06');
INSERT INTO `project_comment` VALUES ('2', '1', 'PHA+dGVzdDwvcD4=', '2', '2019-10-27 12:12:23');
INSERT INTO `project_comment` VALUES ('3', '1', 'PHByZSBjbGFzcz0icHJldHR5cHJpbnQgcHJldHR5cHJpbnRlZCI+PGNvZGUgY2xhc3M9Imxhbmd1YWdlLWpzIiBkYXRhLWxhbmc9ImpzIj48c3BhbiBjbGFzcz0ibyI+PHNwYW4gY2xhc3M9InB1biI+Jmx0Ozwvc3Bhbj48L3NwYW4+PHNwYW4gY2xhc3M9Im54Ij48c3BhbiBjbGFzcz0icGxuIj5zY3JpcHQ8L3NwYW4+PC9zcGFuPiA8c3BhbiBjbGFzcz0ibngiPjxzcGFuIGNsYXNzPSJwbG4iPnR5cGU8L3NwYW4+PC9zcGFuPjxzcGFuIGNsYXNzPSJvIj48c3BhbiBjbGFzcz0icHVuIj49PC9zcGFuPjwvc3Bhbj48c3BhbiBjbGFzcz0iczIiPjxzcGFuIGNsYXNzPSJzdHIiPiJ0ZXh0L2phdmFzY3JpcHQiPC9zcGFuPjwvc3Bhbj4gPHNwYW4gY2xhc3M9Im54Ij48c3BhbiBjbGFzcz0icGxuIj5zcmM8L3NwYW4+PC9zcGFuPjxzcGFuIGNsYXNzPSJvIj48c3BhbiBjbGFzcz0icHVuIj49PC9zcGFuPjwvc3Bhbj48c3BhbiBjbGFzcz0iczIiPjxzcGFuIGNsYXNzPSJzdHIiPiImbHQ7eW91ciBpbnN0YWxsYXRpb24gcGF0aCZndDsvdGlueV9tY2UvdGlueV9tY2UuanMiPC9zcGFuPjwvc3Bhbj48c3BhbiBjbGFzcz0ibyI+PHNwYW4gY2xhc3M9InB1biI+Jmd0OyZsdDs8L3NwYW4+PC9zcGFuPjxzcGFuIGNsYXNzPSJlcnIiPjxzcGFuIGNsYXNzPSJwdW4iPi88L3NwYW4+PHNwYW4gY2xhc3M9InBsbiI+c2NyaXB0PC9zcGFuPjxzcGFuIGNsYXNzPSJwdW4iPiZndDs8L3NwYW4+PC9zcGFuPgo8c3BhbiBjbGFzcz0ibyI+PHNwYW4gY2xhc3M9InB1biI+Jmx0Ozwvc3Bhbj48L3NwYW4+PHNwYW4gY2xhc3M9Im54Ij48c3BhbiBjbGFzcz0icGxuIj5zY3JpcHQ8L3NwYW4+PC9zcGFuPiA8c3BhbiBjbGFzcz0ibngiPjxzcGFuIGNsYXNzPSJwbG4iPnR5cGU8L3NwYW4+PC9zcGFuPjxzcGFuIGNsYXNzPSJvIj48c3BhbiBjbGFzcz0icHVuIj49PC9zcGFuPjwvc3Bhbj48c3BhbiBjbGFzcz0iczIiPjxzcGFuIGNsYXNzPSJzdHIiPiJ0ZXh0L2phdmFzY3JpcHQiPC9zcGFuPjwvc3Bhbj48c3BhbiBjbGFzcz0ibyI+PHNwYW4gY2xhc3M9InB1biI+Jmd0Ozwvc3Bhbj48L3NwYW4+CjxzcGFuIGNsYXNzPSJueCI+PHNwYW4gY2xhc3M9InBsbiI+dGlueU1DRTwvc3Bhbj48L3NwYW4+PHNwYW4gY2xhc3M9InAiPjxzcGFuIGNsYXNzPSJwdW4iPi48L3NwYW4+PC9zcGFuPjxzcGFuIGNsYXNzPSJueCI+PHNwYW4gY2xhc3M9InBsbiI+aW5pdDwvc3Bhbj48L3NwYW4+PHNwYW4gY2xhc3M9InAiPjxzcGFuIGNsYXNzPSJwdW4iPih7PC9zcGFuPjwvc3Bhbj4KPHNwYW4gY2xhc3M9ImVyciI+PHNwYW4gY2xhc3M9InBsbiI+Jm5ic3A7Jm5ic3A7Jm5ic3A7PC9zcGFuPjwvc3Bhbj4gPHNwYW4gY2xhc3M9Im54Ij48c3BhbiBjbGFzcz0icGxuIj5tb2RlPC9zcGFuPjwvc3Bhbj4gPHNwYW4gY2xhc3M9Im8iPjxzcGFuIGNsYXNzPSJwdW4iPjo8L3NwYW4+PC9zcGFuPiA8c3BhbiBjbGFzcz0iczIiPjxzcGFuIGNsYXNzPSJzdHIiPiJ0ZXh0YXJlYXMiPC9zcGFuPjwvc3Bhbj48c3BhbiBjbGFzcz0icCI+PHNwYW4gY2xhc3M9InB1biI+LDwvc3Bhbj48L3NwYW4+CjxzcGFuIGNsYXNzPSJlcnIiPjxzcGFuIGNsYXNzPSJwbG4iPiZuYnNwOyZuYnNwOyZuYnNwOzwvc3Bhbj48L3NwYW4+IDxzcGFuIGNsYXNzPSJueCI+PHNwYW4gY2xhc3M9InBsbiI+dGhlbWU8L3NwYW4+PC9zcGFuPiA8c3BhbiBjbGFzcz0ibyI+PHNwYW4gY2xhc3M9InB1biI+Ojwvc3Bhbj48L3NwYW4+IDxzcGFuIGNsYXNzPSJzMiI+PHNwYW4gY2xhc3M9InN0ciI+ImFkdmFuY2VkIjwvc3Bhbj48L3NwYW4+CjxzcGFuIGNsYXNzPSJwIj48c3BhbiBjbGFzcz0icHVuIj59KTs8L3NwYW4+PC9zcGFuPgoKPHNwYW4gY2xhc3M9ImtkIj48c3BhbiBjbGFzcz0ia3dkIj5mdW5jdGlvbjwvc3Bhbj48L3NwYW4+IDxzcGFuIGNsYXNzPSJueCI+PHNwYW4gY2xhc3M9InBsbiI+YWpheExvYWQ8L3NwYW4+PC9zcGFuPjxzcGFuIGNsYXNzPSJwIj48c3BhbiBjbGFzcz0icHVuIj4oKTwvc3Bhbj48L3NwYW4+IDxzcGFuIGNsYXNzPSJwIj48c3BhbiBjbGFzcz0icHVuIj57PC9zcGFuPjwvc3Bhbj4KPHNwYW4gY2xhc3M9ImVyciI+PHNwYW4gY2xhc3M9InBsbiI+Jm5ic3A7Jm5ic3A7Jm5ic3A7PC9zcGFuPjwvc3Bhbj4gPHNwYW4gY2xhc3M9ImtkIj48c3BhbiBjbGFzcz0ia3dkIj52YXI8L3NwYW4+PC9zcGFuPiA8c3BhbiBjbGFzcz0ibngiPjxzcGFuIGNsYXNzPSJwbG4iPmVkPC9zcGFuPjwvc3Bhbj4gPHNwYW4gY2xhc3M9Im8iPjxzcGFuIGNsYXNzPSJwdW4iPj08L3NwYW4+PC9zcGFuPiA8c3BhbiBjbGFzcz0ibngiPjxzcGFuIGNsYXNzPSJwbG4iPnRpbnlNQ0U8L3NwYW4+PC9zcGFuPjxzcGFuIGNsYXNzPSJwIj48c3BhbiBjbGFzcz0icHVuIj4uPC9zcGFuPjwvc3Bhbj48c3BhbiBjbGFzcz0ibngiPjxzcGFuIGNsYXNzPSJrd2QiPmdldDwvc3Bhbj48L3NwYW4+PHNwYW4gY2xhc3M9InAiPjxzcGFuIGNsYXNzPSJwdW4iPig8L3NwYW4+PC9zcGFuPjxzcGFuIGNsYXNzPSJzMSI+PHNwYW4gY2xhc3M9InN0ciI+J2NvbnRlbnQnPC9zcGFuPjwvc3Bhbj48c3BhbiBjbGFzcz0icCI+PHNwYW4gY2xhc3M9InB1biI+KTs8L3NwYW4+PC9zcGFuPgoKPHNwYW4gY2xhc3M9ImVyciI+PHNwYW4gY2xhc3M9InBsbiI+Jm5ic3A7Jm5ic3A7Jm5ic3A7PC9zcGFuPjwvc3Bhbj4gPHNwYW4gY2xhc3M9ImMxIj48c3BhbiBjbGFzcz0iY29tIj4vLyBEbyB5b3UgYWpheCBjYWxsIGhlcmUsIHdpbmRvdy5zZXRUaW1lb3V0IGZha2VzIGFqYXggY2FsbDwvc3Bhbj48L3NwYW4+CjxzcGFuIGNsYXNzPSJlcnIiPjxzcGFuIGNsYXNzPSJwbG4iPiZuYnNwOyZuYnNwOyZuYnNwOzwvc3Bhbj48L3NwYW4+IDxzcGFuIGNsYXNzPSJueCI+PHNwYW4gY2xhc3M9InBsbiI+ZWQ8L3NwYW4+PC9zcGFuPjxzcGFuIGNsYXNzPSJwIj48c3BhbiBjbGFzcz0icHVuIj4uPC9zcGFuPjwvc3Bhbj48c3BhbiBjbGFzcz0ibngiPjxzcGFuIGNsYXNzPSJwbG4iPnNldFByb2dyZXNzU3RhdGU8L3NwYW4+PC9zcGFuPjxzcGFuIGNsYXNzPSJwIj48c3BhbiBjbGFzcz0icHVuIj4oPC9zcGFuPjwvc3Bhbj48c3BhbiBjbGFzcz0ibWkiPjxzcGFuIGNsYXNzPSJsaXQiPjE8L3NwYW4+PC9zcGFuPjxzcGFuIGNsYXNzPSJwIj48c3BhbiBjbGFzcz0icHVuIj4pOzwvc3Bhbj48L3NwYW4+IDxzcGFuIGNsYXNzPSJjMSI+PHNwYW4gY2xhc3M9ImNvbSI+Ly8gU2hvdyBwcm9ncmVzczwvc3Bhbj48L3NwYW4+CjxzcGFuIGNsYXNzPSJlcnIiPjxzcGFuIGNsYXNzPSJwbG4iPiZuYnNwOyZuYnNwOyZuYnNwOzwvc3Bhbj48L3NwYW4+IDxzcGFuIGNsYXNzPSJuYiI+PHNwYW4gY2xhc3M9InBsbiI+d2luZG93PC9zcGFuPjwvc3Bhbj48c3BhbiBjbGFzcz0icCI+PHNwYW4gY2xhc3M9InB1biI+Ljwvc3Bhbj48L3NwYW4+PHNwYW4gY2xhc3M9Im54Ij48c3BhbiBjbGFzcz0icGxuIj5zZXRUaW1lb3V0PC9zcGFuPjwvc3Bhbj48c3BhbiBjbGFzcz0icCI+PHNwYW4gY2xhc3M9InB1biI+KDwvc3Bhbj48L3NwYW4+PHNwYW4gY2xhc3M9ImtkIj48c3BhbiBjbGFzcz0ia3dkIj5mdW5jdGlvbjwvc3Bhbj48L3NwYW4+PHNwYW4gY2xhc3M9InAiPjxzcGFuIGNsYXNzPSJwdW4iPigpPC9zcGFuPjwvc3Bhbj4gPHNwYW4gY2xhc3M9InAiPjxzcGFuIGNsYXNzPSJwdW4iPns8L3NwYW4+PC9zcGFuPgo8c3BhbiBjbGFzcz0iZXJyIj48c3BhbiBjbGFzcz0icGxuIj4mbmJzcDsmbmJzcDsmbmJzcDs8L3NwYW4+PC9zcGFuPiA8c3BhbiBjbGFzcz0iZXJyIj48c3BhbiBjbGFzcz0icGxuIj4mbmJzcDsmbmJzcDsmbmJzcDs8L3NwYW4+PC9zcGFuPiA8c3BhbiBjbGFzcz0ibngiPjxzcGFuIGNsYXNzPSJwbG4iPmVkPC9zcGFuPjwvc3Bhbj48c3BhbiBjbGFzcz0icCI+PHNwYW4gY2xhc3M9InB1biI+Ljwvc3Bhbj48L3NwYW4+PHNwYW4gY2xhc3M9Im54Ij48c3BhbiBjbGFzcz0icGxuIj5zZXRQcm9ncmVzc1N0YXRlPC9zcGFuPjwvc3Bhbj48c3BhbiBjbGFzcz0icCI+PHNwYW4gY2xhc3M9InB1biI+KDwvc3Bhbj48L3NwYW4+PHNwYW4gY2xhc3M9Im1pIj48c3BhbiBjbGFzcz0ibGl0Ij4wPC9zcGFuPjwvc3Bhbj48c3BhbiBjbGFzcz0icCI+PHNwYW4gY2xhc3M9InB1biI+KTs8L3NwYW4+PC9zcGFuPiA8c3BhbiBjbGFzcz0iYzEiPjxzcGFuIGNsYXNzPSJjb20iPi8vIEhpZGUgcHJvZ3Jlc3M8L3NwYW4+PC9zcGFuPgo8c3BhbiBjbGFzcz0iZXJyIj48c3BhbiBjbGFzcz0icGxuIj4mbmJzcDsmbmJzcDsmbmJzcDs8L3NwYW4+PC9zcGFuPiA8c3BhbiBjbGFzcz0iZXJyIj48c3BhbiBjbGFzcz0icGxuIj4mbmJzcDsmbmJzcDsmbmJzcDs8L3NwYW4+PC9zcGFuPiA8c3BhbiBjbGFzcz0ibngiPjxzcGFuIGNsYXNzPSJwbG4iPmVkPC9zcGFuPjwvc3Bhbj48c3BhbiBjbGFzcz0icCI+PHNwYW4gY2xhc3M9InB1biI+Ljwvc3Bhbj48L3NwYW4+PHNwYW4gY2xhc3M9Im54Ij48c3BhbiBjbGFzcz0icGxuIj5zZXRDb250ZW50PC9zcGFuPjwvc3Bhbj48c3BhbiBjbGFzcz0icCI+PHNwYW4gY2xhc3M9InB1biI+KDwvc3Bhbj48L3NwYW4+PHNwYW4gY2xhc3M9InMxIj48c3BhbiBjbGFzcz0ic3RyIj4nSFRNTCBjb250ZW50IHRoYXQgZ290IHBhc3NlZCBmcm9tIHNlcnZlci4nPC9zcGFuPjwvc3Bhbj48c3BhbiBjbGFzcz0icCI+PHNwYW4gY2xhc3M9InB1biI+KTs8L3NwYW4+PC9zcGFuPgo8c3BhbiBjbGFzcz0iZXJyIj48c3BhbiBjbGFzcz0icGxuIj4mbmJzcDsmbmJzcDsmbmJzcDs8L3NwYW4+PC9zcGFuPiA8c3BhbiBjbGFzcz0icCI+PHNwYW4gY2xhc3M9InB1biI+fSw8L3NwYW4+PC9zcGFuPiA8c3BhbiBjbGFzcz0ibWkiPjxzcGFuIGNsYXNzPSJsaXQiPjMwMDA8L3NwYW4+PC9zcGFuPjxzcGFuIGNsYXNzPSJwIj48c3BhbiBjbGFzcz0icHVuIj4pOzwvc3Bhbj48L3NwYW4+CjxzcGFuIGNsYXNzPSJwIj48c3BhbiBjbGFzcz0icHVuIj59PC9zcGFuPjwvc3Bhbj4KCjxzcGFuIGNsYXNzPSJrZCI+PHNwYW4gY2xhc3M9Imt3ZCI+ZnVuY3Rpb248L3NwYW4+PC9zcGFuPiA8c3BhbiBjbGFzcz0ibngiPjxzcGFuIGNsYXNzPSJwbG4iPmFqYXhTYXZlPC9zcGFuPjwvc3Bhbj48c3BhbiBjbGFzcz0icCI+PHNwYW4gY2xhc3M9InB1biI+KCk8L3NwYW4+PC9zcGFuPiA8c3BhbiBjbGFzcz0icCI+PHNwYW4gY2xhc3M9InB1biI+ezwvc3Bhbj48L3NwYW4+CjxzcGFuIGNsYXNzPSJlcnIiPjxzcGFuIGNsYXNzPSJwbG4iPiZuYnNwOyZuYnNwOyZuYnNwOzwvc3Bhbj48L3NwYW4+IDxzcGFuIGNsYXNzPSJrZCI+PHNwYW4gY2xhc3M9Imt3ZCI+dmFyPC9zcGFuPjwvc3Bhbj4gPHNwYW4gY2xhc3M9Im54Ij48c3BhbiBjbGFzcz0icGxuIj5lZDwvc3Bhbj48L3NwYW4+IDxzcGFuIGNsYXNzPSJvIj48c3BhbiBjbGFzcz0icHVuIj49PC9zcGFuPjwvc3Bhbj4gPHNwYW4gY2xhc3M9Im54Ij48c3BhbiBjbGFzcz0icGxuIj50aW55TUNFPC9zcGFuPjwvc3Bhbj48c3BhbiBjbGFzcz0icCI+PHNwYW4gY2xhc3M9InB1biI+Ljwvc3Bhbj48L3NwYW4+PHNwYW4gY2xhc3M9Im54Ij48c3BhbiBjbGFzcz0ia3dkIj5nZXQ8L3NwYW4+PC9zcGFuPjxzcGFuIGNsYXNzPSJwIj48c3BhbiBjbGFzcz0icHVuIj4oPC9zcGFuPjwvc3Bhbj48c3BhbiBjbGFzcz0iczEiPjxzcGFuIGNsYXNzPSJzdHIiPidjb250ZW50Jzwvc3Bhbj48L3NwYW4+PHNwYW4gY2xhc3M9InAiPjxzcGFuIGNsYXNzPSJwdW4iPik7PC9zcGFuPjwvc3Bhbj4KCjxzcGFuIGNsYXNzPSJlcnIiPjxzcGFuIGNsYXNzPSJwbG4iPiZuYnNwOyZuYnNwOyZuYnNwOzwvc3Bhbj48L3NwYW4+IDxzcGFuIGNsYXNzPSJjMSI+PHNwYW4gY2xhc3M9ImNvbSI+Ly8gRG8geW91IGFqYXggY2FsbCBoZXJlLCB3aW5kb3cuc2V0VGltZW91dCBmYWtlcyBhamF4IGNhbGw8L3NwYW4+PC9zcGFuPgo8c3BhbiBjbGFzcz0iZXJyIj48c3BhbiBjbGFzcz0icGxuIj4mbmJzcDsmbmJzcDsmbmJzcDs8L3NwYW4+PC9zcGFuPiA8c3BhbiBjbGFzcz0ibngiPjxzcGFuIGNsYXNzPSJwbG4iPmVkPC9zcGFuPjwvc3Bhbj48c3BhbiBjbGFzcz0icCI+PHNwYW4gY2xhc3M9InB1biI+Ljwvc3Bhbj48L3NwYW4+PHNwYW4gY2xhc3M9Im54Ij48c3BhbiBjbGFzcz0icGxuIj5zZXRQcm9ncmVzc1N0YXRlPC9zcGFuPjwvc3Bhbj48c3BhbiBjbGFzcz0icCI+PHNwYW4gY2xhc3M9InB1biI+KDwvc3Bhbj48L3NwYW4+PHNwYW4gY2xhc3M9Im1pIj48c3BhbiBjbGFzcz0ibGl0Ij4xPC9zcGFuPjwvc3Bhbj48c3BhbiBjbGFzcz0icCI+PHNwYW4gY2xhc3M9InB1biI+KTs8L3NwYW4+PC9zcGFuPiA8c3BhbiBjbGFzcz0iYzEiPjxzcGFuIGNsYXNzPSJjb20iPi8vIFNob3cgcHJvZ3Jlc3M8L3NwYW4+PC9zcGFuPgo8c3BhbiBjbGFzcz0iZXJyIj48c3BhbiBjbGFzcz0icGxuIj4mbmJzcDsmbmJzcDsmbmJzcDs8L3NwYW4+PC9zcGFuPiA8c3BhbiBjbGFzcz0ibmIiPjxzcGFuIGNsYXNzPSJwbG4iPndpbmRvdzwvc3Bhbj48L3NwYW4+PHNwYW4gY2xhc3M9InAiPjxzcGFuIGNsYXNzPSJwdW4iPi48L3NwYW4+PC9zcGFuPjxzcGFuIGNsYXNzPSJueCI+PHNwYW4gY2xhc3M9InBsbiI+c2V0VGltZW91dDwvc3Bhbj48L3NwYW4+PHNwYW4gY2xhc3M9InAiPjxzcGFuIGNsYXNzPSJwdW4iPig8L3NwYW4+PC9zcGFuPjxzcGFuIGNsYXNzPSJrZCI+PHNwYW4gY2xhc3M9Imt3ZCI+ZnVuY3Rpb248L3NwYW4+PC9zcGFuPjxzcGFuIGNsYXNzPSJwIj48c3BhbiBjbGFzcz0icHVuIj4oKTwvc3Bhbj48L3NwYW4+IDxzcGFuIGNsYXNzPSJwIj48c3BhbiBjbGFzcz0icHVuIj57PC9zcGFuPjwvc3Bhbj4KPHNwYW4gY2xhc3M9ImVyciI+PHNwYW4gY2xhc3M9InBsbiI+Jm5ic3A7Jm5ic3A7Jm5ic3A7PC9zcGFuPjwvc3Bhbj4gPHNwYW4gY2xhc3M9ImVyciI+PHNwYW4gY2xhc3M9InBsbiI+Jm5ic3A7Jm5ic3A7Jm5ic3A7PC9zcGFuPjwvc3Bhbj4gPHNwYW4gY2xhc3M9Im54Ij48c3BhbiBjbGFzcz0icGxuIj5lZDwvc3Bhbj48L3NwYW4+PHNwYW4gY2xhc3M9InAiPjxzcGFuIGNsYXNzPSJwdW4iPi48L3NwYW4+PC9zcGFuPjxzcGFuIGNsYXNzPSJueCI+PHNwYW4gY2xhc3M9InBsbiI+c2V0UHJvZ3Jlc3NTdGF0ZTwvc3Bhbj48L3NwYW4+PHNwYW4gY2xhc3M9InAiPjxzcGFuIGNsYXNzPSJwdW4iPig8L3NwYW4+PC9zcGFuPjxzcGFuIGNsYXNzPSJtaSI+PHNwYW4gY2xhc3M9ImxpdCI+MDwvc3Bhbj48L3NwYW4+PHNwYW4gY2xhc3M9InAiPjxzcGFuIGNsYXNzPSJwdW4iPik7PC9zcGFuPjwvc3Bhbj4gPHNwYW4gY2xhc3M9ImMxIj48c3BhbiBjbGFzcz0iY29tIj4vLyBIaWRlIHByb2dyZXNzPC9zcGFuPjwvc3Bhbj4KPHNwYW4gY2xhc3M9ImVyciI+PHNwYW4gY2xhc3M9InBsbiI+Jm5ic3A7Jm5ic3A7Jm5ic3A7PC9zcGFuPjwvc3Bhbj4gPHNwYW4gY2xhc3M9ImVyciI+PHNwYW4gY2xhc3M9InBsbiI+Jm5ic3A7Jm5ic3A7Jm5ic3A7PC9zcGFuPjwvc3Bhbj4gPHNwYW4gY2xhc3M9Im54Ij48c3BhbiBjbGFzcz0icGxuIj5hbGVydDwvc3Bhbj48L3NwYW4+PHNwYW4gY2xhc3M9InAiPjxzcGFuIGNsYXNzPSJwdW4iPig8L3NwYW4+PC9zcGFuPjxzcGFuIGNsYXNzPSJueCI+PHNwYW4gY2xhc3M9InBsbiI+ZWQ8L3NwYW4+PC9zcGFuPjxzcGFuIGNsYXNzPSJwIj48c3BhbiBjbGFzcz0icHVuIj4uPC9zcGFuPjwvc3Bhbj48c3BhbiBjbGFzcz0ibngiPjxzcGFuIGNsYXNzPSJwbG4iPmdldENvbnRlbnQ8L3NwYW4+PC9zcGFuPjxzcGFuIGNsYXNzPSJwIj48c3BhbiBjbGFzcz0icHVuIj4oKSk7PC9zcGFuPjwvc3Bhbj4KPHNwYW4gY2xhc3M9ImVyciI+PHNwYW4gY2xhc3M9InBsbiI+Jm5ic3A7Jm5ic3A7Jm5ic3A7PC9zcGFuPjwvc3Bhbj4gPHNwYW4gY2xhc3M9InAiPjxzcGFuIGNsYXNzPSJwdW4iPn0sPC9zcGFuPjwvc3Bhbj4gPHNwYW4gY2xhc3M9Im1pIj48c3BhbiBjbGFzcz0ibGl0Ij4zMDAwPC9zcGFuPjwvc3Bhbj48c3BhbiBjbGFzcz0icCI+PHNwYW4gY2xhc3M9InB1biI+KTs8L3NwYW4+PC9zcGFuPgo8c3BhbiBjbGFzcz0icCI+PHNwYW4gY2xhc3M9InB1biI+fTwvc3Bhbj48L3NwYW4+CjxzcGFuIGNsYXNzPSJvIj48c3BhbiBjbGFzcz0icHVuIj4mbHQ7PC9zcGFuPjwvc3Bhbj48c3BhbiBjbGFzcz0iZXJyIj48c3BhbiBjbGFzcz0icHVuIj4vPC9zcGFuPjxzcGFuIGNsYXNzPSJwbG4iPnNjcmlwdDwvc3Bhbj48c3BhbiBjbGFzcz0icHVuIj4mZ3Q7PC9zcGFuPjwvc3Bhbj4KCjxzcGFuIGNsYXNzPSJvIj48c3BhbiBjbGFzcz0icHVuIj4mbHQ7PC9zcGFuPjwvc3Bhbj48c3BhbiBjbGFzcz0ibngiPjxzcGFuIGNsYXNzPSJwbG4iPmZvcm08L3NwYW4+PC9zcGFuPiA8c3BhbiBjbGFzcz0ibngiPjxzcGFuIGNsYXNzPSJwbG4iPm1ldGhvZDwvc3Bhbj48L3NwYW4+PHNwYW4gY2xhc3M9Im8iPjxzcGFuIGNsYXNzPSJwdW4iPj08L3NwYW4+PC9zcGFuPjxzcGFuIGNsYXNzPSJzMiI+PHNwYW4gY2xhc3M9InN0ciI+InBvc3QiPC9zcGFuPjwvc3Bhbj4gPHNwYW4gY2xhc3M9Im54Ij48c3BhbiBjbGFzcz0icGxuIj5hY3Rpb248L3NwYW4+PC9zcGFuPjxzcGFuIGNsYXNzPSJvIj48c3BhbiBjbGFzcz0icHVuIj49PC9zcGFuPjwvc3Bhbj48c3BhbiBjbGFzcz0iczIiPjxzcGFuIGNsYXNzPSJzdHIiPiJzb21lcGFnZSI8L3NwYW4+PC9zcGFuPjxzcGFuIGNsYXNzPSJvIj48c3BhbiBjbGFzcz0icHVuIj4mZ3Q7PC9zcGFuPjwvc3Bhbj4KPHNwYW4gY2xhc3M9ImVyciI+PHNwYW4gY2xhc3M9InBsbiI+Jm5ic3A7Jm5ic3A7Jm5ic3A7PC9zcGFuPjwvc3Bhbj4gPHNwYW4gY2xhc3M9Im8iPjxzcGFuIGNsYXNzPSJwdW4iPiZsdDs8L3NwYW4+PC9zcGFuPjxzcGFuIGNsYXNzPSJueCI+PHNwYW4gY2xhc3M9InBsbiI+dGV4dGFyZWE8L3NwYW4+PC9zcGFuPiA8c3BhbiBjbGFzcz0ibngiPjxzcGFuIGNsYXNzPSJwbG4iPm5hbWU8L3NwYW4+PC9zcGFuPjxzcGFuIGNsYXNzPSJvIj48c3BhbiBjbGFzcz0icHVuIj49PC9zcGFuPjwvc3Bhbj48c3BhbiBjbGFzcz0iczIiPjxzcGFuIGNsYXNzPSJzdHIiPiJjb250ZW50Ijwvc3Bhbj48L3NwYW4+IDxzcGFuIGNsYXNzPSJueCI+PHNwYW4gY2xhc3M9InBsbiI+c3R5bGU8L3NwYW4+PC9zcGFuPjxzcGFuIGNsYXNzPSJvIj48c3BhbiBjbGFzcz0icHVuIj49PC9zcGFuPjwvc3Bhbj48c3BhbiBjbGFzcz0iczIiPjxzcGFuIGNsYXNzPSJzdHIiPiJ3aWR0aDoxMDAlIjwvc3Bhbj48L3NwYW4+PHNwYW4gY2xhc3M9Im8iPjxzcGFuIGNsYXNzPSJwdW4iPiZndDs8L3NwYW4+PC9zcGFuPgo8c3BhbiBjbGFzcz0iZXJyIj48c3BhbiBjbGFzcz0icGxuIj4mbmJzcDsmbmJzcDsmbmJzcDs8L3NwYW4+PC9zcGFuPiA8c3BhbiBjbGFzcz0ibyI+PHNwYW4gY2xhc3M9InB1biI+Jmx0Ozwvc3Bhbj48L3NwYW4+PHNwYW4gY2xhc3M9ImVyciI+PHNwYW4gY2xhc3M9InB1biI+Lzwvc3Bhbj48c3BhbiBjbGFzcz0icGxuIj50ZXh0YXJlYTwvc3Bhbj48c3BhbiBjbGFzcz0icHVuIj4mZ3Q7PC9zcGFuPjwvc3Bhbj4KPHNwYW4gY2xhc3M9Im8iPjxzcGFuIGNsYXNzPSJwdW4iPiZsdDs8L3NwYW4+PC9zcGFuPjxzcGFuIGNsYXNzPSJlcnIiPjxzcGFuIGNsYXNzPSJwdW4iPi88L3NwYW4+PHNwYW4gY2xhc3M9InBsbiI+Zm9ybTwvc3Bhbj48c3BhbiBjbGFzcz0icHVuIj4mZ3Q7PC9zcGFuPjwvc3Bhbj4KPC9jb2RlPjwvcHJlPg==', '2', '2019-10-27 12:43:05');
INSERT INTO `project_comment` VALUES ('4', '1', 'PHByZT48Y29kZT4mbHQ7c2NyaXB0IHNyYz0iaHR0cDovL2V4YW1wbGUuY29tL3J1bm1lLmpzIiZndDsmbHQ7L3NjcmlwdDwvY29kZT48L3ByZT4=', '2', '2019-10-27 12:46:45');
INSERT INTO `project_comment` VALUES ('5', '1', 'PHA+dGVzdDEyMzwvcD4=', '2', '2019-10-27 13:51:53');
INSERT INTO `project_comment` VALUES ('6', '5', 'PHA+dGVzdDEyMzwvcD4=', '2', '2019-10-27 21:52:58');
INSERT INTO `project_comment` VALUES ('7', '6', 'PHA+dGVzdDU2NzwvcD4=', '2', '2019-10-31 12:30:36');
INSERT INTO `project_comment` VALUES ('8', '6', 'PHA+dGVzdDU2NzwvcD4=', '2', '2019-10-31 20:24:15');
INSERT INTO `project_comment` VALUES ('9', '6', 'dGVzdDEyMzQ1', '2', '2019-10-31 20:26:05');
INSERT INTO `project_comment` VALUES ('10', '6', 'aWRrIG5vdyE=', '2', '2019-10-31 20:27:31');
INSERT INTO `project_comment` VALUES ('11', '1', 'aSBmb3Jnb3QgaXQh', '2', '2019-10-31 20:28:22');
INSERT INTO `project_comment` VALUES ('12', '5', 'PHA+T2theTwvcD4=', '2', '2019-10-31 20:44:11');
INSERT INTO `project_comment` VALUES ('13', '5', 'PHA+T2theTwvcD4=', '2', '2019-10-31 20:44:12');
INSERT INTO `project_comment` VALUES ('14', '5', 'PHA+T2theTwvcD4=', '2', '2019-10-31 20:44:12');
INSERT INTO `project_comment` VALUES ('15', '5', 'PHA+T2theTwvcD4=', '2', '2019-10-31 20:44:12');
INSERT INTO `project_comment` VALUES ('16', '5', 'PHA+T2theTwvcD4=', '2', '2019-10-31 20:44:12');
INSERT INTO `project_comment` VALUES ('17', '5', 'PHA+T2theTwvcD4=', '2', '2019-10-31 20:44:12');
INSERT INTO `project_comment` VALUES ('18', '7', 'dGVzdA==', '2', '2019-11-02 20:59:57');
INSERT INTO `project_comment` VALUES ('19', '7', 'dGVzdDE=', '2', '2019-11-02 21:00:16');
INSERT INTO `project_comment` VALUES ('20', '11', 'PHA+dGVzdGRhc2RhcyBkJm5ic3A7PC9wPg==', '3', '2020-01-14 23:39:36');
INSERT INTO `project_comment` VALUES ('21', '10', 'aWRr', '3', '2020-01-14 23:42:24');
INSERT INTO `project_comment` VALUES ('22', '10', 'PHA+UmVtaW5kZXIhISE8L3A+', '3', '2020-01-15 13:43:06');
INSERT INTO `project_comment` VALUES ('23', '8', 'PHA+Pz8/Pz88L3A+', '3', '2020-01-15 13:43:44');
INSERT INTO `project_comment` VALUES ('24', '14', 'dGVzdDk5OQ==', '3', '2020-01-15 14:14:53');
INSERT INTO `project_comment` VALUES ('25', '16', 'PHA+Z3ZnejwvcD4=', '3', '2020-01-23 13:00:19');
INSERT INTO `project_comment` VALUES ('26', '8', 'YXNkYXNkYQ==', '3', '2020-01-26 13:22:52');
INSERT INTO `project_comment` VALUES ('27', '17', 'aWRr', '3', '2020-02-03 14:57:36');
INSERT INTO `project_comment` VALUES ('28', '21', 'PHA+YWJiYmJiYjwvcD4=', '3', '2020-02-06 13:09:40');
INSERT INTO `project_comment` VALUES ('29', '22', 'PHA+dGVzdCAwNi4wMi4yMDIwMjwvcD4=', '3', '2020-02-06 13:10:20');
INSERT INTO `project_comment` VALUES ('30', '22', 'PHA+PGVtPjxzdHJvbmc+dGVzdCAwNi4wMi4yMDIwMjwvc3Ryb25nPjwvZW0+PC9wPg==', '3', '2020-02-06 13:10:28');
INSERT INTO `project_comment` VALUES ('31', '22', 'dGVzdCAwNi4wMi4yMDIwMg==', '3', '2020-02-06 13:10:43');
INSERT INTO `project_comment` VALUES ('32', '18', 'dGVzdCAwNi4wMi4yMDIwMg==', '3', '2020-02-06 13:11:41');
INSERT INTO `project_comment` VALUES ('33', '19', 'MTIz', '3', '2020-02-06 13:14:33');
INSERT INTO `project_comment` VALUES ('34', '23', 'dGVzdCBlc2thbA==', '3', '2020-02-06 13:16:20');
INSERT INTO `project_comment` VALUES ('35', '24', 'PHA+dGVzdDwvcD4=', '3', '2020-02-06 13:37:18');
INSERT INTO `project_comment` VALUES ('36', '19', 'PHA+PGEgaHJlZj0iVTpcU2hhcmVkXERva3VtZW50ZVxDb21wdXRlciBUZXN0ZWQuZG9jeCI+VTpcU2hhcmVkXERva3VtZW50ZVxDb21wdXRlciBUZXN0ZWQuZG9jeDwvYT48L3A+', '3', '2020-02-06 14:20:58');
INSERT INTO `project_comment` VALUES ('37', '19', 'PHA+PGEgaHJlZj0iZmlsZTovL1U6XFNoYXJlZFxEb2t1bWVudGVcQ29tcHV0ZXIgVGVzdGVkLmRvY3giPmZpbGU6Ly9VOlxTaGFyZWRcRG9rdW1lbnRlXENvbXB1dGVyIFRlc3RlZC5kb2N4PC9hPjwvcD4=', '3', '2020-02-06 14:21:28');
INSERT INTO `project_comment` VALUES ('38', '19', 'PHA+PGEgaHJlZj0iZmlsZTovL1U6L1NoYXJlZC9Eb2t1bWVudGUvQ29tcHV0ZXIgVGVzdGVkLmRvY3giPmZpbGU6Ly9VOi9TaGFyZWQvRG9rdW1lbnRlL0NvbXB1dGVyIFRlc3RlZC5kb2N4PC9hPjwvcD4=', '3', '2020-02-06 14:21:52');
INSERT INTO `project_comment` VALUES ('39', '19', 'PHA+PGEgaHJlZj0iVTovU2hhcmVkL0Rva3VtZW50ZS9Db21wdXRlciBUZXN0ZWQuZG9jeCI+VTovU2hhcmVkL0Rva3VtZW50ZS9Db21wdXRlciBUZXN0ZWQuZG9jeDwvYT48L3A+', '3', '2020-02-06 14:22:07');
INSERT INTO `project_comment` VALUES ('40', '19', 'PHA+ZmlsZTovL1U6L1NoYXJlZC9Eb2t1bWVudGUvQ29tcHV0ZXIgVGVzdGVkLmRvY3g8L3A+', '3', '2020-02-06 14:22:16');
INSERT INTO `project_comment` VALUES ('41', '19', 'PHA+PGEgaHJlZj0iZmlsZTovLy9VOlxTaGFyZWRcRG9rdW1lbnRlXENvbXB1dGVyIFRlc3RlZC5kb2N4Ij5maWxlOi8vL1U6XFNoYXJlZFxEb2t1bWVudGVcQ29tcHV0ZXIgVGVzdGVkLmRvY3g8L2E+PC9wPg==', '3', '2020-02-06 14:30:28');
INSERT INTO `project_comment` VALUES ('42', '19', 'PHA+PGEgaHJlZj0iZmlsZTovL1U6XFNoYXJlZFxEb2t1bWVudGVcIj5maWxlOi8vVTpcU2hhcmVkXERva3VtZW50ZVw8L2E+PC9wPg==', '3', '2020-02-06 14:32:14');
INSERT INTO `project_comment` VALUES ('43', '19', 'PHA+PGEgaHJlZj0iVTpcU2hhcmVkXERva3VtZW50ZSIgdGFyZ2V0PSJfZXhwbG9yZXIuZXhlIj5MaW5rIFRleHQ8L2E+PC9wPg==', '3', '2020-02-06 14:34:50');
INSERT INTO `project_comment` VALUES ('44', '19', 'PGhyIC8+CjxwPmZnZmdmZzwvcD4KPGhyIC8+CjxwPiZuYnNwOzwvcD4=', '3', '2020-02-06 15:13:58');
INSERT INTO `project_comment` VALUES ('45', '25', 'aGpiaGo=', '3', '2020-02-07 13:17:51');
INSERT INTO `project_comment` VALUES ('46', '25', 'PHA+bW5tYm5tPC9wPg==', '3', '2020-02-07 13:18:08');
INSERT INTO `project_comment` VALUES ('47', '26', 'Z3Q=', '3', '2020-02-19 10:58:36');
INSERT INTO `project_comment` VALUES ('48', '17', 'Z2hnaA==', '3', '2020-03-11 13:52:50');

-- ----------------------------
-- Table structure for `project_entry`
-- ----------------------------
DROP TABLE IF EXISTS `project_entry`;
CREATE TABLE `project_entry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) DEFAULT '0',
  `project` int(11) NOT NULL,
  `info` varchar(255) DEFAULT NULL,
  `descri` longtext,
  `owner` int(11) DEFAULT NULL,
  `creator` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `lastanswer` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `solveuntil` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `solution` longtext,
  `solvedat` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of project_entry
-- ----------------------------
INSERT INTO `project_entry` VALUES ('1', '0', '1', 'LichtSchranke fehlt', 'LichtSchranke fehlt', '1', '2', '0', '2019-10-26 21:32:35', '2019-10-23 08:10:01', '2019-11-10 00:00:00', 'gefunden!', '2020-01-14 23:48:15');
INSERT INTO `project_entry` VALUES ('5', '1', '1', 'test', 'test1', '1', '2', '0', '2019-10-27 21:45:56', '2019-10-27 21:45:56', '2019-10-30 15:14:56', 'test12345\r\ntest test test\r\ntestabc', '2020-01-14 23:48:15');
INSERT INTO `project_entry` VALUES ('6', '2', '1', 'test1', 'test123', '3', '2', '0', '2019-10-31 11:31:58', '2019-10-31 11:31:58', '2019-11-20 00:00:00', 'test123', '2020-01-14 23:48:15');
INSERT INTO `project_entry` VALUES ('7', '0', '1', 'FuÃŸendschalter nicht aufgelegt', 'FuÃŸendschalter nicht aufgelegt', '1', '2', '0', '2019-10-31 20:58:53', '2019-10-31 20:58:53', '2019-11-15 00:00:00', 'Puhh', '2020-01-14 23:48:15');
INSERT INTO `project_entry` VALUES ('8', '2', '1', 'test123', 'test12345', '2', '2', '0', '2019-11-02 17:45:25', '2019-11-02 17:45:25', '2020-01-31 00:00:00', 'asdasdasd', '2020-01-26 13:23:27');
INSERT INTO `project_entry` VALUES ('9', '1', '1', 'Test', 'Test1', '3', '3', '0', '2019-11-04 08:52:13', '2019-11-04 08:52:13', '2019-11-07 08:52:13', 'abcde', '2020-01-14 23:48:15');
INSERT INTO `project_entry` VALUES ('10', '1', '1', 'Test', 'Test1', '3', '1', '0', '2019-11-05 07:56:51', '2019-11-05 07:56:51', '2020-01-31 00:00:00', '11567', '2020-02-03 14:57:15');
INSERT INTO `project_entry` VALUES ('11', '2', '1', 'Test', 'Test', '3', '1', '0', '2019-11-18 11:14:32', '2019-11-18 11:14:32', '2019-11-21 11:14:32', 'ALL GOOD', '2020-02-03 14:58:04');
INSERT INTO `project_entry` VALUES ('12', '2', '1', '123', '345', '1', '3', '0', '2019-11-19 11:16:09', '2019-11-19 11:16:09', '2019-11-22 11:16:09', 'asdasfasf', '2020-01-14 23:48:15');
INSERT INTO `project_entry` VALUES ('13', '1', '1', 'test999', 'test999', '3', '3', '0', '2020-01-15 14:12:50', '2020-01-15 14:12:50', '2020-01-18 14:12:50', 'test999', '2020-01-15 14:14:24');
INSERT INTO `project_entry` VALUES ('14', '2', '1', 'test999test999', 'test999test999', '3', '3', '0', '2020-01-15 14:14:35', '2020-01-15 14:14:35', '2020-01-31 00:00:00', 'test999test999', '2020-01-15 14:15:12');
INSERT INTO `project_entry` VALUES ('15', '1', '1', 'abdcef', 'ghijklmnop', '1', '3', '0', '2020-01-15 14:17:19', '2020-01-15 14:17:19', '2020-01-18 14:17:19', 'bn vn', '2020-01-24 14:24:55');
INSERT INTO `project_entry` VALUES ('16', '1', '1', 'sdfsdfsdf', 'dsfsdsdf', '3', '3', '0', '2020-01-20 15:48:20', '2020-01-20 15:48:20', '2020-01-23 15:48:20', 'gjhjfgjffgh', '2020-02-03 14:57:54');
INSERT INTO `project_entry` VALUES ('17', '1', '1', 'aaabbbccc', 'dddeeffgg', '1', '3', '0', '2020-01-22 14:08:31', '2020-01-22 14:08:31', '2020-03-26 00:00:00', 'ghghghgh', '2020-03-11 13:54:05');
INSERT INTO `project_entry` VALUES ('18', '1', '1', 'test1234567', 'test1234567', '1', '3', '3', '2020-02-06 01:33:48', '2020-02-06 01:33:48', '2020-02-10 00:00:00', null, null);
INSERT INTO `project_entry` VALUES ('19', '1', '1', 'test1234567', 'test1234567', '1', '3', '3', '2020-02-06 01:34:39', '2020-02-06 01:34:39', '2020-02-06 00:00:00', null, null);
INSERT INTO `project_entry` VALUES ('20', '1', '1', 'test1234567', 'test1234567', '1', '3', '3', '2020-02-06 01:36:14', '2020-02-06 01:36:14', '2020-02-09 03:36:14', null, null);
INSERT INTO `project_entry` VALUES ('21', '1', '1', 'abbbbbb', 'abbbbbb', '1', '3', '0', '2020-02-06 13:08:49', '2020-02-06 13:08:49', '2020-02-09 15:08:49', 'abbbbbb', '2020-02-06 13:09:46');
INSERT INTO `project_entry` VALUES ('22', '3', '1', 'test 06.02.20202', 'test 06.02.20202', '2', '3', '3', '2020-02-06 13:10:10', '2020-02-06 13:10:10', '2020-02-29 00:00:00', null, null);
INSERT INTO `project_entry` VALUES ('23', '1', '1', 'test eskal', 'test eskal', '1', '3', '3', '2020-02-06 13:16:11', '2020-02-06 13:16:11', '2020-02-06 00:00:00', null, null);
INSERT INTO `project_entry` VALUES ('24', '1', '1', 'Kleppel', 'test', '1', '3', '3', '2020-02-06 13:36:28', '2020-02-06 13:36:28', '2020-02-09 15:36:28', 'test', null);
INSERT INTO `project_entry` VALUES ('25', '2', '1', 'jkhjk', 'hjkhjk', '2', '3', '0', '2020-02-07 13:17:14', '2020-02-07 13:17:14', '2020-02-07 00:00:00', 'ghcghgvh', '2020-02-07 13:19:33');
INSERT INTO `project_entry` VALUES ('26', '2', '1', 'test1243', 'test123', '2', '3', '0', '2020-02-19 10:56:56', '2020-02-19 10:56:56', '2020-03-20 20:00:00', 'fdf', '2020-02-19 10:59:40');

-- ----------------------------
-- Table structure for `project_history`
-- ----------------------------
DROP TABLE IF EXISTS `project_history`;
CREATE TABLE `project_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project` int(11) NOT NULL,
  `type` int(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `creator` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of project_history
-- ----------------------------

-- ----------------------------
-- Table structure for `project_responsible`
-- ----------------------------
DROP TABLE IF EXISTS `project_responsible`;
CREATE TABLE `project_responsible` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `projectid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of project_responsible
-- ----------------------------
INSERT INTO `project_responsible` VALUES ('1', '1', '2');
INSERT INTO `project_responsible` VALUES ('2', '1', '1');

-- ----------------------------
-- Table structure for `session`
-- ----------------------------
DROP TABLE IF EXISTS `session`;
CREATE TABLE `session` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USERID` int(255) NOT NULL,
  `HASH` varchar(255) NOT NULL,
  `BROWSER` varchar(255) NOT NULL,
  `OS` varchar(255) NOT NULL,
  `IP` varchar(255) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of session
-- ----------------------------
INSERT INTO `session` VALUES ('1', '1', 'e554434a2c5137c57aedc5094914ba19', '', '', '', '2019-10-08 22:42:18');
INSERT INTO `session` VALUES ('2', '1', '9a088c01674f28b4dcb51e1a1eaf6767', '', '', '', '2019-10-09 22:58:01');
INSERT INTO `session` VALUES ('3', '1', '95668185437168e0ce088cedc9e224d6', '', '', '', '2019-10-28 07:32:05');
INSERT INTO `session` VALUES ('4', '1', 'f68e5cf89e7ad5b79b49e7b80e8da369', '', '', '', '2019-10-28 08:26:53');
INSERT INTO `session` VALUES ('5', '1', '62757aeddbd5ea694ff8696eaac1793a', '', '', '', '2019-10-28 10:29:19');
INSERT INTO `session` VALUES ('6', '2', '488f90632f312df2a6363ce9c3622a24', '', '', '', '2019-10-28 19:54:20');
INSERT INTO `session` VALUES ('7', '3', '66a35cc587f18cded87d4aaac35ca4ac', '', '', '', '2019-10-29 12:34:11');
INSERT INTO `session` VALUES ('8', '2', '0a7fec28e3dc4803e26c13b7dc4240fd', '', '', '', '2019-10-30 09:58:22');
INSERT INTO `session` VALUES ('9', '1', '04c36572a6471a2cbd7e38924822e08c', '', '', '', '2019-10-31 00:00:27');
INSERT INTO `session` VALUES ('10', '2', '47ec3ed4344425caf6e083ecc4fb1746', '', '', '', '2019-10-31 09:10:20');
INSERT INTO `session` VALUES ('11', '2', '8f382ebd67fd0a77bc7a80cce8433603', '', '', '', '2019-10-31 18:01:27');
INSERT INTO `session` VALUES ('12', '1', '987c3e613b00ce79d87191bbfd05e1d5', '', '', '', '2019-11-01 18:44:13');
INSERT INTO `session` VALUES ('13', '1', 'c2a84031ac272650f4aa80a869706023', '', '', '', '2019-11-02 09:22:05');
INSERT INTO `session` VALUES ('14', '2', '72292814de79347a022bd284cd38b4e9', '', '', '', '2019-11-02 20:58:42');
INSERT INTO `session` VALUES ('15', '1', '0e0d1fff528800a38edcf66cb843b785', '', '', '', '2019-11-03 00:37:59');
INSERT INTO `session` VALUES ('16', '1', '270ed2156a0b4b223bf13e8fe93826bc', '', '', '', '2019-11-03 11:44:42');
INSERT INTO `session` VALUES ('17', '1', '02ca3d441b1aa7ca79e6bf5eb99e3676', '', '', '', '2019-11-04 05:54:00');
INSERT INTO `session` VALUES ('18', '3', 'ca1aaa3e955482aed2117816f540a183', '', '', '', '2019-11-04 08:34:21');
INSERT INTO `session` VALUES ('19', '1', '323d6317f2666192cf15360e8d9eeaf4', '', '', '', '2019-11-04 13:57:06');
INSERT INTO `session` VALUES ('20', '1', '3bcb5191f6c055dd20e2a5c01402928e', '', '', '', '2019-11-05 07:55:07');
INSERT INTO `session` VALUES ('21', '1', '0f0bc1c2ea8c830358f6c95257138f4f', '', '', '', '2019-11-06 10:04:12');
INSERT INTO `session` VALUES ('22', '1', '5c958f51c10d22d2c2b7b5d76a5336ab', '', '', '', '2019-11-06 10:08:53');
INSERT INTO `session` VALUES ('23', '1', '4f45377b0debbf354648d82ce7c25818', '', '', '', '2019-11-07 20:28:54');
INSERT INTO `session` VALUES ('24', '1', 'e7fce20f114505be9d3247373a22768b', '', '', '', '2019-11-08 12:19:37');
INSERT INTO `session` VALUES ('25', '1', 'efea72536535da66e417ff6d41ab9500', '', '', '', '2019-11-08 12:36:39');
INSERT INTO `session` VALUES ('26', '2', '118eb530bb25c1889c4de9bb8b891545', '', '', '', '2019-11-08 23:13:06');
INSERT INTO `session` VALUES ('27', '1', 'befe6b4cb612c2fab58e75551cbed8b8', '', '', '', '2019-11-14 11:11:52');
INSERT INTO `session` VALUES ('28', '1', '4900771c6a6e18d5dd606b8efaf0a099', '', '', '', '2019-11-18 11:12:22');
INSERT INTO `session` VALUES ('29', '1', '3ddce578b948298e437f3faa1b31cdc0', '', '', '', '2019-11-18 11:12:42');
INSERT INTO `session` VALUES ('30', '3', 'a8dcb1c3445c91bf8d335f35b66d99b0', '', '', '', '2019-11-19 11:13:26');
INSERT INTO `session` VALUES ('31', '3', 'ecf66327830a3908dda672a2ae065922', '', '', '', '2020-01-07 12:53:48');
INSERT INTO `session` VALUES ('32', '3', '79d8247afa744bb54b578561e4b0517a', '', '', '', '2020-01-14 11:37:47');
INSERT INTO `session` VALUES ('33', '3', '6f0ba25574d8061cf65f8026c6cfe398', '', '', '', '2020-01-14 23:21:03');
INSERT INTO `session` VALUES ('34', '3', '462ef9b99747988973bfecd4f380aad2', '', '', '', '2020-01-15 10:40:37');
INSERT INTO `session` VALUES ('35', '3', 'b6919071b3350f95f1e7cea67f764816', '', '', '', '2020-01-20 15:47:12');

-- ----------------------------
-- Table structure for `settings`
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `setting` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES ('2', '_SITEURL', 'https://test.com/');
INSERT INTO `settings` VALUES ('3', '_SITETITLE', 'KeRnSFM');
INSERT INTO `settings` VALUES ('4', 'SMTP_Server', 'mail.test.com');
INSERT INTO `settings` VALUES ('5', 'SMTP_EMAIL', 'test@test.com');
INSERT INTO `settings` VALUES ('6', 'SMTP_PASS', 'test');

-- ----------------------------
-- Table structure for `types`
-- ----------------------------
DROP TABLE IF EXISTS `types`;
CREATE TABLE `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `names` varchar(255) NOT NULL,
  `enabled` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of types
-- ----------------------------
INSERT INTO `types` VALUES ('1', 'MetalMaster', '1');
INSERT INTO `types` VALUES ('2', 'MultiTherm', '1');
INSERT INTO `types` VALUES ('3', 'MultiTherm Eco', '1');
INSERT INTO `types` VALUES ('4', 'Omnimat', '1');
INSERT INTO `types` VALUES ('5', 'Xcel', '1');
INSERT INTO `types` VALUES ('6', 'LaserMat', '1');
INSERT INTO `types` VALUES ('7', 'PowerBlade', '1');
INSERT INTO `types` VALUES ('8', 'test', '1');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `USER` varchar(255) NOT NULL,
  `HASH` varchar(255) NOT NULL,
  `PASSW` varchar(255) NOT NULL,
  `FName` varchar(255) NOT NULL,
  `LName` varchar(255) NOT NULL DEFAULT '',
  `Department` int(11) NOT NULL DEFAULT '0',
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isAdm` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'heinz@gustaf.de', '3b3804efa4ff62d2cd04b308e99349e8', '$2y$10$SQAqUd6jwj85AJpo57AM5.0Vn1kaMPREzfR6PGF2oMA1xp3CJQbGi', 'Heinz', 'Kern', '5', '2019-08-04 12:30:42', '1');
INSERT INTO `user` VALUES ('2', 'heinz@gustaf.de', 'ee589f251b4863269806f7d533e088e7', '$2y$10$4JgYdsGsR71ciSbkXK4vme90rpjnv0bXdZIvIQG7lfBST8.hdmmzG', 'Heinz', 'Gustaf', '3', '2019-10-26 19:27:26', '0');
INSERT INTO `user` VALUES ('3', 'test@test.de', 'e83c3802efceb7e8fe8b85fadb25ea07', '$2y$10$SQAqUd6jwj85AJpo57AM5.0Vn1kaMPREzfR6PGF2oMA1xp3CJQbGi', 'Test', 'Username', '4', '2019-10-28 07:28:55', '1');

-- ----------------------------
-- Table structure for `user_log`
-- ----------------------------
DROP TABLE IF EXISTS `user_log`;
CREATE TABLE `user_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `log` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_log
-- ----------------------------
INSERT INTO `user_log` VALUES ('1', '2', 'has changed names', '2019-11-03 01:01:39');
INSERT INTO `user_log` VALUES ('2', '2', 'has changed password', '2019-11-03 01:17:18');
