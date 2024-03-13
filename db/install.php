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
 * Customcert module upgrade code.
 *
 * @package    mod_customcert
 * @copyright  2016 Mark Nelson <markn@moodle.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Customcert module upgrade code.
 *
 * @param int $oldversion the version we are upgrading from
 * @return bool always true
 */

/**
 * Custom code to be run on installing the plugin.
 */
function xmldb_customcert_install() {
    global $DB;

    $dbman = $DB->get_manager();

    // Add a default row to the customcert_task_progress table.
    $defaultdata = new stdClass();
    $defaultdata->taskname = 'email_certificate_task';
    $defaultdata->last_processed = 0;
    $defaultdata->total_certificate_to_process = 0;

    // Write close to ensure the transaction is committed.
    \core\session\manager::write_close();

    // Insert the default data into the table.
    $DB->insert_record('customcert_task_progress', $defaultdata);
    return true;
}
