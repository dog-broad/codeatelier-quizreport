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
 * CodeAtelier quiz submissions report.
 *
 * A thin Results-menu tab that renders the per-quiz CodeAtelier overview by
 * reusing the question type's own statistics layer and renderer — so this
 * plugin holds no reporting logic of its own, only the menu entry point.
 *
 * @package    quiz_codeatelier
 * @copyright  2026 CodeAtelier
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

use mod_quiz\local\reports\report_base;

defined('MOODLE_INTERNAL') || die();

/**
 * The report class the quiz reports framework instantiates for mode=codeatelier.
 */
class quiz_codeatelier_report extends report_base {

    public function display($quiz, $cm, $course) {
        global $PAGE;

        $context = context_module::instance($cm->id);
        require_capability('mod/quiz:viewreports', $context);

        $this->print_header_and_tabs($cm, $course, $quiz, 'codeatelier');

        $summaries = \qtype_codeatelier\local\report\question_stats::for_quiz($quiz->id, $context->id);
        /** @var qtype_codeatelier_renderer $renderer */
        $renderer = $PAGE->get_renderer('qtype_codeatelier');
        echo $renderer->render_quiz_report($summaries, $cm->id);

        return true;
    }

}
