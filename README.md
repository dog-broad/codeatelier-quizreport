# CodeAtelier submissions — quiz report

A companion plugin (`quiz_codeatelier`) for the [CodeAtelier](https://github.com/dog-broad/moodle-qtype_codeatelier) question type. It adds a **CodeAtelier submissions** tab to a quiz's results, showing the submissions report for every CodeAtelier question in that quiz (score and verdict distributions, per-test pass rates, language breakdown, attempt drill-down).

Viewing the report requires `mod/quiz:viewreports`, the same capability as the core quiz reports.

## Requirements

- Moodle 4.5 or later (tested on 4.5 and 5.2).
- The `qtype_codeatelier` question type.

## Installation

Install into `mod/quiz/report/codeatelier/` (under `public/` on Moodle 5.1+), then visit **Site administration → Notifications**.

```
git clone https://github.com/dog-broad/codeatelier-quizreport.git mod/quiz/report/codeatelier
```

## License

GPLv3 or later. See [LICENSE](LICENSE).
