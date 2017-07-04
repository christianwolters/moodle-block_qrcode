<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * This file contains the script for downloading/displaying a QR code.
 *
 * @package block_qrcode
 * @copyright 2017 T Gunkel
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(__FILE__) . '/../../config.php'); // To include $CFG.
global $CFG;
require_once($CFG->dirroot.'/blocks/qrcode/classes/output_image.php');

require_login();
$url = required_param('url', PARAM_TEXT);
$courseid = required_param('courseid', PARAM_INT);
$download = required_param('download', PARAM_BOOL);
$file = $CFG->localcachedir . '/block_qrcode/' . get_string('filename', 'block_qrcode') . '-' . $courseid . '.png';

$outputimg = new output_image($url, $courseid, $file);
$outputimg->output_image($download);