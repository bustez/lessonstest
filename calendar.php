<?php
error_reporting(E_ERROR);
echo `clear`;
    /**
     *
     * $serialMonth Порядковый номер месяца 1 до 12
     * $serialYear Порядковый номер года 1999 до 2003
     * $serialDay Порядковый день месяца 1 до 31
     * $serialWeeks
     * $serialMonth
     */
    $serialMonth = date("n");
    $serialYear = date("Y");
    $serialDay = date("j");
    $serialWeeks = array(1 => 'пн', 'вт', 'ср', 'чт', 'пт', 'сб', 'вс');
    $serialMonths = array(1 => 'янв', 'фвр', 'мрт', 'апр', 'май', 'июн', 'июл', 'авг', 'сен', 'окт', 'дек', 'янв');
    /**
     *
     * $numberDaysMonth Возвращает количество дней в месяце для заданного года и календаря
     *
     */

    $numberDaysMonth = cal_days_in_month(CAL_GREGORIAN, $serialMonth, $serialYear);
    /**
     *порядковый день недели 1...7 date("N")
     *firstDayMonth первый день
     *$lastDayMonth последний день
     */
    $firstDayMonth = date("N", mktime(0, 0, 0, $serialMonth, 1,$serialYear));
    $lastDayMonth = date("N", mktime(0, 0, 0, $serialMonth, $numberDaysMonth, $serialYear));
    /**
    echo $firstDayMonth;
    echo "\r\n";
    echo $lastDayMonth;
    */
    echo '   ' . date("m") /*$months[$serialMonth]*/ . '      ' . $serialYear;
    echo "\n";
    foreach ($serialWeeks as $day) {
        echo $day . ' ';
    }
    echo "\n";
    /**
     *
     *отступы от первого дня
     *
     *
     */
    if ($firstDayMonth == 7) {
        echo '                  ';
    } elseif ($firstDayMonth == 6) {
        echo '               ';
    } elseif ($firstDayMonth == 5) {
        echo '            ';
    } elseif ($firstDayMonth == 4) {
        echo '         ';
    } elseif ($firstDayMonth == 3) {
        echo '      ';
    } elseif ($firstDayMonth == 2) {
        echo '   ';
    } else {
        echo '';
    }
  /**
   *
   *первая строка
   *
   *
   */
    $Day = 1;
    if ((int)$firstDayMonth != 1) {
        for ($i = (int)$firstDayMonth; $i <= 7; $i++) {
            if ($Day == (int)$serialDay) {
                echo "\033[30;50m $Day\033[0m" . ' ';
            } else {
                echo ' ' . $Day . ' ';
            }
            ++$Day;
        }
        echo "\n";
    }
    /**
     *
     *
     *остальные строки
     *
     */
    $str = 0;
    for ($i = $Day; $i <= $numberDaysMonth; $i++) {
        if ($i < 10) {
            if ($i == (int)$serialDay) {
                echo "\033[30;47m $i\033[0m" . ' ';    //подсветить
            } else {
                echo ' ' . $i . ' ';
            }
        } else {
            if ($i == (int)$serialDay) {
                echo "\033[30;47m$i\033[0m" . ' ';     //подсветить
            } else {
                echo $i . ' ';
            }
        }

        ++$str;

        if ($str == 7) {
            echo "\n";
            $str = 0;
        }
    }
    /**
     *
     *
     *
     *
     */

    if ($str != 0) {
        for ($i = $j; $i <= 7; $i++) {
            echo '  ', ' ';
        }
    }
    echo "\n";

//var_dump($currentDay);
