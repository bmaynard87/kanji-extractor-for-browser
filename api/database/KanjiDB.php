<?php

class KanjiDB extends SQLite3 {

    public function __construct() {
        $this->open('database/kanji.db');
    }

    public function get_kanji_info($kanji) {
        $sql = "SELECT * FROM kanji WHERE literal = '$kanji'";
        $result = $this->query($sql);
        $kanji_row = $result->fetchArray(SQLITE3_ASSOC);

        return $kanji_row;
    }

}